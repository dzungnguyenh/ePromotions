<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;

class PointTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i = 1; $i <= 1; $i++) {
          $created = $faker->dateTimeThisDecade($max = 'now');
          $updated = $faker->dateTimeThisDecade($max = 'now');
          if($created <= $updated) {
            DB::table('points')->insert([
                'vote' => 1,
                'share' => 1,
                'book' => 10,
                'created_at' => $created,
                'updated_at' => $updated,
            ]);
          } else {
            $i--;
          }
        }
    }
}
