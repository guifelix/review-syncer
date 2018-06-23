<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\ShopifyAppReviews;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class ReviewsController extends Controller
{
    /**
     * Get reviews from Bold Commerce apps
     * @param  int $id     ID
     * @param  date $first initial date
     * @param  date $last  last date
     * @return array       all data
     */
    public function index($id = null, $idate = null, $edate = null)
    {
        $idWhere = $idateWhere = $edateWhere = '';

        $where = 'WHERE ';

        if ($id !== null) {
            $where .= $id;
        }

        if ($idate !== null && $edate !== null) {
            $where .= (strlen($where)>6) ? 'AND BETWEEN '. $idate . 'AND ' . $edate : 'BETWEEN '. $idate . 'AND ' . $edate ;
        }

        if ($idate !== null) {
            $where .= (strlen($where)>6) ? 'AND created_at >'. $idate : 'created_at >'. $idate ;
        }
        if ($edate !== null) {
            $where .= (strlen($where)>6) ? 'AND created_at <'. $edate : 'created_at <'. $edate ;
        }

        $reviewsData = ShopifyAppReviews::whereRaw($where)->get();

        empty($reviewsData) ? $reviewsData : '';

        return view('reviews.index',[
            'reviewsData' => $reviewsData,
        ]);
    }


    public function getRestReview()
    {
        try {
            foreach (products() as $product) {
                $url = "https://apps.shopify.com/" . $appName . "/reviews.json";
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept:application/json, Content-Type:application/json']);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, ‘GET’);
                $output = curl_exec($ch);
                curl_close($ch);
                $data[] = $output;
            }
            return response($output);
        } catch (\Exception $ex) {
            return null;
        }
    }

    public function jsonReviews()
    {
        try {
            return Datatables::whereIn(products())->make(true);
        } catch (\Exception $ex) {
            return null;
        }
    }

}
