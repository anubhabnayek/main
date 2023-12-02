<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;
use session;

class employeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         if ($request->hasFile('file')) {
            $image = $request->file('file');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move('upload/customer/', $filename);
        
            DB::table('employees')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'gender' => $request->gender,
				'department' => $request->department,
				'salary' => $request->salary,

                'image' => $filename,
            ]);
        
            return redirect('/index')->with('sucess','regsiter sucess');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(employee $employee)
    {
         $data=DB::table('employees')->get();
         return view('display',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(employee $employee,$id)
    {
     $data=DB::table('employees')->find($id);
     return view('/editprofile1',["data"=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
         if($request->hasFile('file')) {
                $old_img=$request->file;
                // unlink('upload/customer/'.$old_img);
                $image=$request->file('file');
                $filename=time().'_img.'.$request->file('file')->getClientOriginalExtension();
                $image->move('upload/customer/',$filename);
            
                $data=DB::table('employees')->where('id',$id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'phone' => $request->phone,
                'gender' => $request->gender,
				'department' => $request->department,
				'salary' => $request->salary,

                'image' => $filename,
                ]);
            } else {
                $data=DB::table('employees')->where('id',$id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'phone' => $request->phone,
                'gender' => $request->gender,
				'department' => $request->department,
				'salary' => $request->salary,
                ]);
            }
			return redirect('/display')->with('sucess','update sucess');

    }

    
    public function destroy(employee $employee)
    {
         $data=DB::table('employees')->where('id', $id)->delete();

            return redirect('/display');
        
    }
}
