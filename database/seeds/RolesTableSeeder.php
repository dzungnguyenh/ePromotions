<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();
      for ($i=1; $i < 4; $i++) {
        Role::create([
        	'role' => $faker->name,
          'created_at' => $faker->dateTimeThisYear($max = 'now')
        ]);
      }
    }
}
