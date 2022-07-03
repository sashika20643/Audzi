<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\playlist;
use Auth;

class PlaylistController extends Controller
{

    public function create(Request $request){

        $this->validate($request,[
            'name' =>'required|min:2',
            
            'description' =>'required|min:20|max:950',
            'image' =>'mimes:jpg,png,jpeg|max:5048',



        ]);

      $playlist = new playlist;
      $playlist->name=$request->name;
      $playlist->description=$request->description;
      $playlist->user_id=Auth::id();

      if($request->image){

        $newImageName=time(). Auth::id().'.'.$request->image->extension();
        $request->image->move(public_path('plist_images'),$newImageName);
        $playlist->image=$newImageName;
    }
    


      $playlist->save();
      return view("Addsongs");

    }
    //

}
