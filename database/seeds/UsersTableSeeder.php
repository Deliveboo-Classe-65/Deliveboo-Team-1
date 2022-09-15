<?php

use Illuminate\Database\Seeder;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Dish;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'email' => 'diablo@gmail.com',
                'password' => 'diablo123',
                'name' => 'Diablo',
                'description' => '',
                'address' => 'Via della Liberazione 42',
                'image' => '/img/ristoranti/diablo.jpg',
                'vat_number' => '11101010100',
                'dishes' => [
                    [
                        'name' => "Burrito",
                        'price' => 4.99,
                        'description' => "Il burrito o taco de harina è una pietanza che appartiene alla cucina tex-mex e consiste in una tortilla di farina di grano riempita con carne di bovino, pollo o maiale, che è poi chiusa ottenendo una forma sottile."
                    ],
                    [
                        'name' => "Chilaquiles",
                        'price' => 4.99,
                        'description' => "Per chilaquiles si intende delle tortilla di mais che, dopo essere state tagliate in quarti e leggermente fritte, vengono ammorbidite e insaporite in un composto a base di salsa verde o rossa, carne di pollo, formaggio e fagioli fritti."
                    ]
                ]
            ],
            [
                'email' => 'cinese@gmail.com',
                'password' => 'cinese123',
                'name' => 'cinese',
                'description' => '',
                'address' => 'Via della Liberazione 42',
                'image' => '/img/ristoranti/cinese.jpg',
                'vat_number' => '11101010100',
                'dishes' => [
                    [
                        'name' => "Nuvole di drago",
                        'price' => 4.99,
                        'description' => "Il burrito o taco de harina è una pietanza che appartiene alla cucina tex-mex e consiste in una tortilla di farina di grano riempita con carne di bovino, pollo o maiale, che è poi chiusa ottenendo una forma sottile."
                    ],
                    [
                        'name' => "Involtini primavera",
                        'price' => 4.99,
                        'description' => "Per chilaquiles si intende delle tortilla di mais che, dopo essere state tagliate in quarti e leggermente fritte, vengono ammorbidite e insaporite in un composto a base di salsa verde o rossa, carne di pollo, formaggio e fagioli fritti."
                    ]
                ]
            ]       
        ];

        foreach($users as $user) {
            $newUser = new User();
            $newUser->email = $user['email'];
            $newUser->password = Hash::make($user['password']);
            $newUser->name = $user['name'];
            $newUser->slug = Str::slug($user['name']);
            $newUser->address = $user['address'];
            $newUser->image = $user['image'];
            $newUser->vat_number = $user['vat_number'];
            $newUser->save();
            foreach($user['dishes'] as $dish) {
                $newDish = new Dish();
                $newDish->user_id = $newUser->id;
                $newDish->name = $dish['name'];
                $newDish->price = $dish['price'];
                $newDish->description = $dish['description'];
                $newDish->save();
            }
        }
    }
}
