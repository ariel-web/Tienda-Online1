<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construc(){
        $this->middleware('auth');
        $this->middleware('isadmin');
    }
    public function getHome(){
        return view('admin.contact.home');
    }
        
}
