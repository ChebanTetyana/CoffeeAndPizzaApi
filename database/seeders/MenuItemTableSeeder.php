<?php

namespace Database\Seeders;

use App\Enums\ProductType;
use App\Models\MenuItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MenuItem::create([
            'name' => 'Pizza Margherita',
            'description' => 'Red tomato sauce, white mozzarella and fresh green basil.',
            'size' => 'S',
            'price' => 2.00,
            'image' => 'pizza_1.jpg',
            'product_type' => ProductType::PIZZA,
        ]);

        MenuItem::create([
            'name' => 'Pizza Margherita',
            'description' => 'Red tomato sauce, white mozzarella and fresh green basil.',
            'size' => 'M',
            'price' => 3.00,
            'image' => 'pizza_1.jpg',
            'product_type' => ProductType::PIZZA,
        ]);

        MenuItem::create([
            'name' => 'Pizza Margherita',
            'description' => 'Red tomato sauce, white mozzarella and fresh green basil.',
            'size' => 'L',
            'price' => 5.00,
            'image' => 'pizza_1.jpg',
            'product_type' => ProductType::PIZZA,
        ]);

        MenuItem::create([
            'name' => 'Pizza Quattro stagioni',
            'description' => 'Fresh mushrooms, prosciutto ham, artichoke hearts and mozzarella on organic tomato sauce.',
            'size' => 'S',
            'price' => 2.00,
            'image' => 'pizza_2.jpg',
            'product_type' => ProductType::PIZZA,
        ]);
        MenuItem::create([
            'name' => 'Pizza Quattro stagioni',
            'description' => 'Fresh mushrooms, prosciutto ham, artichoke hearts and mozzarella on organic tomato sauce.',
            'size' => 'M',
            'price' => 3.00,
            'image' => 'pizza_2.jpg',
            'product_type' => ProductType::PIZZA,
        ]);

        MenuItem::create([
            'name' => 'Pizza Quattro stagioni',
            'description' => 'Fresh mushrooms, prosciutto ham, artichoke hearts and mozzarella on organic tomato sauce.',
            'size' => 'L',
            'price' => 5.00,
            'image' => 'pizza_2.jpg',
            'product_type' => ProductType::PIZZA,
        ]);

        MenuItem::create([
            'name' => 'Pizza Quattro formaggi',
            'description' => 'Combination of four kinds of cheese, usually melted together, tomato or bianca sauce',
            'size' => 'S',
            'price' => 2.00,
            'image' => 'pizza_3.jpg',
            'product_type' => ProductType::PIZZA,
        ]);

        MenuItem::create([
            'name' => 'Pizza Quattro formaggi',
            'description' => 'Combination of four kinds of cheese, usually melted together, tomato or bianca sauce',
            'size' => 'M',
            'price' => 3.00,
            'image' => 'pizza_3.jpg',
            'product_type' => ProductType::PIZZA,
        ]);

        MenuItem::create([
            'name' => 'Pizza Quattro formaggi',
            'description' => 'Combination of four kinds of cheese, usually melted together, tomato or bianca sauce',
            'size' => 'L',
            'price' => 5.00,
            'image' => 'pizza_3.jpg',
            'product_type' => ProductType::PIZZA,
        ]);

        MenuItem::create([
            'name' => 'Pizza Neapolitana',
            'description' => 'Tomatoes, fresh mozzarella cheese, fresh basil, and olive oil',
            'size' => 'S',
            'price' => 2.00,
            'image' => 'pizza_4.jpg',
            'product_type' => ProductType::PIZZA,
        ]);

        MenuItem::create([
            'name' => 'Pizza Neapolitana',
            'description' => 'Tomatoes, fresh mozzarella cheese, fresh basil, and olive oil',
            'size' => 'M',
            'price' => 3.00,
            'image' => 'pizza_4.jpg',
            'product_type' => ProductType::PIZZA,
        ]);

        MenuItem::create([
            'name' => 'Pizza Neapolitana',
            'description' => 'Tomatoes, fresh mozzarella cheese, fresh basil, and olive oil',
            'size' => 'L',
            'price' => 5.00,
            'image' => 'pizza_4.jpg',
            'product_type' => ProductType::PIZZA,
        ]);

        MenuItem::create([
            'name' => 'Coffee Americano',
            'description' => 'Made by pouring hot water over one or two espresso shots,
             resulting in a drink of similar volume and strength to regular coffee',
            'size' => 'M',
            'price' => 2.00,
            'image' => 'coffee_1.jpg',
            'product_type' => ProductType::COFFEE,
        ]);

        MenuItem::create([
            'name' => 'Coffee Americano',
            'description' => 'Made by pouring hot water over one or two espresso shots,
            resulting in a drink of similar volume and strength to regular coffee',
            'size' => 'L',
            'price' => 3.00,
            'image' => 'coffee_1.jpg',
            'product_type' => ProductType::COFFEE,
        ]);

        MenuItem::create([
            'name' => 'Coffee Americano with milk',
            'description' => 'An espresso-based drink in which you only add milk to the traditional Americano',
            'size' => 'M',
            'price' => 2.00,
            'image' => 'coffee_2.jpg',
            'product_type' => ProductType::COFFEE,
        ]);

        MenuItem::create([
            'name' => 'Coffee Americano with milk',
            'description' => 'An espresso-based drink in which you only add milk to the traditional Americano',
            'size' => 'L',
            'price' => 3.00,
            'image' => 'coffee_2.jpg',
            'product_type' => ProductType::COFFEE,
        ]);

        MenuItem::create([
            'name' => 'Cappuccino',
            'description' => 'The perfect balance of espresso, steamed milk and foam',
            'size' => 'M',
            'price' => 2.00,
            'image' => 'cappuccino.jpg',
            'product_type' => ProductType::COFFEE,
        ]);

        MenuItem::create([
            'name' => 'Cappuccino',
            'description' => 'The perfect balance of espresso, steamed milk and foam',
            'size' => 'L',
            'price' => 3.00,
            'image' => 'cappuccino.jpg',
            'product_type' => ProductType::COFFEE,
        ]);

        MenuItem::create([
            'name' => 'Pizza Neapolitana size M + 2 cappuccino size M',
            'description' => 'The perfect balance of espresso, steamed milk and foam',
            'size' => null,
            'price' => 6.00,
            'image' => 'promotion.jpg',
            'product_type' => ProductType::PROMOTION,
        ]);

        MenuItem::create([
            'name' => 'Pizza Quattro formaggi size M + 2 americano size M',
            'description' => 'The perfect balance of espresso, steamed milk and foam',
            'size' => null,
            'price' => 6.00,
            'image' => 'promotion_1.jpg',
            'product_type' => ProductType::PROMOTION,
        ]);
    }
}
