<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\InventoryItem;
use App\SalesItem;
use App\InventoryConfig;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin', 'technician']);

        $user = Auth::user();

        $total_inventory_count = InventoryItem::all()->sum('quantity');
        $total_sales_count = SalesItem::all()->sum('quantity');
        $total_inventory_amount = DB::table('inventory_items')
                            ->selectRaw('(quantity * price) as total_amount')->get()->sum('total_amount');
        $total_sales_amount = DB::table('sales_items')
                            ->selectRaw('(quantity * price) as total_amount')->get()->sum('total_amount');     
        return view('home', compact('user','total_inventory_count','total_sales_count','total_inventory_amount', 'total_sales_amount'));
    }
}
