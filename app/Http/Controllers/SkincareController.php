<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Skincare;

class SkincareController extends Controller
{
    public function skincare(){

        $skincare = Skincare::get();

        return view('skincare.view', compact('skincare'));
    }

    public function skincareAdd(){
        return view('skincare.add');
    }

    public function skincareStore(Request $req){

        $skincare = Skincare::insert([
            'name' => $req->name,
            'phone' => $req->phone,
            'address' => $req->address,
            'dob' => $req->dob,
            'admin' => $req->admin,
        ]);

        return redirect()->route('skincare')->with('success', 'Skincare customer created successfully!');

    }

    
    public function skincareEdit($id){

        $skincare = Skincare::findOrFail($id);
        return view('skincare.edit', compact('skincare'));

    }

    public function skincareUpdate(Request $req){

        $id = $req->id;

        Skincare::findOrFail($id)->update([
            'name' => $req->name,
            'phone' => $req->phone,
            'address' => $req->address,
            'dob' => $req->dob,
            'admin' => $req->admin,
        ]);

        $notification = array(
            'message' => 'Customer Skincare DB Updated Successfully',
            'alert-type' => 'info'
        );
        
        return redirect()->route('skincare')->with($notification);

    }

    
    public function skincareDelete($id){
        
        Skincare::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Customer Skincare DB Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }

    
    public function skincaresearch(Request $request){
        
        $query = $request->search;
        // dd($query);

        $skincaresearch = Skincare::Where('name', 'like', "%$query%")->orWhere('phone', 'like', "%$query%")->get();

        // dd($clothingsearch);

        return view('skincare.search', compact('skincaresearch'));

    }
}
