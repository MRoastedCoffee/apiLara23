<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class categoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
           'Pinturas' => 'Berel Roja',
           'Electrodomesticos' => 'Cafetera',
           'Muebles' => 'Silla Comedor',
           'Decoracion' => 'Cuadro ',
           'Jardin' => 'Pala Jardineria',
           'Computadoras' => 'Laptop Dell',
           'Ropa' => 'Calcetines',
        ]);
    }
}
