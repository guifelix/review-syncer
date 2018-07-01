<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\ShopifyAppReviews;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Artisan;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        /**
         * Trying to call the command on welcome screen, but it takes too long
         */
        // $data = ShopifyAppReviews::first();
        // if (empty($data)) {
            // $fetch = Artisan::call('fetch:reviews');
        // }
        return view('welcome');
    }

}
