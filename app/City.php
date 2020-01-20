<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $table = 'cities';

    protected $fillable = [
        'city_name',
    ];

    public function cargoFrom()
    {
        return $this->belongsTo(Cargo::class);
    }

    public function cargoTo()
    {
        return $this->belongsTo(Cargo::class);
    }

}
