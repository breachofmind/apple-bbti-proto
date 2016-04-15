<?php

namespace App\Providers;

use App\Objects\Device;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $build = [
        'A1332' => [
            8 => ['black','white'],
            16 => ['black','white'],
            32 => ['black','white'],
        ],
        'A1387' => [
            8 => ['black','white'],
            16 => ['black','white'],
            32 => ['black','white'],
            64 => ['black','white'],
        ],
        'A1428' => [
            16 => ['black','white'],
            32 => ['black','white'],
            64 => ['black','white']
        ],
        'A1532' => [
            8 => ['white','blue','green','pink','yellow'],
            16 => ['white','blue','green','pink','yellow'],
            32 => ['white','blue','green','pink','yellow']
        ],
        'A1533' => [
            16 => ['Space Gray', 'silver','gold'],
            32 => ['Space Gray', 'silver','gold'],
            64 => ['Space Gray', 'silver','gold']
        ],
        'A1549' => [
            16 => ['Space Gray', 'silver','gold'],
            64 => ['Space Gray', 'silver','gold'],
            128 => ['Space Gray', 'silver','gold'],
        ],
        'A1522' => [
            16 => ['Space Gray', 'silver','gold'],
            64 => ['Space Gray', 'silver','gold'],
            128 => ['Space Gray', 'silver','gold'],
        ]
    ];
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        foreach ($this->build as $model=>$capacities) {
            foreach($capacities as $capacity=>$colors) {
                foreach($colors as $color) {
                    Device::create("Apple", $model, $capacity, $color);
                }
            }
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
