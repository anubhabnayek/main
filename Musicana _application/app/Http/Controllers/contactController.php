<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;
use Hash;
use Alert;
class contactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('website/contact');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
			'name' => 'required|string|max:255',			
			'email' => 'required|email',
			'comment' => 'required',
				
		]);	
		 $data=new contact;
		$data->name=$request->name;
		$data->email=$request->email;
	    $data->comment=$request->comment;

		
		$data->save();
		/*$maildata=array("nameemail"=>$nameemail,"email"=>$email);
		Mail::to($email)->send(new signupemail($maildata));*/	
		
	    Alert::success('Congrats', 'You\'ve message send Successfully');

		return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(contact $contact)
    {
        //
    }
}
