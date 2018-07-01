<?php

namespace App\Console\Commands;

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;
use App\Models\ShopifyAppReviews;
use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Carbon\Carbon;
use DateTime;
use DB;

class FetchReviews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:reviews';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch bold product\'s reviews from a REST API';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
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

            $this->info('Fetched all reviews!');
        } catch (\Exception $ex) {
            $this->error('Could\'t fetch the review');
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
                $this->line('Review not found, trying to insert new review');
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
                $this->info('Review inserted: ' . $newReview->id);
            }  catch (\Exception $ex){
                DB::rollBack();
                $this->error('Could\'t add the review');
                Log::error('Couldn\'t add the review', ['message'=>$ex->getMessage()]);
            }
        } else {
            $this->line('Review found');
            if ($objReview->star_rating !== $reviews->star_rating) {
                $this->line('New rating, trying to update review');
                try {
                    $objReview->shopify_domain       = $reviews->shop_domain;
                    $objReview->app_slug             = $reviews->app_slug;
                    $objReview->previous_star_rating = $objReview->star_rating;
                    $objReview->updated_at           = date('Y-m-d H:i:s');
                    $objReview->star_rating          = $reviews->star_rating;
                    $objReview->token                = $token;

                    $objReview->save();

                    DB::commit();
                    $this->info('Review update');
                }  catch (\Exception $ex){
                    DB::rollBack();
                    $this->error('Could\'t update the review');
                    Log::error('Couldn\'t update the review', ['message'=>$ex->getMessage()]);
                }
            }
            $this->comment('Same rating, review wasn\'t updated');
        }
    }

}
