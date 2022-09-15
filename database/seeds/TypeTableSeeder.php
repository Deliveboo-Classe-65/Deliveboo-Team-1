<?php

use Illuminate\Database\Seeder;

use App\Type;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'name' => "vegetariano",
            ],
            [
                'name' => "vegano",
            ],
            [
                'name' => "piccante",
            ],
            [
                'name' => "senza glutine",
            ],
        ];

        foreach ($types as $type) {
            $data = new Type();
            $data->name = $type['name'];
            if (key_exists('image', $type)) {
                $data->image = $type['image'];
            }
            $data->save();
        }
    }
}
