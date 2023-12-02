<?php

namespace App\Http\Controllers;
use App\Rules\GenderValidationRule;
use App\Rules\LanguageValidationRule;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Alert;

class userController extends Controller
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
        return view('website/add_data');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
			'name' => 'required|string|max:255',			
			'email' => 'required|email',
			'file' =>'required|image',
			'gender' => ['required', new GenderValidationRule],
			'language' => ['required', new LanguageValidationRule],		
		]);	

			$data=new user;
			$data->name=$request->name;
			$data->email=$request->email;
			$data->gender=$request->gender;
			$data->language=implode(",",$request->language); // string convert
			$file=$request->file('file');
			$filename=time().'_img.'.$request->file('file')->getClientOriginalExtension(); // 545646545_img.png
			$file->move('upload/user/',$filename);
			$data->file=$filename;
		
	    
		
		//$file=
		
		$data->save();
		
		
	    Alert::success('Congrats', 'You\'ve Successfully Registered');

		return redirect('/index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {   $data=user::all();
        return view('website/display',['data_user'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user,$id)
    {
        $data=user::find($id);
        return view('website/edit_data',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user,$id)
    {
        $data=user::find($id);
		$data->name=$request->name;
		$data->email=$request->email;	 
	    $data->gender=$request->gender;	 
		$data->language=implode(",",$request->language);
		
	//image upload
	  if($request->file('file'))
	  {
			$old_img=$data->file;
			unlink('upload/user/'.$old_img);
			
			$file=$request->file('file');
			$filename=time().'_img.'.$request->file('file')->getClientOriginalExtension();
			$file->move('upload/user/',$filename);
			$data->file=$filename;
	      }	  
			$data->update();
			Alert::success('Congrats', 'You\'ve Successfully update');
			return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user,$id)
    {
        $data=user::find($id);
		//customer::find($id)->delete(); 
		 $filename=$data->file;
		//data deleted with unlink imgage
		 user::find($id)->delete();
         if($filename!=" ")
		 {
			unlink('upload/user/'.$filename);
		 }	

		
		Alert::success('Congrats', 'You\'ve Successfully deleted');

		return redirect()->back();
    }
}
