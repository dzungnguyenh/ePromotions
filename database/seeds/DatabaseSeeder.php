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
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(EventTableSeeder::class);
        $this->call(VoucherTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(PromotionTableSeeder::class);
        $this->call(ExchangeVoucherTableSeeder::class);
        $this->call(PointTableSeeder::class);
    }
}
