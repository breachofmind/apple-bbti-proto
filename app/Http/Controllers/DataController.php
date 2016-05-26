<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Objects\Trade;
use App\Objects\Device;

class DataController extends Controller
{
    public function __construct()
    {
        $this->middleware('cors');
    }

    public function getDevices()
    {
        return response(Device::getRespository(),200, [
            'Content-Type' => 'application/json'
        ]);
    }

    public function getTrades()
    {
        return response(Trade::create(5),200,[
            'Content-Type' => 'application/json'
        ]);
    }
}
