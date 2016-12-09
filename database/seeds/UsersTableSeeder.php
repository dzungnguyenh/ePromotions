<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create('vi_VN');
      for ($i=1; $i < 4; $i++) {
        User::create([
          'name' => $faker->name,
          'email' => 'user'.$i.'@gmail.com',
          'password' => bcrypt('12345678'),
          'role_id'=> $i,
          'created_at' => $faker->dateTimeThisYear($max = 'now')
        ]);
      }
    }
}
