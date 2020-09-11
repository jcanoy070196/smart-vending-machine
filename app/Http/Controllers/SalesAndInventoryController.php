<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\InventoryItem;
use App\SalesItem;
use App\Product;
use App\InventoryConfig;
class SalesAndInventoryController extends Controller
{
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin', 'technician']);

        $inventory_items = InventoryItem::all();
        $inventory_configs = InventoryConfig::all();
        $sales_items = SalesItem::all();
        $products = Product::all();

        
        return view('sales and inventory', compact('inventory_configs','inventory_items', 'sales_items','products'));
    }
}
