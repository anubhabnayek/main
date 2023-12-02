<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Hash;
use Alert;
class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }
	 public function login()
    {
       return view('admin/admin_login'); 
    }
	
	public function adminlogin_auth(Request $request)
    {
		
     $validated = $request->validate([
				
			'username' => 'required|',
			'password' => 'required|',]);
     $data=admin::where('username','=',$request->username)->first();
		if($data)
			
		{
			if(Hash::check($request->password,$data->password))
			{
				//session create
				session()->put('adminid',$data->id);
				session()->put('adminname',$data->username);
				
				//use session => session('name') // session()->get('name')
			Alert::success('Congrats', 'You\'ve Successfully Login');
			return redirect('/admin_dashboard');
			}
			else
			{
			Alert::success('Failed', 'Wrong password');
	         return redirect()->back();
			}
		}
		else{
			 Alert::success('Failed', 'Wrong username');
	         return redirect()->back();
		}
			
			
	  	   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        
    }
	public function logout()
    {
        session()->pull('adminid');
		session()->pull('adminname');
		Alert::success('Congrats', 'You\'ve Successfully logout');
		
		return redirect('/admin_login');
    }
}
