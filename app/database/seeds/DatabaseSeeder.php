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

        $this->call(RolesTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(StoreTableSeeder::class);
        $this->call(PriceTableSeeder::class);

    }
}
