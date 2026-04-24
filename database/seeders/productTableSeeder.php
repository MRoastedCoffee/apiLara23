<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class productTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
           'name' => 'Coffee',
           'description' => 'Kirkland Coffee, Medium Roast, 2.5 lb',
           'descriptionLong' => 'Kirkland Coffee, Medium Roast, 2.5 lb',
           'price' => 20.99,
        ]);

    }
}
