<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehicle;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Hino Dutro 110 SDL',
                'brand' => 'Hino',
                'type' => 'Truk',
                'plate_number' => 'S1252SN',
                'owner' => 'PT Tambang Jaya',
                'status' => 0,
            ],
            [
                'name' => 'Hino Ranger FM WINGBOX',
                'brand' => 'Hino',
                'type' => 'Truk Fuso',
                'plate_number' => 'S1257SN',
                'owner' => 'PT Tambang Jaya',
                'status' => 0,
            ],
            [
                'name' => 'Hino Ranger FG CARGO',
                'brand' => 'Hino',
                'type' => 'Truk Fuso',
                'plate_number' => 'S1257SN',
                'owner' => 'PT Tambang Jaya',
                'status' => 0,
            ],
            [
                'name' => 'Hino Dutro 130 MD',
                'brand' => 'Hino',
                'type' => 'Truk',
                'plate_number' => 'S1257SN',
                'owner' => 'PT Tambang Jaya',
                'status' => 0,
            ],
            [
                'name' => 'Hino Dutro 130 HDL',
                'brand' => 'Hino',
                'type' => 'Truk Fuso',
                'plate_number' => 'S1457SN',
                'owner' => 'PT Tambang Jaya',
                'status' => 0,
            ],
        ];

        foreach ($data as $item) {
            Vehicle::create($item);
        }
    }
}
