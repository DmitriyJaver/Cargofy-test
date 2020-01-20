<?php

namespace App\Http\Controllers;

use App\Cargo;
use App\City;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all()->pluck('city_name', 'id');
        return view('Cargo', compact('cities'));
    }
}
