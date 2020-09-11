<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Role comes before User seeder here.
        $this->call(RoleTableSeeder::class);
        // User seeder will use the roles above created.
        $this->call(UserTableSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(StudentsSeeder::class);
        $this->call(InventoryConfigSeeder::class);
        $this->call(InventoryItemsSeeder::class);
        $this->call(SalesItemsSeeder::class);
        
    }
}
