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
                    ->select('products.*', 'sizes.id as size_id', 'sizes.size_type as size', 'sizes.quantity as quantity')
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

    public function sizeEdit($id){

        $size = Size::findOrFail($id);
        return view('size.edit', compact('size'));
    }

    public function sizeUpdate(Request $req){
        $id = $req->id;

        Size::findOrFail($id)->update([
            'size_type' => $req->size,
            'quantity' => $req->qty,
        ]);

        $notification = array(
            'message' => 'Size Updated Successfully',
            'alert-type' => 'info'
        );
        
        return redirect()->route('inventory')->with($notification);

    }

    public function sizeDelete($id){

        Size::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Size Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
        
    }

    public function sizesearch(Request $request){

        $query = $request->search;
        // dd($query);

        $productsizesearch = DB::table('products')
                            ->join('sizes', 'products.id', '=', 'sizes.product_id')
                            ->select('products.*', 'sizes.id as size_id', 'sizes.size_type as size', 'sizes.quantity as quantity')
                            ->where('products.name', 'like', "%$query%")
                            ->orWhere('products.code', 'like', "%$query%")
                            ->get();

        // dd($clothingsearch);

        return view('size.search', compact('productsizesearch'));

    }
}
