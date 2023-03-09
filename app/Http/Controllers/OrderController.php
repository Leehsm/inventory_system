<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Cart;

use App\Models\InHouseOrder;
use App\Models\SavedOrder;
use App\Models\Order;

use Carbon\Carbon;
use PDF;

class OrderController extends Controller
{
    public function orderList()
    {
        $orderItems = \Cart::getContent();
        // dd($orderItems);
        return view('order', compact('orderItems'));
    }


    public function addToCart(Request $request)
    {
        $product = DB::table('products')
                   ->join('sizes', 'products.id', '=', 'sizes.product_id')
                   ->select('products.*', 'sizes.id as size_id', 'sizes.size_type as size', 'sizes.quantity as quantity')
                   ->get();

        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            // 'color' => $request->color,
            // 'size' => $request->size,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return view('index', compact('product'));
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('order');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('order');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('order');
    }

    public function saveAllCart(Request $request){
        $invNo = '#INV'.mt_rand(10000000,99999999);
        $total_amount = Cart::getTotal();
        // dd($total_amount);

        $order_id = Order::insertGetId([
            'invNo' => $invNo,
            'cust_name' => $request->customer_name,
            'total' => $total_amount,
            'created_at' => Carbon::now(),
        ]);

        $carts = Cart::getContent();
        foreach ($carts as $cart) {
            // dd($cart->attributes->image);
            InHouseOrder::insert([
                'order_id' => $order_id,
                'image' => $cart->attributes->image, 
                'name' => $cart->name,
                'quantity' => $cart->quantity,
                'price' => $cart->price,
                'created_at' => Carbon::now(),
            ]);
        }
        Cart::clear();
        // $saved = Order::orderBy('id','DESC')->get();

        // return view('order.saved', compact('saved'));
        return redirect()->route('saved-order');
    }

    public function savedOrder(){

        $saved = Order::orderBy('id','DESC')->get();

        return view('order.saved', compact('saved'));
        
    }

    public function orderDetail($id){
        $order = Order::where('id',$id)->first();
        $orderItem = InHouseOrder::where('order_id', $id)->get();
        // dd($order);

        return view('order.detail', compact('order', 'orderItem'));
    }

    public function InvoiceDownload($id){
        $order = Order::where('id',$id)->first();
    	$orderItem = InHouseOrder::where('order_id',$id)->orderBy('id','DESC')->get();
        
		$pdf = PDF::loadView('order.invoice', compact('order','orderItem'));
		return $pdf->download('invoice.pdf');
    }
}
