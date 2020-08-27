<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class SupplierController extends Controller
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
    	return view('add_supplier');
    }

    public function store(Request $request)
    {

       $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|unique:suppliers|max:255',
        'phone' => 'required|unique:suppliers|max:255',
        'address' => 'required',
        'image' => 'required',
        'city' => 'required',
    ]); 

       $data=array();
       $data['name']=$request->name;
       $data['email']=$request->email;
       $data['phone']=$request->phone;
       $data['address']=$request->address;
       $data['shop']=$request->shop;
       $data['accountholder']=$request->accountholder;
       $data['accountnumber']=$request->accountnumber;
       $data['bankname']=$request->bankname;
       $data['branchname']=$request->branchname;
       $data['city']=$request->city;
       $data['type']=$request->type;
      // $data['photo']=$request->photo;

       $image=$request->file('image');
    	 //  $image=$request->image;

    	  if($image){
          $image_name=str_random(5);
          $ext=strtolower($image->getClientOriginalExtension());
          $image_full_name=$image_name.'.'.$ext;
          $upload_path='public/suppliers/';
          $image_url=$upload_path.$image_full_name;
          $success=$image->move($upload_path,$image_full_name);

          if($success){
            $data['image']=$image_url;
            $customer=DB::table('suppliers')->insert($data);

            if ($customer) {
          $notification=array(
              'messege'=>'Successfully supplier inserted',
              'alert-type'=>'success'
        );
        return Redirect()->route('all.supplier')->with($notification);
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

    public function AllSupplier()
    {
    	$supplier=DB::table('suppliers')->get();
    	return view('all_supplier',compact('supplier'));
    }
      
      public function ViewSupplier($id)
      {
      	$supplier=DB::table('suppliers')->where('id',$id)->first();
      	return view('view_supplier',compact('supplier'));
      }


      public function DeleteSupplier($id)
      {
      	$delete=DB::table('suppliers')
              ->where('id',$id)
              ->first();
         
            $image=$delete->image;
            unlink($image);
            $dltuser=DB::table('suppliers')
            ->where('id',$id)
            ->delete();

            if ($dltuser) {
          $notification=array(
              'messege'=>'Successfully Supplier Deleted',
              'alert-type'=>'success'
        );
        return Redirect()->route('all.supplier')->with($notification);
        }else{
          $notification=array(
              'messege'=>'Error',
              'alert-type'=>'success'
        );
          return Redirect()->back()->with($notification);
        }
      }

      public function EditSupplier($id)
      {
         $sup=DB::table('suppliers')->where('id',$id)->first();
         return view('edit_supplier',compact('sup'));
      }

      public function UpdateSupplier(Request $request,$id)
      {
       $data=array();
       $data['name']=$request->name;
       $data['email']=$request->email;
       $data['phone']=$request->phone;
       $data['address']=$request->address;
       $data['shop']=$request->shop;
       $data['accountholder']=$request->accountholder;
       $data['accountnumber']=$request->accountnumber;
       $data['bankname']=$request->bankname;
       $data['branchname']=$request->branchname;
       $data['city']=$request->city;
       $data['type']=$request->type;
      // $data['image']=$request->image;

       $image=$request->image;

       if($image){
          $image_name=str_random(5);
          $ext=strtolower($image->getClientOriginalExtension());
          $image_full_name=$image_name.'.'.$ext;
          $upload_path='public/suppliers/';
          $image_url=$upload_path.$image_full_name;
          $success=$image->move($upload_path,$image_full_name);

          if($success){
            $data['image']=$image_url;
            $img=DB::table('suppliers')->where('id',$id)->first();
            $image_path = $img->image;
            $done=unlink($image_path);
            $user=DB::table('suppliers')->where('id',$id)->update($data);

            if ($user) {
          $notification=array(
              'messege'=>'Successfully Supplier updated',
              'alert-type'=>'success'
        );
        return Redirect()->route('all.supplier')->with($notification);
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
         // echo "hello2";
          $old_photo=$request->old_photo;
          if($old_photo){
            $data['image']=$old_photo;
          
            $user=DB::table('suppliers')->where('id',$id)->update($data);

            if ($user) {
          $notification=array(
              'messege'=>'Successfully Supplier updated',
              'alert-type'=>'success'
        );
        return Redirect()->route('all.supplier')->with($notification);
        }else{
          $notification=array(
              'messege'=>'Error',
              'alert-type'=>'success'
        );
          return Redirect()->back()->with($notification);
        }
          }
        }

      }

}
