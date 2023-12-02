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
    public function viewSongCategory()
    {
      $data=songcategorie::all();
      return view('website/songCategory',['data'=>$data]);  
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
    public function show(Songcategorie $songcategorie)
    {
         $data=songcategorie::all();
		return view('admin/manage_songcategory',['data_category'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Songcategorie $songcategorie,$id)
    {  
	   $data=songcategorie::find($id);
       return view('admin/edit_songCategory',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Songcategorie $songcategorie,$id)
    {
       $data=songcategorie::find($id);
	   $data->category_name=$request->category_name;
	  if($request->file('category_image'))
	    {
			$old_img=$data->category_image;
			unlink('admin/upload/songcategory/'.$old_img);
			
			$file=$request->file('category_image');
			$filename=time().'_img.'.$request->file('category_image')->getClientOriginalExtension();
			$file->move('admin/upload/songcategory/',$filename);
			$data->category_image=$filename;
	      }	 	
		
		  
			$data->update();
			Alert::success('Congrats', 'You\'ve Successfully update');
			return redirect('/manage_songCategory');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Songcategorie $songcategorie,$id)
    {
         
		
         $data=songcategorie::find($id);
		//customer::find($id)->delete(); 
		 $filename=$data->category_image;
		//data deleted with unlink imgage
		
         if($filename!=" ")
		 {
			unlink('admin/upload/songcategory/'.$filename);
		 }	
           songcategorie::find($id)->delete();
		
		Alert::success('Congrats', 'You\'ve Successfully deleted');

		return redirect()->back();
    }
    
}
