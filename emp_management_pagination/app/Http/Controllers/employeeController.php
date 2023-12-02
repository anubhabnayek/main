<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;
use Alert;

class employeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee/form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=new employee;
		$data->name=$request->name;
		$data->email=$request->email;
        $data->date_of_birth=$request->date_of_birth;
		$data->password=Hash::make($request->password);
		$data->gender=$request->gender;
		$data->phone=$request->phone;
		$data->lag=implode(",",$request->lag);
		$data->department=$request->department;
		$data->salary=$request->salary;
		
		$file=$request->file('file');
		$filename=time().'_img.'.$request->file('file')->getClientOriginalExtension();
		$file->move('upload/employee/',$filename);
		$data->file=$filename;
		
	   
		
		//$file=
		
		$data->save();
	    Alert::success('Congrats', 'You\'ve Successfully Registered');

		return back();
		

    }

    /**
     * Display the specified resource.
     */
    public function show(employee $employee)
    {
        $data=employee::paginate(2);
         return view('employee/table',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(employee $employee)
    {
        //
    }
}
