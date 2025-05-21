<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'name' => 'Switch',
            'description' => 'Perangkat jaringan untuk menghubungkan beberapa perangkat dalam satu LAN.'
        ]);
        Category::create([
            'name' => 'Firewall',
            'description' => 'Perangkat keamanan jaringan yang mengontrol lalu lintas masuk dan keluar.'
        ]);
        Category::create([
            'name' => 'Access Point',
            'description' => 'Perangkat untuk memperluas jangkauan jaringan nirkabel (Wi-Fi).'
        ]);
    }
}
