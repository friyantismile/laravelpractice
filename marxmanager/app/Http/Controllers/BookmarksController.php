<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookmark;

class BookmarksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $bms =  Bookmark::where('user_id', auth()->user()->id)->get();
        return view('home')->with('bookmarks', $bms);
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
             'url' => 'required',
        ]);
        
        $bookmark= new Bookmark;
        $bookmark->name= $request->input('name');
        $bookmark->url= $request->input('url');
        $bookmark->description= $request->input('description');
        $bookmark->user_id= auth()->user()->id;

        $bookmark->save();

        return redirect('/home')->with('success', 'Bookmark added!');

    }

    public function destroy($id){
        $bm= Bookmark::find($id);
        $bm->delete();

        return;
    }
}
