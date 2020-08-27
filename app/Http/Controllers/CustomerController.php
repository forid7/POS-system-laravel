<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class CustomerController extends Controller
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

    //new customer form view
    public function index()
    {
    	return view('add_customer');
    }

    public function store(Request $request)
    {

       $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|unique:customers|max:255',
        'phone' => 'required|unique:customers|max:255',
        'address' => 'required',
        'image' => 'required',
        'city' => 'required',
    ]); 

       $data=array();
       $data['name']=$request->name;
       $data['email']=$request->email;
       $data['phone']=$request->phone;
       $data['address']=$request->address;
       $data['shopname']=$request->shopname;
       $data['account_holder']=$request->account_holder;
       $data['account_number']=$request->account_number;
       $data['bank_name']=$request->bank_name;
       $data['bank_branch']=$request->bank_branch;
       $data['city']=$request->city;
      // $data['photo']=$request->photo;

       $image=$request->file('image');
    	 //  $image=$request->image;

    	  if($image){
          $image_name=str_random(5);
          $ext=strtolower($image->getClientOriginalExtension());
          $image_full_name=$image_name.'.'.$ext;
          $upload_path='public/customer/';
          $image_url=$upload_path.$image_full_name;
          $success=$image->move($upload_path,$image_full_name);

          if($success){
            $data['image']=$image_url;
            $customer=DB::table('customers')->insert($data);

            if ($customer) {
          $notification=array(
              'messege'=>'Successfully Customer inserted',
              'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
        }else{
        	$notification=array(
              'messege'=>'Error',
              'alert-type'=>'success'
        );
          return Redirect()->back()->with($notification);
        }
          }
          else{
          	//echo "hello1";
          	return Redirect()->back();
          }

        }
        else{
        	//echo "hello2";
          return Redirect()->back();
        }
    }

    public function AllCustomer()
    {   
    	$customer=DB::table('customers')->get();
    	return view('all_customer')->with('customer',$customer);
    }

    public function ViewCustomer($id)
    {
    	$single=DB::table('customers')
    	        ->where('id',$id)
    	        ->first();
    	   
             return view('view_customer',compact('single'));

    } 

    //delete single customer
    public function DeleteCustomer($id)
    {
      $delete=DB::table('customers')
              ->where('id',$id)
              ->first();
         
            $image=$delete->image;
            unlink($image);
            $dltuser=DB::table('customers')
            ->where('id',$id)
            ->delete();

            if ($dltuser) {
          $notification=array(
              'messege'=>'Successfully Customer Deleted',
              'alert-type'=>'success'
        );
        return Redirect()->route('all.customer')->with($notification);
        }else{
          $notification=array(
              'messege'=>'Error',
              'alert-type'=>'success'
        );
          return Redirect()->back()->with($notification);
        }

    }

    

    //update a single Employee
    public function UpdateCustomer(request $request,$id)
    {
         $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|max:255',
        'phone' => 'required|max:255',
        'address' => 'required',
        'image' => 'required',
        'city' => 'required',
    ]);

          
       
       $data['name']=$request->name;
       $data['email']=$request->email;
       $data['phone']=$request->phone;
       $data['address']=$request->address;
       $data['shopname']=$request->shopname;
       $data['account_holder']=$request->account_holder;
       $data['account_number']=$request->account_number;
       $data['bank_name']=$request->bank_name;
       $data['bank_branch']=$request->bank_branch;
       $data['city']=$request->city;

         

         $image=$request->image;

         if($image){
          $image_name=str_random(5);
          $ext=strtolower($image->getClientOriginalExtension());
          $image_full_name=$image_name.'.'.$ext;
          $upload_path='public/customer/';
          $image_url=$upload_path.$image_full_name;
          $success=$image->move($upload_path,$image_full_name);

          if($success){
            $data['image']=$image_url;
            $img=DB::table('customers')->where('id',$id)->first();
            $image_path = $img->image;
            $done=unlink($image_path);
            $user=DB::table('customers')->where('id',$id)->update($data);

            if ($user) {
          $notification=array(
              'messege'=>'Successfully Employee updated',
              'alert-type'=>'success'
        );
        return Redirect()->route('all.customer')->with($notification);
        }else{
          $notification=array(
              'messege'=>'Error',
              'alert-type'=>'success'
        );
          return Redirect()->back()->with($notification);
        }
          }
          else{
            //echo "hello1";
            return Redirect()->back();
          }

        }
        else{
          //echo "hello2";
          return Redirect()->back();
        }
    }

     //Single customer for data show edit
    public function EditCustomer($id)
    {
      $edit= DB::table('customers')
           ->where('id',$id)
           ->first();

           return view('edit_customer',compact('edit'));
    }
}
