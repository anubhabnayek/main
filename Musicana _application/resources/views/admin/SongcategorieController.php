<?php

namespace App\Http\Controllers;

use App\Models\Songcategorie;
use Illuminate\Http\Request;
use Hash;
use Alert;
class SongcategorieController extends Controller
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
        return view('admin/add_songCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
		 $validated = $request->validate([
            'category_name' => 'required|unique:songcategories',
            'category_image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);
		
        $data=new songcategorie();
		$data->category_name=$request->category_name;
		
		
		$file=$request->file('category_image');
		
		$filename=time().'_img.'.$request->file('category_image')->getClientOriginalExtension(); // 545646545_img.png
		$file->move('admin/upload/songcategory/',$filename);
		$data->category_image=$filename;
		
	    
		
		//$file=
		
		$data->save();
		/*$maildata=array("nameemail"=>$nameemail,"email"=>$email);
		Mail::to($email)->send(new signupemail($maildata));*/	
		
	    Alert::success('Congrats', 'You\'ve Successfully Registered');

		return back();
		
    }

    /**
     * Display the specified resource.
     */
    public function show(songCategory $songCategory)
    {
        $data=songcategorie::all();
		return view('admin/manage_songcategory',['data_category'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(songCategory $songCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, songCategory $songCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(songCategory $songCategory,$id)
    {
    $data=songcategorie::find($id);
		//customer::find($id)->delete(); 
		 $filename=$data->file;
		//data deleted with unlink imgage
	      songcategorie::find($id)->delete();
         if($filename!=" ")
		 {
			unlink('admin/upload/songcategory/'.$filename);
		 }	
          
		
		Alert::success('Congrats', 'You\'ve Successfully deleted');

		return redirect()->back();
    }
}
