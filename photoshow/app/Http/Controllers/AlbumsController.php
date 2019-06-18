<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class AlbumsController extends Controller
{
    public function index(){
        $albums = Album::with('Photos')->get();
        return view('albums.index')->with('albums', $albums);
    }

    public function create(){
        return view('albums.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name'=>'required'
        ]);

        $fileNameToStore = ""; $path ='';
        if($request -> hasFile('cover_image')){
            //get filename with extension
            $filenamewtihext = $request->file('cover_image')->getClientOriginalName();

            //get just filename
            $filename = pathinfo($filenamewtihext, PATHINFO_FILENAME);
            //get just extension
            $fileext = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$fileext;
            //upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore );
        } 

        $album = new Album;
        $album->name=$request->input('name');
        $album->description=$request->input('description');
        $album->cover_image=$fileNameToStore;

        $album->save();
        return redirect('/albums')->with('success', 'album created!');

    }

    public function show($id){
        $album = Album::with('Photos')->find($id);
        return view('albums.show')->with('album', $album);
    }


}
