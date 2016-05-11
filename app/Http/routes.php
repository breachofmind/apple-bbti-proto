<?php
use Illuminate\Http\Response;
use App\Objects\Trade;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {

    return view('index');
});

Route::get('devices', function() {
    return response(\App\Objects\Device::getRespository(),200, [
        'Content-Type' => 'application/json'
    ]);
});

Route::post('evaluate', function(\Illuminate\Http\Request $request){

    return [
        'input' => $request->input(),
        'valuation' => floor(rand(50,300)),
        'valuationType' => 'Apple Store Gift Card'
    ];
});

Route::get('contact', function() {
    return view('contact');
});

Route::get('trades', function() {
    return view('trades');
});

Route::get('data/trades', function(){
    return [
        Trade::create(),
        Trade::create(),
        Trade::create(),
        Trade::create(),
        Trade::create(),
        Trade::create(),
    ];
});