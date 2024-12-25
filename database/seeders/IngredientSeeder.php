<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ingredients = [
            [
                'name' => 'Tomatoes',
                'unit' => 'pcs',
                'description' => 'Fresh red tomatoes',
            ],
            [
                'name' => 'Onions',
                'unit' => 'pcs',
                'description' => 'Yellow onions',
            ],
            [
                'name' => 'Garlic',
                'unit' => 'cloves',
                'description' => 'Fresh garlic cloves',
            ],
            [
                'name' => 'Olive Oil',
                'unit' => 'ml',
                'description' => 'Extra virgin olive oil',
            ],
            [
                'name' => 'Salt',
                'unit' => 'g',
                'description' => 'Fine table salt',
            ],
            [
                'name' => 'Black Pepper',
                'unit' => 'g',
                'description' => 'Ground black pepper',
            ],
            [
                'name' => 'Chicken Breast',
                'unit' => 'g',
                'description' => 'Boneless chicken breast',
            ],
            [
                'name' => 'Rice',
                'unit' => 'g',
                'description' => 'White long-grain rice',
            ],
            [
                'name' => 'Pasta',
                'unit' => 'g',
                'description' => 'Spaghetti pasta',
            ],
            [
                'name' => 'Carrots',
                'unit' => 'pcs',
                'description' => 'Fresh orange carrots',
            ],
        ];

        foreach ($ingredients as $ingredient) {
            Ingredient::create($ingredient);
        }
    }
}
