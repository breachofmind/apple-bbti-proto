<?php
namespace App\Objects;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

class Trade implements Jsonable, Arrayable
{
    public $device;
    public $date;
    public $img;
    public $id;
    public $type;
    public $status;

    protected $jsonable = ['device','date','img','id','type','status'];

    public static function create()
    {
        $prop = [
            'device' => Trade::random('device'),
            'img' => Trade::random('img'),
            'id' => rand(1507948,2075984),
            'status' => Trade::random('status'),
            'type' => 'Online',
            'date' => '5/10/2016',
        ];
        return new static($prop);
    }

    public static function random($key)
    {
        $opts = [
            'device' => [
                'Apple iPhone 6',
                'Apple iPhone 4',
                'Apple iPhone 5c',
                'Apple iPhone 5',
                'Apple iPhone 6 Plus'
            ],
            'img' => [
                '/images/devices/iphone-4.jpg',
                '/images/devices/iphone-4s.jpg',
                '/images/devices/iphone-5.jpg',
                '/images/devices/iphone-5c.jpg',
                '/images/devices/iphone-5s.jpg',
                '/images/devices/iphone-6.jpg',
                '/images/devices/iphone-6-plus.jpg',
            ],
            'status' => [
                'Quote ID Confirmed',
                'Complete',
                'Under Review',
                'Whatever'
            ]
        ];
        $type = $opts[$key];
        $n = array_rand($type);

        return $type[$n];
    }

    public function __construct($properties=[])
    {
        foreach($properties as $key=>$value)
        {
            $this->$key = $value;
        }

    }

    public function toJson($options=0)
    {
        return json_encode($this->toArray());
    }

    public function toArray()
    {
        return array_map(function($key) {

            return $this->$key;

        },$this->jsonable);
    }
}