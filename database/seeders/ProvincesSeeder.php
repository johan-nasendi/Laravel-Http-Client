<?php

namespace Database\Seeders;

use App\Models\Provinces;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ProvincesSeeder extends Seeder
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
        ])->get('https://api.rajaongkir.com/starter/province');

        $loops = $response['rajaongkir']['results'];

        foreach($loops as $province ){
            $data_province[] = [
                'id' => $province['province_id'],
                'province' => $province['province'],
            ];
        }

        Provinces::insert($data_province);
    }
}
