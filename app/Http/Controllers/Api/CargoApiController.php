<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Cargo;
use Illuminate\Http\Request;

class CargoApiController extends Controller
{
    public function index()
    {

        $cargoes = Cargo::with(['cityFrom', 'cityTo'])->get(); //with('relation method in model')
        return response()->json([
            'cargoes' => $cargoes,
        ], 200);
    }
    public function store(Request $request)
    {
        // TODO: validate

        $newCargo = new Cargo([
            'name' => $request->get('name'),
            'weight' => $request->get('weight'),
            'from_city_id' => $request->get('from_city_id'),
            'to_city_id' => $request->get('to_city_id'),
            'delivery_date' => $request->get('delivery_date'),
        ]);
        $newCargo->save();

        return response()->json('success');
    }
}
