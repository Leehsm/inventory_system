<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    public function inventory(){

        $products = DB::table('products')
                    ->join('sizes', 'products.id', '=', 'sizes.product_id')
                    ->select('products.*', 'sizes.size_type as size', 'sizes.quantity as quantity')
                    ->get();

        return view('inventory.view', compact('products'));
    }

    public function inventoryAdd(){
        return view('inventory.add');
    }

    public function inventorysearch(Request $request){

        $query = $request->input('search');
        $products = Product::where('name', 'like', "%$query%")
                   ->orWhere('code', 'like', "%$query%")
                   ->get();

        return view('search', ['products' => $products]);
    }
}
