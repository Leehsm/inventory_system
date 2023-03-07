<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

use App\Models\Product;
use App\Models\Size;


class FrontendController extends Controller
{
    public function index(){

        // $product = Product::get();
        // $size = Size::get();

        $product = DB::table('products')
                   ->join('sizes', 'products.id', '=', 'sizes.product_id')
                   ->select('products.*', 'sizes.id as size_id', 'sizes.size_type as size', 'sizes.quantity as quantity')
                   ->get();

        // dd($product);

        return view('index', compact('product'));
    }
}
