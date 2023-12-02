<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\ValidGender;
use Hash;
use Alert;
use App\Mail\signupemail;
use Mail;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return view('website/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
		    $validated = $request->validate([
		   'name' => 'required|string|max:255',			
		    //'email' => 'required|email|unique:users',
		    'username' => 'required',
            'department' => 'required|string|max:255',
			'password' => 'required|max:8|max:12',
			'mobile' => 'required|regex:/^\+?[0-9]{1,4}-?[0-9]+$/',
			'file' =>'required|image',
			'gender' => ['required', new ValidGender],
			
]);			
        $data=new user;
		$name=$data->name=$request->name;
		$email=$data->email=$request->email;
		$data->username=$request->username;
		$data->password=Hash::make($request->password);
		$data->mobile=$request->mobile;
		$data->gender=$request->gender;
		$data->department=$request->department;
		$file=$request->file('file');
		$filename=time().'_img.'.$request->file('file')->getClientOriginalExtension();
		$file->move('upload/employee/',$filename);
		$data->file=$filename;
		$data->save();
        $maildata=array("name"=>$name,"email"=>$email);
		Mail::to($email)->send(new signupemail($maildata));	
		Alert::success('Congrats', 'You\'ve Successfully Registered');

		return back();
		
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
