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
            ]
        ];

        foreach ($categories as $category) {
            $data = new Category();
            $data->name = $category['name'];
            $data->color = $category['color'];
            $data->image = $category['image'];
            $data->save();
        }
    }
}
