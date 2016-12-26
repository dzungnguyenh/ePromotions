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
        DB::table('user')->insert([
          'name' => 'Admin',
          'email' => 'admin@gmail.com',
          'password' => bcrypt('123456'),
          'verified' => $faker->numberBetween($max = 1, $min = 0),
          'role_id' => '1',
          'token' => str_random(40),
          'remember_token' => str_random(100),
          'created_at' => $faker->dateTimeThisDecade($max = 'now'),
          'updated_at' => $faker->dateTimeThisDecade($max = 'now'),
        ]);
        for($i = 0; $i < 100; $i++) {
          do {
            $created = $faker->dateTimeThisDecade($max = 'now');
            $updated = $faker->dateTimeThisDecade($max = 'now');
          } while($created > $updated);
          if($created <= $updated) {
            DB::table('user')->insert([
              'name' => $faker->firstName().' '.$faker->lastName(),
              'email' => $faker->unique()->userName().'@gmail.com',
              'password' => bcrypt('123456'),
              'gender' => $faker->numberBetween($max = 3, $min = 1),
              'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
              'phone' => $faker->numberBetween($max = 1000000000, $min = 99999999999),
              'address' => $faker->address,
              'point' => $faker->numberBetween($min = 0, $max = 1000),
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
