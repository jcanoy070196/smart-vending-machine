<?php

use Illuminate\Database\Seeder;
use App\InventoryConfig;
class InventoryConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inventoryConfig1 = new InventoryConfig();
        $inventoryConfig1->product_id = 1;
        $inventoryConfig1->quantity = 0;
        $inventoryConfig1->save();

        $inventoryConfig2 = new InventoryConfig();
        $inventoryConfig2->product_id = 2;
        $inventoryConfig2->quantity = 0;
        $inventoryConfig2->save();

        $inventoryConfig3 = new InventoryConfig();
        $inventoryConfig3->product_id = 3;
        $inventoryConfig3->quantity = 0;
        $inventoryConfig3->save();
    }
}
