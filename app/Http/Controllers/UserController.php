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
	
	public function index()
	{
		return $this->sendResponse(User::all(), 200);
	}
    
    public function show($id)
    {
        $code = (($data = User::find($id)) == null) ? 404:200;

		return $this->sendResponse($data, $code);

    }

    public function store(Request $request)
    {
    	$this->validate($request, $this->rules);
    	
    	$data = new User($request->all());
		$data->save();

		return $this->sendResponse($data,201);
    }

    public function update(Request $request, $id)
    {
    	$code = 404;
    	
    	$this->validate($request, $this->rules);
    	
    	$data = User::find($id);

    	if($data != null){
    		$data->title = $request->get('name');
    		$data->description = $request->get('email');
    		$data->password = $request->get('password');
    		$data->save();
    		$code = 200;
    	}

    	return $this->sendResponse($data,$code);
    }

    public function destroy(Request $request, $id)
    {
    	$code = 404;

    	$data = User::find($id);

    	if($data != null){
    		$data->delete();
    		$code = 204;
    	}

    	return $this->sendResponse(null,$code);
    }

}
