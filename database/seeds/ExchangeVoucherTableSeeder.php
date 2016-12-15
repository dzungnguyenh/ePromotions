<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Voucher;
use App\User;

class ExchangeVoucherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $vouchers = Voucher::all()->pluck('id');
        $users = User::all()->pluck('id');
        for($i = 0; $i < 10; $i++) {
          $created = $faker->dateTimeThisDecade($max = 'now');
          $updated = $faker->dateTimeThisDecade($max = 'now');
          if($created <= $updated) {
            DB::table('exchange_vouchers')->insert([
              'user_id' => $faker->randomElement($users->toArray()),
              'voucher_id' => $faker->randomElement($vouchers->toArray()),
              'status' => $faker->numberBetween($max = 1, $min = 0),
              'created_at' => $created,
              'updated_at' => $updated,
            ]);
          } else {
            $i--;
          }
        }
    }
}
