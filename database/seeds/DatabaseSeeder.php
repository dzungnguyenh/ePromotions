<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(PromotionTableSeeder::class);
    }
}
class PromotionTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('promotions')->insert([
            array('title' => 'What is Lorem Ipsum?','description'=>'Lorem Ipsum is simply dummy text of the '
                . 'printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text'
                . 'ever since the 1500s, when an unknown printer took a galley of type and scrambled it to'
                . ' make a type specimen book','percent'=>10,'quantity'=>5,'product_id'=>3),
        ]);
    }
}
