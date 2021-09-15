<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
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
                'driver_id' => '1',
                'vehicle_id' => '5',
                'user_approval_id' => '2',
                'user_input_id' => '1',
                'message' => 'Membutuhkan untuk pengangkutan barang tambang',
            ],
            [
                'driver_id' => '2',
                'vehicle_id' => '4',
                'user_approval_id' => '3',
                'user_input_id' => '1',
                'message' => 'Membutuhkan untuk pengangkutan barang tambang tambahan',
            ],
            [
                'driver_id' => '3',
                'vehicle_id' => '1',
                'user_approval_id' => '2',
                'user_input_id' => '1',
                'message' => 'Membutuhkan untuk pengangkutan barang tambang',
            ],
            [
                'driver_id' => '4',
                'vehicle_id' => '2',
                'user_approval_id' => '2',
                'user_input_id' => '1',
                'message' => 'Membutuhkan untuk pengangkutan barang tambang',
            ],
        ];

        foreach ($data as $item) {
            Order::create($item);
        }
    }
}
