<?php

namespace App\Http\Controllers;

use App\Models\admin;
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
	
	public function login_auth(Request $request)
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
        // $data=
    }

    /**
     * Display the specified resource.
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(admin $admin)
    {
        //
    }
    public function logout()
    {
        session()->pull('adminid');
		session()->pull('adminname');
		Alert::success('Congrats', 'You\'ve Successfully logout');
		
		return redirect('/admin-login');
    }
}
