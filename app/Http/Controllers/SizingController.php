<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


use App\Models\Product;
use App\Models\Size;

class SizingController extends Controller
{
    public function Size(){

        $size = DB::table('products')
                    ->join('sizes', 'products.id', '=', 'sizes.product_id')
                    ->select('products.*', 'sizes.size_type as size', 'sizes.quantity as quantity')
                    ->get();

        return view('size.view', compact('size'));
    }

    public function sizeAdd(){

        $products = Product::all();
        return view('size.add', compact('products'));
    }

    public function sizeStore(Request $req){

        $product = Size::insert([
            'product_id' => $req->product_code,
            'size_type' => $req->size,
            'quantity' => $req->qty,
        ]);

        return redirect()->route('size')->with('success', 'Product size created successfully!');

    }
}
