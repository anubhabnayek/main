<?php

namespace App\Http\Controllers;
use App\Models\customer;

use App\Models\contact;
use Illuminate\Http\Request;
use Hash;
use Alert;
//load create mail file
use App\Mail\contactemail;
use Mail;


class contactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      

    /**
     * Show the form for creating a new resource.
    	*/
	}
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
        'email' => 'required|email|max:255',
        'comment' => 'required|string|max:1000',
        ]);
        $data=new contact;
		$name=$data->name=$request->name;
		$email=$data->email=$request->email;
		$data->comment=$request->comment;
		$data->save();
        $maildata=array("name"=>$name,"email"=>$email);
        Mail::to($email)->send(new contactemail($maildata));	    
		

		return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(contact $contact)
    {
		$data=contact::all();
        return view('admin/manage_feedback',['data_contacts'=>$data]);
		 
		 
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
    public function destroy(contact $contact,$id)
    {
       contact::find($id)->delete(); 
	   Alert::success('Congrats', 'You\'ve Successfully deleted');

	    return redirect()->back();

    }
}
