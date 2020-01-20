<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    public $table = 'cargoes';

    protected $fillable = [
        'name',
        'weight',
        'delivery_date',
        'from_city_id',
        'to_city_id',
    ];

    public $timestamps = false;

    public function cityFrom()
    {
        return $this->hasOne(City::class, 'id', 'from_city_id');
    }

    public function cityTo()
    {
        return $this->hasOne(City::class, 'id', 'to_city_id');
    }

}
