<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Driver;

class DriverSeeder extends Seeder
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
                'name' => 'Hariono Suginda',
                'birthdate' => '1998-02-23',
                'gender' => 'L',
                'address' => 'Jl Bencana Alam, Jawa Timur',
                'phone' => '012134123',
                'photo' => '/storage/1631629524_photo.jpg',
                'status' => false
            ],
            [
                'name' => 'Bima Rajasaka',
                'birthdate' => '1992-12-20',
                'gender' => 'L',
                'address' => 'Jl Bencana Alam, Jawa Timur',
                'phone' => '012134123',
                'photo' => '/storage/1631629524_photo.jpg',
                'status' => false
            ],
            [
                'name' => 'Budianto Sajo',
                'birthdate' => '1990-11-10',
                'gender' => 'L',
                'address' => 'Jl Bencana Alam, Jawa Timur',
                'phone' => '012134123',
                'photo' => '/storage/1631629524_photo.jpg',
                'status' => false
            ],
            [
                'name' => 'Bagus Teji',
                'birthdate' => '2000-09-15',
                'gender' => 'L',
                'address' => 'Jl Bencana Alam, Jawa Timur',
                'phone' => '012134123',
                'photo' => '/storage/1631629524_photo.jpg',
                'status' => false
            ],
            [
                'name' => 'Bungawan Dian',
                'birthdate' => '1994-06-10',
                'gender' => 'L',
                'address' => 'Jl Bencana Alam, Jawa Timur',
                'phone' => '012134123',
                'photo' => '/storage/1631629524_photo.jpg',
                'status' => false
            ],
        ];

        foreach ($data as $item) {
            Driver::create($item);
        }
    }
}
