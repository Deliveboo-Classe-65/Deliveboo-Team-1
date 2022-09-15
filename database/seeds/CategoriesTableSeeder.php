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
        $categories = [
            [
                'name' => "messicano",
                'color' => "9C006D",
                'image' => "/storage/img/categorie/categoria_messicano.png"
            ],
            [
                'name' => "italiano",
                'color' => "00CCBC",
                'image' => "/storage/img/categorie/categoria_italiano.png"
            ],

            [
                'name' => "pizza",
                'color' => "00727D",
                'image' => "/storage/img/categorie/categoria_pizza.png"
            ],

            [
                'name' => "arabo",
                'color' => "CC3A2F",
                'image' => "/storage/img/categorie/categoria_arabo.png"
            ],

            [
                'name' => "cinese",
                'color' => "3B0055",
                'image' => "/storage/img/categorie/categoria_cinese.png"
            ],

            [
                'name' => "indiano",
                'color' => "FABE00",
                'image' => "/storage/img/categorie/categoria_indiano.png"
            ],

            [
                'name' => "hamburger",
                'color' => "00CCBC",
                'image' => "/storage/img/categorie/categoria_hamburger.png"
            ],

            [
                'name' => "bakery",
            ],

            [
                'name' => "piadina",
            ],

            [
                'name' => "libanese",
            ],

        ];




        foreach ($categories as $category) {
            $data = new Category();
            $data->name = $category['name'];
            if (key_exists('color', $category)) {
                $data->color = $category['color'];
            }
            if (key_exists('image', $category)) {
                $data->image = $category['image'];
            }
            $data->save();
        }
    }
}
