<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Item as ItemResource;
use App\Item;
use Validator;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $items = Item::all();
        $items = Item::Paginate(1);
        return response()->json($items, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'text'=>'required'
        ]);
        if($validator->fails()) {
            $response = array('response'=>$validator->messages(), 'success'=>false);
            return $response;
        } else {
            $item= new Item;
            $item->text=$request->input('text');
            $item->body=$request->input('body');
            $item->save();
            return response()->json($item, 201);
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item=Item::findOrFail($id);
        $response=new ItemResource($item);
        return response()->json($response, 200);
    }

   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $validator = Validator::make($request->all(), [
            'text'=>'required|max:10'
        ]);
        if($validator->fails()) {
            $response = array('response'=>$validator->messages(), 'success'=>false);
            return $response;
        } else {
            $item= Item::find($id);
            $item->text=$request->input('text');
            $item->body=$request->input('body');
            $item->save();
            return response()->json($item, 200);
        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        
        $item= Item::find($id);
        $item->delete();
        $response = array('response'=>'Item deleted!', 'success'=>true);
        return $response;
        //response code 204
        
    }

    public function errors()
    {
        return response()->json(['payment is required!'], 501);
        
    }
}
