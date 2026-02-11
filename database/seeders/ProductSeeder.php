<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Classic Cinnamon Roll',
            'description' => 'Freshly baked cinnamon roll with cream cheese icing',
            'price' => 5.99,
            'image' => 'assets/img/products/cinnamon-roll.jpg',
            'category_id' => 1,
        ]);

        Product::create([
            'name' => 'Chocolate Croissant',
            'description' => 'Flaky croissant filled with chocolate',
            'price' => 4.50,
            'image' => 'assets/img/products/chocolate-croissant.jpg',
            'category_id' => 2,
        ]);

        Product::create([
            'name' => 'Cappuccino',
            'description' => 'Rich espresso with steamed milk and foam',
            'price' => 3.99,
            'image' => 'assets/img/products/cappuccino.jpg',
            'category_id' => 3,
        ]);

        Product::create([
            'name' => 'Caramel Latte',
            'description' => 'Smooth latte with caramel syrup',
            'price' => 4.99,
            'image' => 'assets/img/products/caramel-latte.jpg',
            'category_id' => 3,
        ]);
    }
}
