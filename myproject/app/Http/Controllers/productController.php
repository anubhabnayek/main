<?php

namespace App\Http\Controllers;
use App\Models\customer;
use App\Models\admin;
use App\Models\contact;
use App\Models\product;
use Illuminate\Http\Request;
use Hash;
use Alert;
class productController extends Controller
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
        return view('admin/add_prod');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
			'product_name' => 'required|string|max:255',			
            'discount_price' => 'required|numeric|min:0',
			'price' =>'required|numeric|min:0',
			'description'  => 'required|string|max:255',
			'product_img' =>'required|image',
				
		]);	
        $data=new product;
		$data->product_name=$request->product_name;
        $data->discount_price=$request->discount_price;
        $data->price=$request->price;
        $data->description=$request->description;
        $file=$request->file('product_img');
		
		$filename=time().'_img.'.$request->file('product_img')->getClientOriginalExtension(); // 545646545_img.png
		$file->move('upload/product/',$filename);
		$data->product_img=$filename; 
        $data->save();
	   Alert::success('Congrats', 'You\'ve Successfully Registered');

		return back();
    
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        $data=product::all();
         return view('admin/manage_prod',['data_products'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
   
    public function edit(product $product,$id)
    {
         $data=product::find($id);
       // return view('admin/edit_prod'); //['data'=>$data]);
	     return view('admin/editprod',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product,$id)
    {
        $data=product::find($id);
		$data->product_name=$request->product_name;
        $data->discount_price=$request->discount_price;
        $data->price=$request->price;
        $data->description=$request->description;
	//image upload
	  if($request->file('product_img'))
	  {
			$old_img=$data->product_img;
			unlink('upload/product/'.$old_img);
			
			$file=$request->file('product_img');
			$filename=time().'_img.'.$request->file('product_img')->getClientOriginalExtension();
			$file->move('upload/product/',$filename);
			$data->product_img=$filename;
	      }	  
			$data->update();
			Alert::success('Congrats', 'You\'ve Successfully update');
			return redirect('/manage_prod');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product,$id)
    {
    $data=product::find($id);
    //product::find($id)->delete();
    $filename=$data->product_img;
    if($filename!="")
    {
        unlink('upload/product/'.$filename);
    }
   
   product::find($id)->delete();
    
    Alert::success('Congrats', 'You\'ve Successfully deleted');

		return redirect()->back();
    }
}

