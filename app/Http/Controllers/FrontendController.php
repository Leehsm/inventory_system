<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

use App\Models\Product;


class FrontendController extends Controller
{
    public function index(){

        $product = Product::get();
        return view('index', compact('product'));
    }
}
