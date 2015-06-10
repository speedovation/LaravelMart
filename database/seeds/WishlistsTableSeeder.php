<?php


use Illuminate\Database\Seeder;
use App\Models\User;

class WishlistsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		//DB::table('wishlists')->truncate();

		$wishlists = array(
            'user_id' => '1',
            'product_code' => 'somecode'

		);

		// Uncomment the below to run the seeder
		DB::table('wishlists')->insert($wishlists);
	}

}
