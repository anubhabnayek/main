<?php
namespace App\Http\Controllers;
namespace App\Http\Controllers;

namespace App\Http\Controllers;
use App\Rules\GenderValidationRule;
use App\Rules\LanguageValidationRule;

use App\Models\customer;
use App\Models\country;
use Illuminate\Http\Request;
use Hash;
use Alert;
//load create mail file
use App\Mail\signupemail;
use Mail;
class customerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('website/index');
    }
	public function about()
    {
        return view('website/about');
    }
	
	public function login()
    {
      return view('website/signin');
	 
		
    }
	public  function login_auth(request $request)
	
	{
		$validated = $request->validate([
				
			'email' => 'required|email|',
			'password' => 'required|max:8|max:12',]);
		$data=customer::where('email','=',$request->email)->first();
		if($data)
		{
			if(Hash::check($request->password,$data->password))
			{
				
				if($data->status=="Unblock")
				{
					//session create
                   session()->put('userid',$data->id);
				   Session()->put('username',$data->email); 
				   session()->put('name',$data->name);

					return redirect('/');
				}
				else
				{
					Alert::success('fail','Login Failed Due To Blocked Account');
					return redirect()->back();
				}//session create
				
				
				//use session => session('name') // session()->get('name')
				Alert::success('Congrats','You\'ve Successfully Login');
				return redirect('/');
			}
			else
			{
				Alert::success('Failed', 'Wrong password');
				return redirect()->back();
			}
		}
		     else{
				Alert::success('Failed', 'Wrong Email');
				return redirect()->back();
		}
	}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
		
	$data=country::all();
    return view('website/signup',['country'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
		$validated = $request->validate([
			'name' => 'required|string|max:255',			
			//'email' => 'required|email|unique:customers',
			'password' => 'required|max:8|max:12',
			'phone' => 'required|regex:/^\+?[0-9]{1,4}-?[0-9]+$/',
			'cid'  =>'required',
			'file' =>'required|image',
			'gender' => ['required', new GenderValidationRule],
			'lag' => ['required', new LanguageValidationRule],		
		]);	

        $data=new customer;
		$nameemail=$data->name=$request->name;
		$email=$data->email=$request->email;
		$data->password=Hash::make($request->password);
		$data->gender=$request->gender;
		$data->phone=$request->phone;
		$data->lag=implode(",",$request->lag); // string convert
		
		$file=$request->file('file');
		
		$filename=time().'_img.'.$request->file('file')->getClientOriginalExtension(); // 545646545_img.png
		$file->move('upload/customer/',$filename);
		$data->file=$filename;
		
	    $data->cid=$request->cid;
		
		//$file=
		
		$data->save();
		$maildata=array("nameemail"=>$nameemail,"email"=>$email);
		Mail::to($email)->send(new signupemail($maildata));	
		
	    Alert::success('Congrats', 'You\'ve Successfully Registered');

		return back();
		

    }

    /**
     * Display the specified resource.
     */
    public function show(customer $customer)
    {
		//$data=customer::all();
        $data=customer::join('countries','customers.cid','=','countries.id')->get(['customers.*','countries.cnm']);
		return view('admin/manage_cust',['data_customer'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
	  
	  public function profile(customer $customer)
    {
		$data=customer::where('id',session('userid'))->first();
		return view('website/profile',['data'=>$data]);
    }
    public function edit(customer $customer,$id)
    {
		$countrydata=country::all();
		$data=customer::find($id);
        return view('website/editprofile',['country'=>$countrydata,'data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, customer $customer,$id)
    {
		$data=customer::find($id);
		$data->name=$request->name;
		$data->email=$request->email;	 
		$data->phone=$request->phone;	 
		$data->gender=$request->gender;	 
		$data->lag=implode(",",$request->lag);
		$data->cid=$request->cid;
	//image upload
	  if($request->file('file'))
	  {
			$old_img=$data->file;
			unlink('upload/customer/'.$old_img);
			
			$file=$request->file('file');
			$filename=time().'_img.'.$request->file('file')->getClientOriginalExtension();
			$file->move('upload/customer/',$filename);
			$data->file=$filename;
	      }	  
			$data->update();
			Alert::success('Congrats', 'You\'ve Successfully update');
			return redirect('/profile');
			}
			
	public function status(customer $customer,$id)
    { 
		
			$data=customer::find($id);
			$status=$data->status;
		
		if($status=="Block")
		{
			$data->status="Unblock";
			$data->update();
			Alert::success('Congrats', 'You\'ve Successfully Unblock customer');
			return redirect('/manage_cust');
		}
		else
		{
			$data->status="Block";
			$data->update();
			Alert::success('Congrats', 'You\'ve Successfully Block customer');
			return redirect('/manage_cust');
		}
		   customer::find($id)->delete();
		
    }
	
	
	
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(customer $customer,$id)
    { 
	   //get id data img
        
		 $data=customer::find($id);
		//customer::find($id)->delete(); 
		 $filename=$data->file;
		//data deleted with unlink imgage
		 customer::find($id)->delete();
         if($filename!=" ")
		 {
			unlink('upload/customer/'.$filename);
		 }	

		
		Alert::success('Congrats', 'You\'ve Successfully deleted');

		return redirect()->back();
    }
	 public function logout()
    {
        session()->pull('userid');
		session()->pull('name');
		Alert::success('Congrats', 'You\'ve Successfully logout');
		
		return redirect('/');
    }
}
