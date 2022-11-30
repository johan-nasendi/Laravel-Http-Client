<?php

namespace Database\Seeders;

use App\Models\Cites;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::withHeaders([
            'key' => '521ba25416a10843e9e93ec631dc3a65'
        ])->get('https://api.rajaongkir.com/starter/city');

        $loops = $response['rajaongkir']['results'];

        foreach($loops as $cities ){
            $data_city[] = [
                'id' => $cities['city_id'],
                'province_id' => $cities['province_id'],
                'city_name' => $cities['city_name'],
                'type' => $cities['type'],
                'postal_code' => $cities['postal_code'],
            ];
        }

        Cites::insert($data_city);
    }
}
