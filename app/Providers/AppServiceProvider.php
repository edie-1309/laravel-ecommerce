<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();

        // Rupiah format
        Blade::directive('currency', function ($expression) 
        {            
            $price = "Rp. <?= number_format($expression,0,',','.'); ?>"; 
            
            return $price;
        });

        // Before discount
        Blade::directive('original_price', function ($expression) 
        {            
            $array = explode(',',$expression);

            // $hasil = 100 / 100 - $discount * $harga;
            $discount = "100 - $array[1]";
            $price = "$array[0] * 100";
            $before_discount = "intval($price) / intval($discount)";

            return "Rp. <?= number_format($before_discount,0,',','.'); ?>";
        });        
    }
}
