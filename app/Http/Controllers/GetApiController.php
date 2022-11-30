<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cites;
use App\Models\Provinces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GetApiController extends Controller
{
    public function index()
    {
        $response = Http::withHeaders(['key' => '521ba25416a10843e9e93ec631dc3a65'])
            ->get('https://api.rajaongkir.com/starter/city');
        return $response['rajaongkir']['results'][0];

    }

    public function create()
    {
        $provinces = Provinces::all();
        return view('form_create',compact('provinces'));
    }

    public function store(Request $request)
    {

        if(
            $request->has('origin')  &&
            $request->has('destination') &&
            $request->has('weight') &&
            $request->has('courier')
        ){
            $origin = $request->origin;
            $destination = $request->destination;
            $weight = $request->weight;
            $courier = $request->courier;

            $response = Http::asForm()
            ->withHeaders(['key' => '521ba25416a10843e9e93ec631dc3a65'])
            ->post('https://api.rajaongkir.com/starter/cost',[
                'origin' => $origin,
                'destination' => $destination,
                'weight' =>  $weight,
                'courier' => $courier,
            ]);
            $check = $response['rajaongkir']['results'][0]['costs'];
            return view('check',compact('check'));

        } else {
            $origin ='';
            $destination = '';
            $weight = '';
            $courier = '';
        }

    }

    public function ajax($id)
    {
        $cities = Cites::where('province_id','=',$id)->pluck('city_name','id');
        return json_encode($cities);
    }
}
