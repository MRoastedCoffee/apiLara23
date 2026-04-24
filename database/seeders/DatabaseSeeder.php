<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      $categories = [
        ['name' => 'Pintura', 'description' => 'Articulos y materiales para pintar.'],
        ['name' => 'Electrodomesticos', 'description' => 'Productos para el hogar y cocina.'],
        ['name' => 'Muebles', 'description' => 'Mobiliario para casa y oficina.'],
        ['name' => 'Decoracion', 'description' => 'Elementos decorativos para interiores.'],
        ['name' => 'Jardin', 'description' => 'Herramientas y accesorios para jardineria.'],
        ['name' => 'Computadoras', 'description' => 'Equipos y accesorios de computo.'],
        ['name' => 'Ropa', 'description' => 'Prendas y accesorios de vestir.'],
      ];

      foreach ($categories as $categoryData) {
        $category = Category::create($categoryData);

        Product::factory()
          ->count(30)
          ->create(['category_id' => $category->id]);
      }
    }
}
