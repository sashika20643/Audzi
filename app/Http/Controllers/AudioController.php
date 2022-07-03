<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\song;
use Illuminate\Support\Facades\Storage;
use Auth;
ini_set('memory_limit', '100M');
class AudioController extends Controller
{
    public function upload(Request $request){
        $this->validate($request,[
            'name' =>'required|min:2',
            
            'singer' =>'required|min:2|max:950',
            'image' =>'mimes:jpg,png,jpeg|max:5048',
           


        ]);
        $audio= new song;
        $audio->name=$request->name;
        $audio->singer=$request->singer;
        if($request->image){

            $newImageName=time(). Auth::id().'.'.$request->image->extension();
            $request->image->move(public_path('Audio_images'),$newImageName);
            $audio->image=$newImageName;
        }
        if($request->hasFile('audio')){
           

            $newAudioName=time(). Auth::id().'.'.$request->audio->extension();
            
            $request->audio->move(public_path('Audios'),$newAudioName);
            $audio->audio=$newAudioName;
        }

 $audio->save(); 
 return redirect()->back()->with('alert','done');

    }


    public function getlist(Request $request){
       $songs =song::where('name','LIKE','%'.$request->name.'%')->get();
       return $songs;


    }

}
