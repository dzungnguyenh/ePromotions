<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;

class VoucherTableSeeder extends Seeder
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
        for($i = 1; $i <= 100; $i+=10) {
          $created = $faker->dateTimeThisDecade($max = 'now');
          $updated = $faker->dateTimeThisDecade($max = 'now');
          if($created <= $updated) {
            $point = $i * 1000;
            DB::table('vouchers')->insert([
                'name' => 'Voucher '.$point,
                'point' => $i,
                'value' => $point,
                'user_id' => $faker->randomElement($users->toArray()),
                'created_at' => $created,
                'updated_at' => $updated,
            ]);
          } else {
            $i-=10;
          }
        }
    }
}
