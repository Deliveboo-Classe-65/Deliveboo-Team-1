<?php

use App\Category;
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
        // Create a user array, which represents a list of restaurants. 
        // Each user will have an email, a password, a name, a description, an address, an image src and a vat_number.
        // It also has one key for an array of categories and one for an array of dishes, which are objects.
        // Each dish will have a name, a price and a description. It may also have an image src and a visibility key.
        $users = [
            [
                'email' => 'diablo@gmail.com',
                'password' => 'diablo123',
                'name' => 'Diablo',
                'description' => 'Al Diablo potrai gustare i veri sapori e colori del Messico in piatti che riprendono le ricette tradizionali messicane con uno stile contemporaneo',
                'address' => 'Via della Liberazione 42',
                'image' => 'diablo.png',
                'vat_number' => '11101010100',
                'categories' => [
                    'messicano'
                ],
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
                    ],
                    [
                        'name' => "Enchilada",
                        'price' => 4.69,
                        'description' => "La enchilada (o, solitamente, enchiladas) è un piatto tipico della tradizione culinaria messicana, composto da una tortilla ripiena, arrotolata su se stessa e condita con salsa chili. Il ripieno della tortilla può essere di vari tipi: carne, formaggio, verdura, fagioli."
                    ],

                ]
            ],
            [
                'email' => 'summerpalace@gmail.com',
                'password' => 'summerpalace123',
                'name' => 'Summer Palace',
                'description' => 'Ristorante Cinese che serve solo cibo autentico del Sichuan, ricette tradizionali, una esperienza nuova.',
                'address' => 'Via della Pistoiese 120',
                'image' => 'summer_palace.jpg',
                'vat_number' => '11101010101',
                'categories' => [
                    'cinese'
                ],
                'dishes' => [
                    [
                        'name' => "Nuvole di drago",
                        'price' => 4.99,
                        'description' => "Le nuvole di drago sono un tipico antipasto cinese. Sono delle patate fritte di colore bianco a base di granchio, particolarmente leggere. Generalmente sono accompagnate dalla tipica salsa agrodolce cinese"
                    ],
                    [
                        'name' => "Involtini primavera",
                        'price' => 4.99,
                        'description' => "Gli involtini primavera sono un antipasto tipico cinese, molto apprezzato in Occidente. Sono dei fagottini di pasta con un ripieno di verdure, di carne o misto e in origine venivano preparati per festeggiare il Capodanno Cinese, che portava con sè anche la primavera."
                    ]
                ]
            ],      
            [
                'email' => 'nikkosushi@gmail.com',
                'password' => 'nikkosushi123',
                'name' => 'Nikko Sushi',
                'description' => 'Ristorante giapponese a Roma che offre piatti cucinati da chef esperti della cucina e della tradizione giapponese, come il sushi, sashimi e noodles. ',
                'address' => 'Via Ognissanti',
                'image' => 'nikko_sushi.jpg',
                'vat_number' => '22202020202',
                'categories' => [
                    'giapponese'
                ],
                'dishes' => [
                    [
                        'name' => "Nighiri",
                        'price' => 5.99,
                        'description' => "8 pezzi, nigiri è una pallina ovale di riso, modellata a mano e guarnita da una fettina sottile di pesce. Solitamente si tratta di salmone, tonno, anguilla, polpo, gambero o anche di frittata."
                    ],
                    [
                        'name' => "Hosomaki",
                        'price' => 5.99,
                        'description' => "8 pezzi, un tipico hosomaki consiste in un rotolino di riso avvolto in alga Nori (un particolare tipo di alga, che viene essiccata e tostata). Il ripieno può essere di pesce, crostacei, frutta o verdura."
                    ]
                ]
            ],       
            [
                'email' => 'rajaindianloungerestaurant@gmail.com',
                'password' => 'rajaindianloungerestaurant123',
                'name' => 'Raja Indian Lounge Restaurant',
                'description' => 'Benvenuti al Raja, dove la tradizionale cucina indiana si unisce alla famosa ospitalità di questo meraviglioso paese. Specialità indiane cucinate con cura e raffinatezza, una incredibile varietà di pietanze per incontrare, ne siamo certi, il gusto degli italiani.',
                'address' => 'Via Ferrucci 22/B',
                'image' => 'raja_indian_lounge_restaurant.jpg',
                'vat_number' => '22202020203',
                'categories' => [
                    'indiano'
                ],
                'dishes' => [
                    [
                        'name' => "Daulat Ki Chaat",
                        'price' => 6.70,
                        'description' => "Deliziosi anche i dolci indiani tipici tra cui non posso non menzionare il Daulat ki Chaat, un vero e proprio soufflé a base di latte, panna, zucchero, pistacchi e spezie quali lo zafferano. Si tratta di una ricetta dipica della città di Delhi, ma diffusa in tutto il Paese, apprezzata sia per la colazione che per un goloso fine pasto."
                    ],
                    [
                        'name' => "Kati Rool",
                        'price' => 5.20,
                        'description' => "Il Kati Roll invece, originario di Calcutta è un tipico cibo da strada del tutto simile a un kebab: la ricetta consiste nell’arrotolare all’interno del pane paratha, una sorta di piadina, carne di agnello e verdure. E’ comunque possibile gustare kati con carne di pollo o accompagnarlo a una rinfrescante salsa a base di lime o limone, o ancora al chaat masala, miscela di spezie e mango in polvere."
                    ],
                    [
                        'name' => "Pollo Tandoori",
                        'price' => 7,70,
                        'description' => "Il Pollo Tandoori è senza dubbio una delle tipicità che fanno parte della cucina indiana, anche se particolarmente popolare anche nella cucina del sud-est asiatico. Consiste nel marinare il pollo in una salsa di yogurt e spezie chiamata Tandoori Masala che prevede l’utilizzo di coriandolo, cumino, aglio, cannella, cardamomo, pepe di Cayenna, pepe, zenzero, chiodi di garofano e alloro per poi cuocerlo come da tradizione all’interno di particolari forni di argilla detti Tandoor da cui trae origine il nome."
                    ],
                ]
            ],       
            [
                'email' => 'atomicfalafel@gmail.com',
                'password' => 'atomicfalafel123',
                'name' => 'Atomic Falafel',
                'description' => 'Atomic Falafel propone il vero gusto dello street food mediorientale portando le sue speziate fragranze a Roma.',
                'address' => 'Via Cavour 116',
                'image' => 'atomic_falafel.jpg',
                'vat_number' => '33303030303',
                'categories' => [
                    'arabo'
                ],
                'dishes' => [
                    [
                        'name' => "Hummus",
                        'price' => 4.20,
                        'description' => "L'hummus è una salsa a base di pasta di ceci e pasta di semi di sesamo (tahina) aromatizzata con olio di oliva, aglio, succo di limone e paprica, semi di cumino in polvere e prezzemolo finemente tritato."
                    ],
                    [
                        'name' => "Labneh",
                        'price' => 4.99,
                        'description' => "Il labneh, pronunciato anche labaneh, è un tipo di yogurt di colore bianco, realizzato con latte di pecora, vacca, occasionalmente con latte di capra, tipico delle cucine del Medio Oriente."
                    ],
                    [
                        'name' => "Manakeesh",
                        'price' => 4.99,
                        'description' => "Lo Za'atar è una miscela di spezie originaria del Medio Oriente. Il termine arabo zaʿtar si riferisce ad alcune piante locali della famiglia delle Lamiaceae, tra le quali maggiorana, origano e timo."
                    ],
                ]
            ],      
            [
                'email' => 'ilsipario@gmail.com',
                'password' => 'ilsipario123',
                'name' => 'Il Sipario',
                'address' => 'Via Firenze 66',
                'image' => 'il_sipario.jpg',
                'vat_number' => '44404040404',
                'categories' => [
                    'pizza', 'italiano'
                ],
                'dishes' => [
                    [
                        'name' => "Margherita",
                        'price' => 4.50,
                        'description' => "La pizza Margherita è la tipica pizza napoletana, condita con pomodoro, mozzarella, basilico fresco, sale e olio; è, assieme alla pizza marinara, la più popolare pizza italiana."
                    ],
                    [
                        'name' => "Diavola",
                        'price' => 6.00,
                        'description' => "Pomodoro, mozzarella, acciughe, cipolle, olive, olio piccante"
                    ],
                    [
                        'name' => "Capricciosa",
                        'price' => 6.50,
                        'description' => "La pizza capricciosa è una pizza tipica della cucina italiana caratterizzata da un condimento di pomodoro, mozzarella, prosciutto cotto (o spesso anche crudo), funghi (di solito champignon), olive verdi e nere, e carciofini e spesso uova."
                    ],
                    [
                        'name' => "Wurstel patatine",
                        'price' => 5.50,
                        'description' => "La pizza würstel e patatine è notoriamente la pizza preferita dai bambini, quindi farete felici i vostri piccoli se inserirete anche questo gusto alla prossima pizzata in famiglia, garantito."
                    ],

                ]
            ],
            [
                'email' => 'runnerpizza@gmail.com',
                'password' => 'runnerpizza123',
                'name' => 'Runner Pizza',
                'address' => 'Via dei Casini 60/A',
                'image' => 'runner_pizza.png',
                'vat_number' => '66606060606',
                'categories' => [
                    'pizza'
                ],
                'dishes' => [
                    [
                        'name' => "Margherita",
                        'price' => 4.50,
                        'description' => "La pizza Margherita è la tipica pizza napoletana, condita con pomodoro, mozzarella, basilico fresco, sale e olio; è, assieme alla pizza marinara, la più popolare pizza italiana."
                    ],
                    [
                        'name' => "Diavola",
                        'price' => 6.00,
                        'description' => "Pomodoro, mozzarella, acciughe, cipolle, olive, olio piccante"
                    ],
                    [
                        'name' => "Capricciosa",
                        'price' => 6.50,
                        'description' => "La pizza capricciosa è una pizza tipica della cucina italiana caratterizzata da un condimento di pomodoro, mozzarella, prosciutto cotto (o spesso anche crudo), funghi (di solito champignon), olive verdi e nere, e carciofini e spesso uova."
                    ],
                    [
                        'name' => "Wurstel patatine",
                        'price' => 5.50,
                        'description' => "La pizza würstel e patatine è notoriamente la pizza preferita dai bambini, quindi farete felici i vostri piccoli se inserirete anche questo gusto alla prossima pizzata in famiglia, garantito."
                    ],

                ]
            ],
            [
                'email' => 'mcdonalds@gmail.com',
                'password' => 'mcdonalds123',
                'name' => 'McDonalds',
                'description' => "La McDonald's Corporation è una catena di ristoranti di fast food statunitense",
                'address' => 'Via Cavour 116',
                'image' => 'mcdonalds.jpg',
                'vat_number' => '55505050505',
                'categories' => [
                    'hamburger'
                ],
                'dishes' => [
                    [
                        'name' => "Big Mac",
                        'price' => 6.60,
                        'description' => "Il classico che mette d’accordo tutti, con carne bovina al 100%, formaggio, salsa Big Mac, insalata, cipolla, cetriolo e pane."
                    ],
                    [
                        'name' => "Mc Chicken",
                        'price' => 4.90,
                        'description' => "Tutta la semplicità del petto di pollo avvolto in una panatura croccante, insieme all’insalata iceberg e all’inconfondibile salsa McChicken. Con petto di pollo italiano, insalata iceberg, salsa McChicken e pane."
                    ],
                    [
                        'name' => "Gran Crispy McBacon",
                        'price' => 6.20,
                        'description' => "Chi ama il Crispy McBacon® ne prenderebbe volentieri un altro e un altro e un altro e un altro ancora. Per questo c’è il Gran Crispy McBacon®: carne 100% bovina da allevamenti italiani, croccante bacon 100% da pancetta italiana, formaggio e l'inconfondibile salsa Crispy. Come il classico, ma ancora più grande. Con carne 100% bovina, formaggio, bacon, salsa Crispy e pane."
                    ],
                ]
            ],             
            [
                'email' => 'burgerking@gmail.com',
                'password' => 'burgerking123',
                'name' => 'Burger King',
                'description' => "IL NOSTRO GUSTO? SUPERIORE. BURGER KING®. A MODO TUO.",
                'address' => 'Via Cava 100',
                'image' => 'burger_king.jpg',
                'vat_number' => '77707070707',
                'categories' => [
                    'hamburger'
                ],
                'dishes' => [
                    [
                        'name' => "Big King",
                        'price' => 6.80,
                        'description' => "Il re degli hamburger è qui. Il nostro BIG KING® ti conquisterà con doppia carne di manzo alla griglia, formaggio e deliziosa salsa BIG KING®. Un hamburger decisamente maestoso, che, con i suoi 4 pollici di diametro, rende merito al proprio nome."
                    ],
                    [
                        'name' => "Grilled Chicken Royale",
                        'price' => 5.20,
                        'description' => "Panino con petto di pollo grigliato Fileni 100% Italiano, il mix perfetto per chi vuole consumare cibo genuino senza rinunciare al gusto! I polli sono allevati a terra e vengono nutriti con alimenti 100% italiani. L'abbinamento con il soncino, il pomodoro, i delicati petali di parmigiano reggiano e la maionese contribuiscono a rendere questo panino veramente unico e delizioso!"
                    ],
                    [
                        'name' => "Bacon King 3.0",
                        'price' => 6.70,
                        'description' => "L'evoluzione del Bacon King: 3 strati di carne alla griglia, 3 strati di formaggio e 8 fette di delizioso bacon. Vieni a scoprire Bacon King 3.0 in tutta la sua esagerazione."
                    ],
                ]
            ],             
            [
                'email' => 'faridkebab@gmail.com',
                'password' => 'faridkebab123',
                'name' => 'Farid Kebab',
                'description' => "Il miglior kebab di Roma comodamente a casa tua.",
                'address' => 'Via Santa Trinita 30',
                'image' => 'farid_kebab.jpg',
                'vat_number' => '99909090909',
                'categories' => [
                    'arabo'
                ],
                'dishes' => [
                    [
                        'name' => "Panino Kebab",
                        'price' => 3.50,
                        'description' => "Il kebab, in turco kebap, significa carne arrostita. È un piatto tipico della cucina turca a base di carne, diventato popolare in tutto il mondo grazie alle immigrazioni provenienti dal Medio Oriente"
                    ],
                    [
                        'name' => "Piadina Kebab",
                        'price' => 4.00,
                        'description' => "Una buona piadina è sempre un’ottima idea per un pranzo veloce o da consumare fuori casa. Questa versione con kebab di pollo e verdure è particolarmente sfiziosa e particolare"
                    ],
                    [
                        'name' => "Falafel",
                        'price' => 4.00,
                        'description' => "I falafel sono una pietanza mediorientale costituita da polpette di legumi speziate e fritte. I più utilizzati sono le fave, i ceci e i fagioli tritati e conditi con sommacco, cipolla, aglio, cumino e coriandolo. I falafel sostituivano la carne nei giorni del digiuno dei copti egiziani. Il termine è formato da tre parole che in copto significavano letteralmente 'con tanti fagioli'."
                    ],
                ]
            ]             
        ];

        // Start iterating on the array
        foreach($users as $user) {
            // Create an istance of the User model
            $newUser = new User();
            // Set its values
            $newUser->email = $user['email'];
            // Save the hashed password only
            $newUser->password = Hash::make($user['password']);
            $newUser->name = $user['name'];
            // Save a slug
            $newUser->slug = Str::slug($user['name']);
            if (key_exists('description', $user)) {
                $newUser->description = $user['description'];
            }
            $newUser->address = $user['address'];
            $newUser->image = $user['image'];
            $newUser->vat_number = $user['vat_number'];
            // Save data to database
            $newUser->save();

            // Start iterating on the categories array
            foreach($user['categories'] as $category) {
                // Find the matching category in the database
                $variable = Category::where('name', $category)->first();
                // Link the user to its category
                $newUser->categories()->attach($variable);
            }

            // Start iterating on the dishes array
            foreach($user['dishes'] as $dish) {
                // Create an istance of the Dish model
                $newDish = new Dish();
                // Set the value of the user_id FK
                $newDish->user_id = $newUser->id;
                // Set its values
                $newDish->name = $dish['name'];
                $newDish->price = $dish['price'];
                $newDish->description = $dish['description'];
                if (key_exists('image', $dish)) {
                    $newDish->image = $dish['image'];
                }
                $newDish->visibility = 1;
                // Save data to database
                $newDish->save();
            }
        }
    }
}
