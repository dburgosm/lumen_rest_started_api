<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required'
    ];

    public function index(Request $request)
    {

        return $this->sendResponse($request, User::all(), 200);
    }
    
    public function show(Request $request, $id)
    {
        $code = (($data = User::find($id)) == null) ? 404:200;

        return $this->sendResponse($request, $data, $code);
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->rules);
        
        $data = new Project($request->all());
        $data->save();

        return $this->sendResponse($request, $data, 201);
    }

    public function update(Request $request, $id)
    {
        $code = 404;

        $this->validate($request, $this->rules);
        
        $data = User::find($id);

        if($data != null){
            $data->title = $request->get('title');
            $data->save();
            $code = 200;
        }

        return $this->sendResponse($request, $data, $code);
    }

    public function destroy(Request $request, $id)
    {
        $code = 404;

        $data = User::find($id);

        if($data != null){
            $data->delete();
            $code = 204;
        }

        return $this->sendResponse($request, null, $code);
    }
}