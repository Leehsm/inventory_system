<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    public function product(){
        $product = Product::get();

        return view('product.view', compact('product'));
    }

    public function productAdd(){
        return view('product.add');
    }

    public function productStore(Request $req){
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

        return redirect()->route('product.add')->with('success', 'Product created successfully!');
    }

    public function productEdit($id){

        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    public function productUpdate(Request $req){

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
        
        return redirect()->route('product')->with($notification);

    }

    public function productDelete(){
        
    }
    
    public function productsearch(Request $request){

        $query = $request->input('search');
        $products = Product::where('name', 'like', "%$query%")
                   ->orWhere('code', 'like', "%$query%")
                   ->get();

        return view('product.search', compact('products'));
    }
}
