<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recipes = [
            [
                'name' => 'Spaghetti Bolognese',
                'description' => 'Classic Italian pasta dish',
                'instructions' => 'Cook pasta. Make sauce. Combine.',
                'cooking_time' => 30,
                'servings' => 4,
                'user_id' => 1,
                'ingredients' => [
                    ['id' => 1, 'quantity' => 4], // Tomatoes
                    ['id' => 2, 'quantity' => 1], // Onions
                    ['id' => 3, 'quantity' => 3], // Garlic
                ]
            ],
            [
                'name' => 'Chicken Stir Fry',
                'description' => 'Quick and healthy stir fry',
                'instructions' => 'Cut chicken. Cook vegetables. Stir fry all together.',
                'cooking_time' => 20,
                'servings' => 2,
                'user_id' => 1,
                'ingredients' => [
                    ['id' => 7, 'quantity' => 400], // Chicken
                    ['id' => 10, 'quantity' => 2], // Carrots
                ]
            ],
        ];

        foreach ($recipes as $recipe) {
            $ingredients = $recipe['ingredients'];
            unset($recipe['ingredients']);

            $recipeModel = Recipe::create($recipe);

            foreach ($ingredients as $ingredient) {
                $recipeModel->ingredients()->attach($ingredient['id'], [
                    'quantity' => $ingredient['quantity']
                ]);
            }
        }
    }
}
