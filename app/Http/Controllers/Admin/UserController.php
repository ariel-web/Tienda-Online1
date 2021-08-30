<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function __construc(){
        $this->middleware('auth');
        $this->middleware('isadmin');
    }  

    public function getUsers(){
        $users = User::orderBy('id', 'Desc')->get();
        $data = ['users' => $users];
        return view('admin.users.home',$data);
    } 

    public function getUsersDelete($id){
        $user = User::find($id);
        $user->delete();
        return back()->with('message','Usuario Eliminado')->with('typealert', 'danger');
    }

    
}
