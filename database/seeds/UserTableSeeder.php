<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('vi_VN');
        $roles = Role::all()->pluck('id');
        for($i = 0; $i < 10; $i++) {
          $created = $faker->dateTimeThisDecade($max = 'now');
          $updated = $faker->dateTimeThisDecade($max = 'now');
          if($created <= $updated) {
            DB::table('user')->insert([
              'name' => $faker->firstName().' '.$faker->lastName(),
              'email' => $faker->unique()->userName().'@gmail.com',
              'password' => bcrypt('123456'),
              'gender' => $faker->numberBetween($max = 2, $min = 0),
              'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
              'phone' => $faker->numberBetween($max = 1000000000, $min = 99999999999),
              'address' => $faker->address,
              'avatar' => 'avatar.jpg',
              'point' => $faker->randomNumber(),
              'role_id' => $faker->randomElement($roles->toArray()),
              'verified' => $faker->numberBetween($max = 1, $min = 0),
              'token' => str_random(40),
              'remember_token' => str_random(100),
              'created_at' => $created,
              'updated_at' => $updated,
            ]);
          } else {
            $i--;
          }
        }
    }
}
