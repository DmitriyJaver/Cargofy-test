<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Cargo;
use App\Http\Requests\StoreCargoRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CargoApiController extends Controller
{
    public function index()
    {
        $cargoes = Cargo::with(['cityFrom', 'cityTo'])->get();
        return response()->json([
            'cargoes' => $cargoes,
        ], 200);
    }

    public function store(StoreCargoRequest $request)
    {
        // TODO: validate
        $formatDate = Carbon::parse($request->get('delivery_date'))->format('d.m');
        $newCargo = new Cargo([
            'name' => $request->get('name'),
            'weight' => $request->get('weight'),
            'from_city_id' => $request->get('from_city_id'),
            'to_city_id' => $request->get('to_city_id'),
            'delivery_date' => $formatDate,
        ]);
        $newCargo->save();

        return response()->json('success');
    }
}
