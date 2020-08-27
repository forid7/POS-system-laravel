<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class PosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$product=DB::table('products')
        ->join('categories','products.cat_id','categories.id')
        ->select('categories.cat_name','products.*')
    	->get();
    	$customer=DB::table('customers')->get();
    	$categories=DB::table('categories')->get();
        return view('pos',compact('product','customer','categories'));
    }

    public function PendingOrder()
    {
        $pending=DB::table('orders')
                ->join('customers','orders.customer_id','customers.id')
                ->select('customers.name','orders.*')->where('order_status','pending')->get();
        return view('pending_order',compact('pending'));
    }

    public function ViewOrder($id)
    {
       $order=DB::table('orders')
             ->join('customers','orders.customer_id','customers.id')
             ->where('orders.id',$id)
             ->first();

        $order_details=DB::table('orderdetails')
                      ->join('products','orderdetails.product_id','products.id')
                      ->select('orderdetails.*','products.product_name','products.product_code')
                      ->where('order_id',$id)
                      ->get();  

               return view('order_confirmation',compact('order','order_details'));          
       
    }

    public function PosDONE($id)
    {
       $approve=DB::table('orders')->where('customer_id',$id)->update(['order_status'=>'success']);

       /*if ($approve) {
          $notification=array(
              'messege'=>'Successfully Order Confirmed ',
              'alert-type'=>'success'
        );
        return Redirect()->route('pending.orders')->with($notification);
        }else{
            $notification=array(
              'messege'=>'Error',
              'alert-type'=>'success'
        );
          return Redirect()->back()->with($notification);
        }*/

        if ($approve) {
          $notification=array(
              'messege'=>'Product Added',
              'alert-type'=>'success'
        );
        return Redirect()->route('pending.orders')->with($notification);
        }else{
            $notification=array(
              'messege'=>'Error',
              'alert-type'=>'success'
        );
          return Redirect()->back()->with($notification);
        }

    }

    public function SuccessOrder()
    {
        $success=DB::table('orders')
                ->join('customers','orders.customer_id','customers.id')
                ->select('customers.name','orders.*')->where('order_status','success')->get();
        return view('success_order',compact('success'));
    }
}
