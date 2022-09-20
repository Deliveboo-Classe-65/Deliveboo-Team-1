<?php

use Illuminate\Database\Seeder;

use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a categories array. Each category will have a name and can have an img src and a color.
        $categories = [
            [
                'name' => "messicano",
                'color' => "9C006D",
                'image' => "categoria_messicano.png"
            ],
            [
                'name' => "cinese",
                'color' => "3B0055",
                'image' => "categoria_cinese.png"
            ],
            [
                'name' => "coreano",
                'color' => "007E8A",
                'image' => "categoria_coreano.png"
            ],
            [
                'name' => "indiano",
                'color' => "FABE00",
                'image' => "categoria_indiano.png"
            ],
            [
                'name' => "arabo",
                'color' => "CC3A2F",
                'image' => "categoria_arabo.png"
            ],
            [
                'name' => "pizza",
                'color' => "00727D",
                'image' => "categoria_pizza.png"
            ],
            [
                'name' => "hamburger",
                'color' => "00CCBC",
                'image' => "categoria_hamburger.png"
            ],
            [
                'name' => "italiano",
                'color' => "00CCBC",
                'image' => "categoria_italiano.png"
            ],
            [
                'name' => "giapponese",
                'color' => "00CCBC",
                'image' => "categoria_giapponese.png"
            ],
            [
                'name' => "bakery",
            ],
            [
                'name' => "piadina",
            ],
            [
                'name' => "libanese",
            ]
        ];

        // Start iterating on the array
        foreach ($categories as $category) {
            // Create an istance of the Category model
            $data = new Category();
            // Set its values, if specified
            $data->name = $category['name'];
            if (key_exists('color', $category)) {
                $data->color = $category['color'];
            }
            if (key_exists('image', $category)) {
                $data->image = $category['image'];
            }
            // Save data to database
            $data->save();
        }
    }
}
