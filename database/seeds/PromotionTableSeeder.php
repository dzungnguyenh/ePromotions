<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Product;

class PromotionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      $products = Product::all()->pluck('id');
      for($i = 0; $i < 10; $i++) {
        $created = $faker->dateTimeThisDecade($max = 'now');
        $updated = $faker->dateTimeThisDecade($max = 'now');
        $start = $faker->dateTimeThisMonth($min = 'now');
        $end = $faker->dateTimeThisMonth($min = 'now');
        if($created <= $updated && $start < $end) {
          DB::table('promotions')->insert([
              'title' => $faker->sentence($nbWords = 100, $variableNbWords = true),
              'description' => $faker->text(),
              'percent' => $faker->numberBetween($max = 100, $min = 1),
              'quantity' => $faker->numberBetween($max = 100000, $min = 1),
              'date_start' => $start,
              'date_end' => $end,
              'product_id' => $faker->randomElement($products->toArray()),
              'created_at' => $created,
              'updated_at' => $updated,
          ]);
        } else {
          $i--;
        }
      }
    }
}
