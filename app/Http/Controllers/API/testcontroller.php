<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\apitesting;

class testcontroller extends Controller
{
    /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
    public function index()
    {
      $apitestings = apitesting::all();
      return response()->json($apitestings);
    }
  
    /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
    public function store(Request $request)
    {
      $request->validate([
        'title' => 'required|max:255',
        'desc' => 'required'
      ]);
  
      $newapitesting = new apitesting([
        'title' => $request->get('title'),
        'desc' => $request->get('desc')
      ]);
  
      $newapitesting->save();
  
      return response()->json($newapitesting);
    }
  
    /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
    public function show($id)
    {
      $apitesting = apitesting::findOrFail($id);
      return response()->json($apitesting);
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
      $apitesting = apitesting::findOrFail($id);
  
      $request->validate([
        'title' => 'required|max:255',
        'desc' => 'required'
      ]);
  
      $apitesting->title = $request->get('title');
      $apitesting->desc = $request->get('desc');
  
      $apitesting->save();
  
      return response()->json($apitesting);
    }
  
    /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
    public function destroy($id)
    {
      $apitesting = apitesting::findOrFail($id);
      $apitesting->delete();
  
      return response()->json($apitesting::all());
    }
  }