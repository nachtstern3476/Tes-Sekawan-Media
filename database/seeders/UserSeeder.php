<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
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
                'name' => 'Nimas Suri',
                'username' => 'admin1',
                'password' => Hash::make('admin'),
                'level' => '1',
            ],
            [
                'name' => 'Agus Yayat',
                'username' => 'admin2',
                'password' => Hash::make('admin'),
                'level' => '2',
            ],
            [
                'name' => 'Hanis Hat',
                'username' => 'admin3',
                'password' => Hash::make('admin'),
                'level' => '2',
            ],
        ];

        foreach ($data as $item) {
            User::create($item);
        }
    }
}
