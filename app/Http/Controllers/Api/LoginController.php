<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Validator,Hash,Auth;
use App\Models\User;


class LoginController extends Controller
{
    public function __construct() {
        $this->middleware('cors');
     }
 
    public function login(Request $request, Response $response) {
    
        $response->header('Access-Control-Allow-Origin', '*');
        $response->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        $response->header('Expires', 'Fri, 01 Jan 2990 00:00:00 GMT');

        $this->validateLogin($request);
        //login true
        if(Auth::attempt($request->only('email','password' ))) {
            
            return response()->json([
                'token'=> $request->user()->createToken($request->email)->plainTextToken,
                'name'=> $request->user()->name,
                'id'=> $request->user()->id,
                'message' => 'Success',
            ]);
        }

        return response()->json([
            'message' => 'No Autorizado'
        ],401);
        //login false
    }

    public function validateLogin(Request $request) 
    {    
        return $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    }


    
 /*    public function logout()
    {
        DELETE FROM `personal_access_tokens` WHERE `personal_access_tokens`.`id` = 67"?
    }
  */
    


}