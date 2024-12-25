<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurants = [
            [
                'name' => 'The Italian Corner',
                'address' => '123 Main St, City',
                'phone' => '555-0101',
                'email' => 'italian@corner.com',
                'description' => 'Authentic Italian cuisine',
            ],
            [
                'name' => 'Sushi Master',
                'address' => '456 Oak St, City',
                'phone' => '555-0102',
                'email' => 'sushi@master.com',
                'description' => 'Premium Japanese sushi',
            ],
            [
                'name' => 'Mexican Fiesta',
                'address' => '789 Pine St, City',
                'phone' => '555-0103',
                'email' => 'mexican@fiesta.com',
                'description' => 'Traditional Mexican dishes',
            ],
            [
                'name' => 'Burger House',
                'address' => '321 Elm St, City',
                'phone' => '555-0104',
                'email' => 'burger@house.com',
                'description' => 'Gourmet burgers',
            ],
            [
                'name' => 'Thai Spice',
                'address' => '654 Maple St, City',
                'phone' => '555-0105',
                'email' => 'thai@spice.com',
                'description' => 'Authentic Thai cuisine',
            ],
            [
                'name' => 'French Bistro',
                'address' => '987 Cedar St, City',
                'phone' => '555-0106',
                'email' => 'french@bistro.com',
                'description' => 'Classic French dishes',
            ],
            [
                'name' => 'Indian Flavors',
                'address' => '147 Birch St, City',
                'phone' => '555-0107',
                'email' => 'indian@flavors.com',
                'description' => 'Traditional Indian cuisine',
            ],
            [
                'name' => 'Greek Taverna',
                'address' => '258 Willow St, City',
                'phone' => '555-0108',
                'email' => 'greek@taverna.com',
                'description' => 'Authentic Greek food',
            ],
            [
                'name' => 'Steakhouse',
                'address' => '369 Pine St, City',
                'phone' => '555-0109',
                'email' => 'steak@house.com',
                'description' => 'Premium steaks',
            ],
            [
                'name' => 'Seafood Harbor',
                'address' => '741 Beach St, City',
                'phone' => '555-0110',
                'email' => 'seafood@harbor.com',
                'description' => 'Fresh seafood dishes',
            ],
        ];

        foreach ($restaurants as $restaurant) {
            Restaurant::create($restaurant);
        }
    }
}
