<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class SalaryController extends Controller
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

     public function AddAdvancedSalary()
     {
     	return view('advanced_salary');
     }

     public function AllSalary()
     {  
     	$salary=DB::table('advance_salaries')
     	->join('employees','advance_salaries.emp_id','employees.id')
     	->select('advance_salaries.*','employees.name','employees.salary','employees.image')
     	->orderBy('id','DESC')
     	->get();


     	return view('all_advanced_salary',compact('salary'));


     }


     public function InsertAdvanced(Request $request)
     {

     	$month=$request->month;
     	$emp_id=$request->emp_id;
     	$year=$request->year;

     	$advanced=DB::table('advance_salaries')

     	->where('month',$month)
     	->where('emp_id',$emp_id)
     	->where('year',$year)
     	->first();

     	if($advanced===NULL){
     		$data=array();
     		$data['emp_id']=$request->emp_id;
     		$data['month']=$request->month;
     		$data['advanced_salary']=$request->advanced_salary;
     		$data['year']=$request->year;

     		$advanced=DB::table('advance_salaries')->insert($data);
     		if ($advanced) {
     			$notification=array(
     				'messege'=>'Successfully advance paid',
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
     	}else{
     		$notification=array(
     			'messege'=>'You have already paid advance',
     			'alert-type'=>'error'

     		);
     		return Redirect()->back()->with($notification);
     	}


     }

     public function PaySalary()
     {  
        
        /*$month = date("F",strtotime('-1 month'));

     	$salary=DB::table('advance_salaries')
     	->join('employees','advance_salaries.emp_id','employees.id')
     	->select('advance_salaries.*','employees.name','employees.salary','employees.image')
     	->orderBy('id','DESC')
     	->where('month',$month)
     	->get();
     	//return view('pay_salary',compact('salary'));*/
     	
          $employee=DB::table('employees')->get();

          return view('pay_salary',compact('employee'));
     }



     //Category Functions are here------


     public function AddCategory()
     {
          return view('add_category');
     }

     public function InsertCategory(Request $request)
     {    
          $data=array();
          $data['cat_name']=$request->cat_name;
          $cat=DB::table('categories')->insert($data);

          if ($cat) {
                    $notification=array(
                         'messege'=>'Successfully category inserted',
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

     public function AllCategory()
     {    
          $category=DB::Table('categories')->get();
          return view('all_category',compact('category'));
     }

     public function DeleteCategory($id)
     {
          $dlt=DB::table('categories')->where('id',$id)->delete();
          if ($dlt) {
                    $notification=array(
                         'messege'=>'Successfully category deleted',
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

     public function EditCategory($id)
     {
          $cat=DB::table('categories')->where('id',$id)->first();
          return view('edit_category')->with('cat',$cat);
     }


     public function UpdateCategory(Request $request, $id)
     {  
        $data=array();
        $data['cat_name']=$request->cat_name;
        $cat=DB::table('categories')->where('id',$id)->update($data);

        if ($cat) {
                    $notification=array(
                         'messege'=>'Successfully category updated',
                         'alert-type'=>'success'
                    );
                    return Redirect()->route('all.category')->with($notification);
               }else{
                    $notification=array(
                         'messege'=>'Error',
                         'alert-type'=>'success'
                    );
                    return Redirect()->back()->with($notification);
               }
     }

 }
