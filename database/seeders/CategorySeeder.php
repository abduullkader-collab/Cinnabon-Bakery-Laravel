<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Cinnamon Rolls',
            'description' => 'Classic cinnamon rolls with icing',
            'ImagePath' => 'assets/img/products/cinnamon-roll.jpg',
        ]);

        Category::create([
            'name' => 'Pastries',
            'description' => 'Assorted pastries and desserts',
            'ImagePath' => 'assets/img/products/pastry.jpg',
        ]);

        Category::create([
            'name' => 'Beverages',
            'description' => 'Hot and cold drinks',
            'ImagePath' => 'assets/img/products/beverage.jpg',
        ]);
    }
}
