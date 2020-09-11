<?php

use Illuminate\Database\Seeder;
use App\Product;
class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product;
        $product->name = "Panda";
        $product->description = "Panda Ballpen";
        $product->price = 5.00;
        $product->save();

        $product1 = new Product;
        $product1->name = "Mongol 1";
        $product1->description = "Mongol Pencil";
        $product1->price = 8.00;
        $product1->save();

        $product2 = new Product;
        $product2->name = "Paper";
        $product2->description = "Yellow Pad";
        $product2->price = 2.00;
        $product2->save();
    }
}
