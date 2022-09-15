<?php

use Illuminate\Database\Seeder;

use App\Type;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a types array
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

        // Start iterating on the array
        foreach ($types as $type) {
            // Create an istance of the Type model
            $data = new Type();
            // Set its values, if specified
            $data->name = $type['name'];
            if (key_exists('image', $type)) {
                $data->image = $type['image'];
            }
            // Save data to database
            $data->save();
        }
    }
}
