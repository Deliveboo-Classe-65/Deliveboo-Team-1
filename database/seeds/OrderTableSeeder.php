<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Order;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $clients = [
            [
                'client_name' => 'Mario',
                'client_surname' => 'Rossi',
                'delivery_address' => 'Via Pietroburgo, 67'
            ],

            [
                'client_name' => 'Mario',
                'client_surname' => 'Rossi',
                'delivery_address' => 'Via Pietroburgo, 67'
            ],

        ];

        foreach ($clients as $client){
            $newOrder = new Order();
            $newOrder->user_id = 1;
            $newOrder->client_name = $client['client_name'];
            $newOrder->client_surname = $client['client_surname'];
            $newOrder->delivery_address = $client['delivery_address'];
            $newOrder->chosen_delivery_time = '22:00';
            $newOrder->client_email = $faker->email();
            $newOrder->client_phone = '329' . $faker->randomNumber(7, true);
            $newOrder->total = $faker->randomFloat(2, 10, 98);
            $newOrder->save();
        }
    }
}


// $table->id();
// $table->foreignId("user_id")->constrained();
// $table->string("client_name");
// $table->string("client_surname");
// $table->string("delivery_address");
// $table->time("chosen_delivery_time");
// $table->string("client_email");
// $table->string("client_phone", 10);
// $table->decimal("total", 6, 2);
// $table->timestamp("sent");
// $table->timestamps();