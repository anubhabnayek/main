<?php

namespace App\Http\Controllers;
use App\Models\customer;
use Illuminate\Support\Facades\DB;
use App\Models\forgotpassword;
use Illuminate\Http\Request;
use Hash;
use Alert;
use App\Mail\otpemail;
use Mail;
class forgotpasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      return view('website/forgot');
    }
	 public function forgot_pass(request $request)
    {
       $validated = $request->validate([
				
			'email' => 'required|email|',
			]);
     		$data=customer::where('email','=',$request->email)->first();
			if($data){
				  
				 $email=$data->email=$request->email;
				 $otp =rand(000000,999999);
				 //$data->save();
				$maildata=array("email"=>$email,"otp"=>$otp);
		        Mail::to($email)->send(new otpemail($maildata));
                session()->put('email',$data->email);
                Session()->put('otp',$otp); 	
			
				return redirect('/otp');
			}
			else{
				Alert::success('Failed', 'Wrong Email');
				return redirect()->back();
			}
    }


    /**
     * Show the form for creating a new resource.
     */
    public function otp_match(Request $request)
    {
       $otp=$request->otp;
       if($otp==session()->get('otp')){

        session()->pull('otp');
        return redirect('/reset');

       }
       else{
        Alert::success('Failed', 'Wrong otp');
				return redirect()->back();
       }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function reset_pass(Request $request)
    {

        $password=$request->password;
        $confirm_password=$request->confirm_password;
        $session_email=session()->get('email');
        if($password == $confirm_password){
        //echo session('email');
       // DB::enableQueryLog();
        $id=customer::where('email','=',$session_email)->first()->id;
       // echo "<pre>"; print_r($id);exit;
        //dd(DB::getQueryLog());
        $data=customer::find($id);
        $data->password=Hash::make($request->password);
        $data->save();
        session()->pull('otp');
        session()->pull('email');
        //logut session
        session()->pull('userid');
        session()->pull('username');
		session()->pull('name');
		Alert::success('Congrats', 'You\'ve password reset Successfully please login again');
		
		return redirect('/signin');
        }
        else{
            Alert::success('Failed', 'password and confrimpasword should be not same');
            return redirect()->back();  
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(forgotpassword $forgotpassword)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(forgotpassword $forgotpassword)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, forgotpassword $forgotpassword)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(forgotpassword $forgotpassword)
    {
        //
    }
}
