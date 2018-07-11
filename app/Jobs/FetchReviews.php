<?php

namespace App\Jobs;

use DB;
use DateTime;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use App\Models\ShopifyAppReviews;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class FetchReviews implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 10;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            foreach (products() as $product) {
                $client = new Client();
                $output = $client->request('GET',"https://apps.shopify.com/" . $product . "/reviews.json");
                $body = $output->getBody();
                $data = json_decode($body);

                foreach ($data->reviews as $reviews) {
                    $token = $this->createToken($reviews);
                    $this->insertUpdate($reviews, $product, $token);
                }
            }

        } catch (\Exception $ex) {
            Log::error('Couldn\'t fetch the reviews', ['message'=>$ex->getMessage()]);
        }
    }

    /**
     * Creates a token to further know if it's to either insert or update the review
     * @param  [object] $data [the review]
     */
    private function createToken($data)
    {
        $token = '';

        is_null($data->author) ?: $token .= $data->author;
        // is_null($data->body) ?: $token .= $data->body;
        is_null($data->created_at) ?: $token .= date( "dmYHis", strtotime($data->created_at));
        is_null($data->shop_domain) ?: $token .= $data->shop_domain;
        is_null($data->shop_name) ?: $token .= $data->shop_name;

        return sha1($token);
    }

    /**
     * Insert or update a review
     * @param  [object] $reviews [the review]
     */
    private function insertUpdate($reviews, $product, $token)
    {
        $objReview = ShopifyAppReviews::where('token',$token)->first();

        DB::beginTransaction();
        if (empty($objReview)) {
            try {
                $timestamp = new DateTime($reviews->created_at);
                $created_at = $timestamp->format('Y-m-d H:i:s');

                $newReview = new ShopifyAppReviews();

                $newReview->shopify_domain = $reviews->shop_domain;
                $newReview->app_slug       = $product;
                $newReview->star_rating    = $reviews->star_rating;
                $newReview->created_at     = $created_at;
                $newReview->token          = $token;

                $newReview->save();

                DB::commit();
            }  catch (\Exception $ex){
                DB::rollBack();
                Log::error('Couldn\'t add the review', ['message'=>$ex->getMessage()]);
            }
        } else {
            if ($objReview->star_rating !== $reviews->star_rating) {
                try {
                    $objReview->previous_star_rating = $objReview->star_rating;
                    $objReview->updated_at           = date('Y-m-d H:i:s');
                    $objReview->star_rating          = $reviews->star_rating;
                    $objReview->token                = $token;

                    $objReview->save();

                    DB::commit();
                }  catch (\Exception $ex){
                    DB::rollBack();
                    Log::error('Couldn\'t update the review', ['message'=>$ex->getMessage()]);
                }
            }
        }
    }

}
