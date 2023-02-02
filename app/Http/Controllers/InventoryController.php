<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

use App\Models\Product;

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

    public function inventoryStore(Request $req){
        $image = $req->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->save('upload/products/'.$name_gen);
        $save_url = 'upload/products/'.$name_gen;

        $product = Product::insert([
            'name' => $req->name,
            'code' => $req->code,
            'color' => $req->color,
            'image' => $save_url,
            'price' => $req->price,
        ]);

        return redirect()->route('inventory.add')->with('success', 'Product created successfully!');
    }

    public function inventoryEdit($id){

        $product = Product::findOrFail($id);
        return view('inventory.edit', compact('product'));
    }

    public function inventoryUpdate(Request $req){

        $id = $req->id;
        $old_image = $req->old_image;

        if($req->file('image')){
        
            unlink($old_img);
            $image = $req->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->save('upload/products/'.$name_gen);
            $save_url = 'upload/products/'.$name_gen;

            Product::findOrFail($id)->update([
                'name' => $req->name,
                'code' => $req->code,
                'color' => $req->color,
                'image' => $save_url,
                'price' => $req->price,
            ]);

            $notification = array(
                'message' => 'Product Updated Successfully',
                'alert-type' => 'info'
            );

        }else{

            Product::findOrFail($id)->update([
                'name' => $req->name,
                'code' => $req->code,
                'color' => $req->color,
                'price' => $req->price,
            ]);

            $notification = array(
                'message' => 'Product Updated Successfully',
                'alert-type' => 'info'
            );

        }
        
        return redirect()->route('inventory')->with($notification);

    }

    public function inventoryDelete(){
        
    }
    
    public function inventorysearch(Request $request){

        $query = $request->input('search');
        $products = Product::where('name', 'like', "%$query%")
                   ->orWhere('code', 'like', "%$query%")
                   ->get();

        return view('search', ['products' => $products]);
    }
}
