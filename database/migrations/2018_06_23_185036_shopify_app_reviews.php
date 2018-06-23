<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ShopifyAppReviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopify_app_reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->char('shopify_domain',255);
            $table->char('app_slug',255);
            $table->integer('star_rating');
            $table->integer('previous_star_rating');
            $table->dateTime('updated_at');
            $table->dateTime('created_at');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
