<?php

namespace App\Objects;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use JsonSerializable;

class Device implements JsonSerializable
{
    /**
     * Collection of Devices.
     * @var Collection
     */
    static $repository;
    static $lookup;

    public $brand;
    public $model;
    public $name;
    public $capacity;
    public $wifi;
    public $color;
    public $image;

    /**
     * Boot the device class.
     * @return void
     */
    protected function boot()
    {
        if (static::$repository instanceof Collection) {
            return;
        }
        static::$repository = collect();

        static::$lookup = collect(parse_ini_file(base_path('database/models.ini'), true));
    }

    public static function getRespository()
    {
        return static::$repository->map(function($item) {
            return $item->toArray();
        });
    }

    /**
     * Device constructor.
     * @param $brand string
     * @param $model string
     */
    public function __construct($brand, $model, $capacity, $color)
    {
        $this->boot();

        $this->brand = Str::ucfirst($brand);
        $this->model = Str::upper($model);
        $this->capacity($capacity)->color($color);

        $this->name = static::$lookup->get($model);

        static::$repository[] = $this;
    }

    /**
     * Named constructor.
     * @param $brand
     * @param $model
     * @param $capacity
     * @param $color
     * @return static
     */
    public static function create($brand,$model,$capacity,$color)
    {
        return new static($brand,$model,$capacity,$color);
    }

    public static function toJson($encode=true)
    {
        $repo = static::$repository;
        $byModel = $repo->groupBy(function($item) {
            return $item->model;
        });

        $out = [];
        foreach($byModel as $model=>$collection) {
            $byCapacity = $collection->groupBy(function($item) {
                return $item->capacity;
            });
            $out[$collection[0]->model] = $byCapacity->toArray();
        }

        return $encode ? json_encode($out) : $out;
    }

    /**
     * Create a variation of this brand and model.
     * @param $capacity
     * @param $color
     * @return $this
     */
    public function variation($capacity,$color)
    {
        new static($this->brand,$this->model, $capacity,$color);
        return $this;
    }

    public function capacity($gb)
    {
        $this->capacity = $gb;
        return $this;
    }

    public function color($color)
    {
        $this->color = Str::ucfirst($color);
        return $this;
    }

    public function toArray()
    {
        return [
            'name' => $this->name,
            'brand' => $this->brand,
            'model' => $this->model,
            'color' => $this->color,
            'colorClass' => Str::slug($this->color),
            'capacity' => $this->capacity,
            'image' => url('images/devices/'.Str::slug($this->name).'.jpg')
        ];
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }
}