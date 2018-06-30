<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopifyAppReviews extends Model
{
  protected $table = 'shopify_app_reviews';
  protected $primaryKey = 'id';
  public $timestamps = true;
}