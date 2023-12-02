<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;
use Alert;
use session;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       //
    }

    public function login()
    {
        return view('signin');
    }
    public function login_auth(request $request)
         {
         $data=user::where('unm','=',$request->unm)->first();

         if($data){
            if(Hash::check($request->password,$data->password)){
                session()->put('userid',$data->id);
                session()->put('name',$data->name);
                Alert::success('Congrats', 'You\'ve Successfully Login');
				return redirect('/index');
            }
            else{
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
        return view('signup');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=new user();
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->date_of_birth=$request->date_of_birth;
        $data->unm=$request->unm;

        $data->password=Hash::make($request->password);
        $data->gender=$request->gender;
        $file=$request->file('file');
        $filename=time().'_img.'.$request->file('file')->getClientOriginalExtension();
        $file->move('upload/user/',$filename);
        $file=$data->file=$filename;
        $data->save();
        Alert::success('Congrats', 'You\'ve Successfully Registered');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $data=DB::table('users')->get();
        return view('display',['data'=>$data]);  
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data=user::find($id);
        return view('/edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user,$id)
    {
            $data=user::find($id);
            $data->name=$request->name;
            $data->email=$request->email;
            $data->phone=$request->phone;
            $data->gender=$request->gender;
            $data->date_of_birth=$request->date_of_birth;
            $data->unm=$request->unm;
        
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
            return redirect('/display');
            
           }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user,$id)
    {
        $data=user::find($id);
        $filename=$data->file;
         if($filename!="")
        {

            unlink('upload/user/'.$filename);
        }
        user::find($id)->delete();
        Alert::success('Congrats', 'You\'ve Successfully Deleted');
        return redirect()->back();

    }
}
