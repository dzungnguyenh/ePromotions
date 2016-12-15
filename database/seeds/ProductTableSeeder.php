<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;
use App\Models\Category;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      $users = User::all()->pluck('id');
      $categories = Category::all()->pluck('id');
      for($i = 0; $i < 100; $i++) {
        $created = $faker->dateTimeThisDecade($max = 'now');
        $updated = $faker->dateTimeThisDecade($max = 'now');
        if($created <= $updated) {
          DB::table('products')->insert([
            'product_name' => $faker->sentence($nbWords = 6, $variableNbWords = true),
            'price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 1000000),
            'description' => $faker->text(),
            'quantity' => $faker->randomNumber(),
            'picture' => 'product.jpg',
            'category_id' => $faker->randomElement($categories->toArray()),
            'user_id' => $faker->randomElement($users->toArray()),
            'created_at' => $created,
            'updated_at' => $updated,
          ]);
        } else {
          $i--;
        }
      }
    }
}
