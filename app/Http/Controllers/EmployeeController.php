<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Employee;

class EmployeeController extends Controller
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
    	return view('add_employee');
    }


 //insert employee
    public function store(Request $request)
    {
    	  $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|unique:employees|max:255',
        'nid_no' => 'required|unique:employees|max:255',
        'address' => 'required',
        'phone' => 'required|max:15',
        'image' => 'required',
        'salary' => 'required',
    ]);
    	  $data=array();
    	  $data['name']=$request->name;
    	  $data['email']=$request->email;
    	  $data['phone']=$request->phone;
    	  $data['address']=$request->address;
    	  $data['experience']=$request->experience;
    	  $data['nid_no']=$request->nid_no;
    	  $data['salary']=$request->salary;
    	  $data['vacation']=$request->vacation;
    	  $data['city']=$request->city;

    	  $image=$request->file('image');
    	 //  $image=$request->image;

    	  if($image){
          $image_name=str_random(5);
          $ext=strtolower($image->getClientOriginalExtension());
          $image_full_name=$image_name.'.'.$ext;
          $upload_path='public/employee/';
          $image_url=$upload_path.$image_full_name;
          $success=$image->move($upload_path,$image_full_name);

          if($success){
            $data['image']=$image_url;
            $employee=DB::table('employees')->insert($data);

            if ($employee) {
          $notification=array(
              'messege'=>'Successfully Employee inserted',
              'alert-type'=>'success'
        );
        return Redirect()->route('home')->with($notification);
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

    //all employees return here
    public function Employees()
    {
        $employees=Employee::all();
        return view('all_employee',compact('employees'));
    }

    //view single employee
    public function ViewEmployee($id)
    {
    	$single=DB::table('employees')
    	        ->where('id',$id)
    	        ->first();
    	   
             return view('view_employee',compact('single'));

    }   

    //delete single employee
    public function DeleteEmployee($id)
    {
    	$delete=DB::table('employees')
    	        ->where('id',$id)
    	        ->first();
    	   
            $image=$delete->image;
            unlink($image);
            $dltuser=DB::table('employees')
            ->where('id',$id)
            ->delete();

            if ($dltuser) {
          $notification=array(
              'messege'=>'Successfully Employee Deleted',
              'alert-type'=>'success'
        );
        return Redirect()->route('all.employee')->with($notification);
        }else{
        	$notification=array(
              'messege'=>'Error',
              'alert-type'=>'success'
        );
          return Redirect()->back()->with($notification);
        }

    }
    //Single Employee for data show edit
    public function EditEmployee($id)
    {
    	$edit= DB::table('employees')
    	     ->where('id',$id)
    	     ->first();

    	     return view('edit_employee',compact('edit'));
    }

    //update a single Employee
    public function UpdateEmployee(request $request,$id)
    {
         $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|max:255',
        'nid_no' => 'required|max:255',
        'address' => 'required',
        'phone' => 'required|max:15',
        'salary' => 'required',
    ]);

          
        $data['name']=$request->name;
    	  $data['email']=$request->email;
    	  $data['phone']=$request->phone;
    	  $data['address']=$request->address;
    	  $data['experience']=$request->experience;
    	  $data['nid_no']=$request->nid_no;
    	  $data['salary']=$request->salary;
    	  $data['vacation']=$request->vacation;
    	  $data['city']=$request->city;

         

         $image=$request->image;

         if($image){
          $image_name=str_random(5);
          $ext=strtolower($image->getClientOriginalExtension());
          $image_full_name=$image_name.'.'.$ext;
          $upload_path='public/employee/';
          $image_url=$upload_path.$image_full_name;
          $success=$image->move($upload_path,$image_full_name);

          if($success){
            $data['image']=$image_url;
            $img=DB::table('employees')->where('id',$id)->first();
            $image_path = $img->image;
            $done=unlink($image_path);
            $user=DB::table('employees')->where('id',$id)->update($data);

            if ($user) {
          $notification=array(
              'messege'=>'Successfully Employee updated',
              'alert-type'=>'success'
        );
        return Redirect()->route('all.employee')->with($notification);
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
}
