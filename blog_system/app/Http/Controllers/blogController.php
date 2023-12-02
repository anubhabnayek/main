<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;
use Hash;
use Alert;
use session;

class blogController extends Controller
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
    {
        return view('index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=new blog();
        $data->name=$request->name;
        $data->description=$request->description;
        $file=$request->file('file');
        $filename=time().'_img.'.$request->file('file')->getClientOriginalExtension();
        $file->move('upload/blog/',$filename);
        $file=$data->file=$filename;
        $data->user_id=session()->get('userid');  
        $data->save();
        Alert::success('Congrats', 'You\'ve Successfully Registered');
        return back();
    }
    

    /**
     * Display the specified resource.
     */
    public function show(blog $blog)
    {
        $data=blog::all();
        return view('blogdisplay',['data'=>$data]);  
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(blog $blog,$id)
    {
        $data=blog::find($id);
        return view('/editblog',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, blog $blog,$id)
    {
        $data=blog::find($id);
        $data->name=$request->name;
        $data->description=$request->description;

        if($request->file('file'))
        {
       $old_img=$data->file;
       unlink('upload/blog/'.$old_img);
     
       $file=$request->file('file');
       $filename=time().'_img.'.$request->file('file')->getClientOriginalExtension();
       $file->move('upload/blog/',$filename);
       $data->file=$filename;
       }	  
       $data->update();
       Alert::success('Congrats', 'You\'ve Successfully update');
       return redirect('/blogdisplay');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(blog $blog,$id)
    {
        $data=blog::find($id);
        $filename=$data->file;
        if($filename!="");
        {
            unlink('upload/blog/'.$filename);
        }
        blog::find($id)->delete();
        Alert::success('Congrats', 'You\'ve Successfully Deleted');
        return redirect()->back();
    }
}
