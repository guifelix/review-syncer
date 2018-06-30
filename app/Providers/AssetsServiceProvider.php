<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AssetsServiceProvider extends ServiceProvider
{
  /**
  * Bootstrap the application services.
  *
  * @return void
  */
  public function boot()
  {
    // $this->publishes([
      // base_path() . '/vendor/pnikolov/bootbox' => public_path('components/bootbox')
    // ], 'bootbox');

    // $this->publishes([
      // base_path() . '/vendor/components/chosen' => public_path('components/chosen')
    // ], 'chosen');

    $this->publishes([
      base_path() . '/vendor/datatables/datatables/media' => public_path('components/datatables'),
    ], 'datatables');

    // $this->publishes([
      // base_path() . '/vendor/eternicode/bootstrap-datepicker/dist' => public_path('components/datepicker')
    // ], 'datepicker');

    $this->publishes([
      base_path() . '/vendor/fortawesome/font-awesome' => public_path('components/font-awesome'),
    ], 'font-awesome');

    $this->publishes([
      base_path() . '/vendor/components/jquery' => public_path('components/jquery'),
    ], 'jquery');

    // $this->publishes([
      // base_path() . '/vendor/plentz/jquery-maskmoney/dist' => public_path('components/jquery-maskmoney')
    // ], 'jquery-maskmoney');

    // $this->publishes([
      // base_path() . '/vendor/igorescobar/jquery-mask-plugin/dist' => public_path('components/maskjs')
    // ], 'maskjs');

    $this->publishes([
      base_path() . '/vendor/moment/moment/min' => public_path('components/momentjs')
    ], 'momentjs');

    $this->publishes([
      base_path() . '/vendor/twbs/bootstrap/dist' => public_path('components/bootstrap'),
    ], 'twbs');

  }

  /**
  * Register the application services.
  *
  * @return void
  */
  public function register()
  {
    //
  }
}
