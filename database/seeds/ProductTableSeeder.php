<?php


use Illuminate\Database\Seeder;
use App\Models\Account as Account;
use App\Models\Category as Category;
use App\Models\Product as Product;

class ProductTableSeeder extends DatabaseSeeder {

    public function run() {
        $faker = $this->getFaker();

        $categories = Category::all();

        foreach ($categories as $category) {
            for ($i = 0; $i < 40; $i++) {
                $name = ucwords($faker->word);
                $stock = $faker->numberBetween(0, 100);
                $price = $faker->numberBetween(2, 5, 100);


                //generate unique 8 code               
                //$code = substr(uniqid('hjmoe56d2hhuJteXZADuH' . mt_rand()), 0, 8);
                $code = uniqid();




                Product::create([
                    "code" => $code,
                    "name" => $name." ".ucwords($faker->word)." ".ucwords($faker->word),
                    "stock" => $stock,
                    "mrp" => $price,
                    "price" => $price,
                    "discount" => $faker->numberBetween(5, 30),
                    
                    "category_id" => $category->id,
                    "image" => $name,
                    "short_desc" => '<ul>                    
                        <li><span class="text">Dual SIM (GSM + GSM)</span></li>
                        <li><span class="text">0.3 MP Primary Camera</span></li>
                        <li><span class="text">1.8-inch LCD Screen</span></li>
                    </ul>',
                    "long_desc" => "Deep Red Ruffle Top 

A stylish top in red colour. The top features three fourth sleeves. The top is designed with ruffle V neck collar cascading in the center. Pair the dainty top with light brown trousers and heels.
Fabric: 100% Polyster
Fit: Semi-Fitted
Model Statistics:
Height - 172 cm / 5 ft. 8 inches .
Waist - 63 cm / 25 inches.
Model is wearing size XS. ",
                ]);
            }
        }
    }

}
