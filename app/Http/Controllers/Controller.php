<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;


class Controller extends BaseController
{

    public function sendResponse(Request $request, $data, $code){
        $message = '';
        $success = true;

        switch($code){
            case 200:
                $message = 'All is ok :)';
                break;
            case 201:
                $message = 'Resource was created';
                break;
            case 204:
                $message = 'Resource was deleted';
                break;
            case 404:
                $success = false;
                $message = 'Resource not found';
                break;
            case 422:
                $success = false;
                $message = 'Unprocessable entity';
                break;
            default:
                $success = false;
                $message = 'Sorry something went wrong :(';
        }       

        return response()->json([ 
            'success' => 'true',
            'code' => $code,
            'message' => $message,
            'data' => $data
        ], $code)->setCallback($request->input('callback'));;
    }

    protected function buildFailedValidationResponse(Request $request, array $errors)
    {
        return $this->sendResponse($errors, 422);
    }
}
