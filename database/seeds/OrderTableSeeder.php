<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Order;
use App\User;
use App\Dish;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $names = ['Atanasio', 'Ansaldo', 'Marcello', 'Rodolfo', 'Sara', 'Ismaele', 'Marika', 'Andrea', 'Roberto', 'Fabio', 'Federica', 'Francesca', 'Giancarlo', 'Francesco', 'Mattia', 'Pietro', 'Enrico', 'Guido', 'Giacomo', 'Lorenzo', 'Yuri', 'Carlotta', 'Elisa', 'Marco', 'Giada', 'Virginia', 'Debora', 'Annalisa', 'Rachele', 'Claudio', 'Margherita', 'Leonardo', 'Irene', 'Mirko', 'Emanuele', 'Matteo'];
        $surnames = ['Panicucci', 'Gelli', 'Battini', 'Pampaloni', 'Picchi', 'Orsi', 'Guazzelli', 'Guerriero', 'Guerrazzi', 'Vaglini', 'Torrigiani', 'Ruffino', 'Melini', 'Ferri', 'La Rocca', 'Bini', 'Fantozzi', 'Deri', 'Guidotti', 'Ristori', 'Filippi', 'Orazzini', 'Brilli', 'Bitozzi', 'Menciassi', 'Donati', 'Campani', 'Moroni', 'Chetoni', ' Zaffora', 'Sambri', 'Lazzerini', 'Gorini', 'Gubitosa', 'Vannini', 'Migliacci'];
        $streets = ['Borgo Sesto', 'Via Laura', 'Piazza Gentile', 'Rotonda Donati', 'Via Tuscolana', 'Via Prenestina', 'Via Cassia', 'Via Flaminia', 'Via Tiburtina', 'Via Appia Antica', 'Via Salaria', 'Via Casilina', 'Via Ostienese', 'Via Aurelia', 'Viale Jonio', 'Via Di Casal Boccone', 'Via Nomentana', 'Via Roberto Bracco', 'Via della Bufalotta', 'Via Matteo Bandello', 'Via Jacopo Sannazzaro', 'Via Umberto Fracchia', 'Via Dei Prati Fiscali', 'Via di val Melaina', 'Via Monte Fumaiolo', 'Via Jacopo Sannazzano', 'Piazzale Flaminio', 'Piazza Fiume', 'Piazza Ungheria', 'Viale Parioli', 'Porta Del Popolo', 'Viale Liegi', 'Piazza del Parco Della Rimembranza'];
        $hours = ['12', '13', '14', '19', '20', '21'];
        $minutes = ['00', '05', '10', '15', '20', '25', '30', '35', '40', '45', '50', '55'];

        $restaurants = User::all();

        foreach ($restaurants as $restaurant){
            for ($i = 0; $i < 200; $i++){
                $newOrder = new Order();
                $newOrder->user_id = $restaurant->id;
                $newOrder->client_name = $names[array_rand($names)];
                $newOrder->client_surname = $surnames[array_rand($surnames)];
                $newOrder->delivery_address = $streets[array_rand($streets)] . ', ' . $faker->randomNumber(2);
                $newOrder->chosen_delivery_time = $hours[array_rand($hours)] . ':' . $minutes[array_rand($minutes)] . ':00';
                $newOrder->client_email = $faker->email();
                $newOrder->client_phone = '3' . $faker->randomNumber(2, true) . $faker->randomNumber(5, true);
                $newOrder->total = 0;
                $newOrder->save();
                
                $numRows = random_int(1, 10);
                $dishes = Dish::where('user_id', $restaurant->id)->get()->toArray();
                $dishesUsed = [];
                for ($j = 0; $j < $numRows; $j++){
                    $index = array_rand($dishes);
                    if (!in_array($index, $dishesUsed)){
                    array_push($dishesUsed, $index);
                    $num = random_int(1, 3);
                    $newOrder->dishes()->attach(
                        $dishes[$index]['id'], ['quantity' => $num]
                    );}
                }

                $total = 0;
                $orderDetail = $newOrder->dishes->toArray();
                foreach ($orderDetail as $detail){
                    $total += $detail['price'] * $detail['pivot']['quantity'];
                }

                $newOrder->created_at = $faker->dateTimeBetween('-1 year');
                $newOrder->sent = $newOrder->created_at;
                $newOrder->total = $total;
                $newOrder->update();
            }
        }
    }
}
