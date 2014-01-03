<?php

class ProductTableSeeder extends DatabaseSeeder {

    public function run() {
        $faker = $this->getFaker();

        $categories = Category::all();

        foreach ($categories as $category) {
            for ($i = 0; $i < 40; $i++) {
                $name = ucwords($faker->word);
                $stock = $faker->randomNumber(0, 100);
                $price = $faker->randomFloat(2, 5, 100);

                Product::create([
                    "name" => $name,
                    "stock" => $stock,
                    "price" => $price,
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