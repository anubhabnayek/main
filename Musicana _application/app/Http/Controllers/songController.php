<?php

namespace App\Http\Controllers;
use App\Models\Songcategorie;
use App\Models\song;
use Illuminate\Http\Request;
use Hash;
use Alert;
class songController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   $data=songcategorie::all();
        return view('admin/add_song',['song_category'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $validated = $request->validate([
            'songs_name' => 'required|unique:songcategories',
            'file' => 'required|image',
            'song' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',
			'song_category' => 'required'
        ]);
		
        $data=new song();
		$data->songs_name=$request->songs_name;
		

		
		$file=$request->file('file');
		
		$filename=time().'_img.'.$request->file('file')->getClientOriginalExtension(); // 545646545_img.png
		$file->move('admin/upload/song_img/',$filename);
		$data->file=$filename;
		
		$file=$request->file('song');
		
		$filename=time().'_img.'.$request->file('song')->getClientOriginalExtension(); // 545646545_img.png
		$file->move('admin/upload/song/',$filename);
		$data->song=$filename;
		$data->scat_id=$request->song_category;
	    
		
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
    public function show(song $song)
    {
        $data=song::join('songcategories', 'songs.scat_id','=','songcategories.id')->get(['songs.*','songcategories.category_name']);
		return view('admin/manage_song',['data_song'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(song $song,$id)
    {
       $songdata=songcategorie::all();
		$data=song::find($id);
        return view('admin/edit_song',['songcategorie'=>$songdata,'data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, song $song,$id)
    {
        $data=song::find($id);
		$data->songs_name=$request->songs_name;
		
		
	//image upload
	  if($request->file('file'))
	  {
			$old_img=$data->file;
			unlink('admin/upload/song_img/'.$old_img);
			
			$file=$request->file('file');
			$filename=time().'_img.'.$request->file('file')->getClientOriginalExtension();
			$file->move('admin/upload/song_img/',$filename);
			$data->file=$filename;
	      }	 
      if($request->file('song'))
	    {
			$old_img=$data->song;
			unlink('admin/upload/song/'.$old_img);
			
			$file=$request->file('song');
			$filename=time().'_img.'.$request->file('song')->getClientOriginalExtension();
			$file->move('admin/upload/song/',$filename);
			$data->song=$filename;
	      }	 	
		 $data->scat_id=$request->song_category;
		  
			$data->update();
			Alert::success('Congrats', 'You\'ve Successfully update');
			return redirect('/manage_song');
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
    public function destroy(song $song,$id)
    {
      $data=song::find($id);
		//customer::find($id)->delete(); 
		 $old_song_image=$data->file;
		 $old_song=$data->song;
		//data deleted with unlink imgage
		
         if($old_song_image!=" ")
		 {
			unlink('admin/upload/song_img/'.$old_song_image);
		 }
           if($old_song!=" ")
		 {
			unlink('admin/upload/song/'.$old_song);
		 }		 
           song::find($id)->delete();
		
		Alert::success('Congrats', 'You\'ve Successfully deleted');

		return redirect()->back();
    }
}
