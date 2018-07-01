<?php

namespace App\Http\Controllers\Reviews;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\ShopifyAppReviews;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class ReviewsController extends Controller
{

    public function index()
    {
        return view('Reviews.index');
    }

    /**
     * Fetches the reviews from database
     * @return [json] [json for the datatables plugin]
     */
    public function jsonReviews($products = null)
    {
        try {
            if ($products) {
                $objReviews = ShopifyAppReviews::where('app_slug',$products)->get();
            } else {
                $objReviews = ShopifyAppReviews::whereIn('app_slug',products())->get();
            }
            return Datatables::of($objReviews)->make(true);
        } catch (\Exception $ex) {
            Log::error('Couldn\'t fetch the reviews from database', ['message'=>$ex->getMessage()]);
            return null;
        }
    }

}
