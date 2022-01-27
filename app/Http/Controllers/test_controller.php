<?php
namespace App\Http\Controllers\API;
namespace App\Http\Controllers;
use App\Models\apitesting;

use Illuminate\Http\Request;

class test_controller extends Controller
{

    public function index()
    {
        $data = apitesting::all();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'desc' => 'required'
          ]);
      
          $newdata = new apitesting([
            'name' => $request->get('name'),
            'text' => $request->get('text')
          ]);
      
          $newdata->save();
      
          return response()->json($newdata);
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
