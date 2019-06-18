<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Photo;

class PhotosController extends Controller
{
    public function create($album_id){
        return view('photos.create')->with('album_id', $album_id);
    }

    public function store(Request $request){
        $this->validate($request, [
            'title'=>'required'
        ]);

        $fileNameToStore = ""; $path ='';
        if($request -> hasFile('photo')){
            //get filename with extension
            $filenamewtihext = $request->file('photo')->getClientOriginalName();

            //get just filename
            $filename = pathinfo($filenamewtihext, PATHINFO_FILENAME);
            //get just extension
            $fileext = $request->file('photo')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$fileext;
            //upload image
            $path = $request->file('photo')->storeAs('public/photos/'.$request->input('id'), $fileNameToStore );
        } 

        $photo = new Photo;
        $photo->album_id=$request->input('id');
        $photo->title=$request->input('title');
        $photo->description=$request->input('description');
        $photo->size=$request->file('photo')->getClientSize();
        $photo->photo=$fileNameToStore;

        $photo->save();
        return redirect('/albums/'.$request->input('id'))->with('success', 'photo uploaded!');

    }

    
    public function show($id){
        $photo = Photo::find($id);
        return view('photos.show')->with('photo', $photo);
    }

    public function destroy($id){
        $photo = Photo::find($id);
        if(Storage::delete('public/photos/'.$photo->album_id.'/'.$photo->photo)) {
           $photo->delete(); 
        }
        return redirect('/')->with('success',"Photo deleted");
    }
}
