<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategoryTableSeeder extends Seeder
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

        DB::table('categories')->insert([
          [
            'name' => 'Fashion',
            '_lft' => 1,
            '_rgt' => 2,
            'created_at' => $created,
            'updated_at' => $updated,
          ],
          [
            'role' => 'Houseware',
            '_lft' => 3,
            '_rgt' => 4,
            'created_at' => $created,
            'updated_at' => $updated,
          ],
          [
            'name' => 'Electrics',
            '_lft' => 5,
            '_rgt' => 6,
            'created_at' => $created,
            'updated_at' => $updated,
          ],
          [
            'name' => 'Vehicle',
            '_lft' => 7,
            '_rgt' => 8,
            'created_at' => $created,
            'updated_at' => $updated,
          ],
          [
            'name' => 'Other',
            '_lft' => 9,
            '_rgt' => 10,
            'created_at' => $created,
            'updated_at' => $updated,
          ]
        ]);
    }
}
