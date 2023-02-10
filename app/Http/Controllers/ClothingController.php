<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Clothing;

class ClothingController extends Controller
{
    public function clothing(){

        $clothing = Clothing::get();

        return view('clothing.view', compact('clothing'));
    }

    public function clothingAdd(){
        return view('clothing.add');
    }

    public function clothingStore(Request $req){

        $clothing = Clothing::insert([
            'name' => $req->name,
            'phone' => $req->phone,
            'address' => $req->address,
            'dob' => $req->dob,
            'admin' => $req->admin,
        ]);

        return redirect()->route('clothing')->with('success', 'Clothing customer created successfully!');

    }

    
    public function clothingEdit($id){

        $clothing = Clothing::findOrFail($id);
        return view('clothing.edit', compact('clothing'));

    }

    public function clothingUpdate(Request $req){

        $id = $req->id;

        Clothing::findOrFail($id)->update([
            'name' => $req->name,
            'phone' => $req->phone,
            'address' => $req->address,
            'dob' => $req->dob,
            'admin' => $req->admin,
        ]);

        $notification = array(
            'message' => 'Customer Clothing DB Updated Successfully',
            'alert-type' => 'info'
        );
        
        return redirect()->route('clothing')->with($notification);

    }

    
    public function clothingDelete($id){
        
        Clothing::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Customer Clothing DB Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }

    
    public function clothingSearch(){
        
    }
}
