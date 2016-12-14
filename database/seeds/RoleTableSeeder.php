<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        do {
          $created = $faker->dateTimeThisDecade($max = 'now');
          $updated = $faker->dateTimeThisDecade($max = 'now');
        } while($created > $updated);

        DB::table('roles')->insert([
          [
            'role' => 'Admin',
            'created_at' => $created,
            'updated_at' => $updated,
          ],
          [
            'role' => 'Business',
            'created_at' => $created,
            'updated_at' => $updated,
          ],
          [
            'role' => 'User',
            'created_at' => $created,
            'updated_at' => $updated,
          ]
        ]);
    }
}
