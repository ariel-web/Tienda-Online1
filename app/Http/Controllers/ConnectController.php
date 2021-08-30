<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Hash,Auth;
use App\Models\User;

class ConnectController extends Controller
{

  public function __construct(){
    /*** PARA QUE EL USUARIOS NO REGISTRADOS ****/ 
    /****  EXCEPT PARA USUARIOS REGISTRADOS ****/
    $this->middleware('guest')->except(['getLogout']);
  }


  public function getLogin() {
      return view('connect.login');
  }
  
  public function postLogin(Request $request) {
    $rules = [
      'email' => 'required|email',
      'password' => 'required'
    ];
    $messages = [
      'email.required'=> 'Se requiere su correo',
      'email.email' => 'se requiere que ingrese un correo',
      'password.required'=> 'Se requiere de su contraseña',
    ];

    $validator = Validator::make($request->all(),$rules,$messages);
    if($validator->fails()):
      return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert', 'danger');
    else:
      if(Auth::attempt(['email'=> $request->input('email'), 'password' => $request->input('password')], true)):
        return redirect()->route('home');
      else:
        return back()->with('message','Correo o contraseña no valida')->with('typealert', 'danger');
      endif;

    endif;

  }

  public function getRegister() {
      return view('connect.register');
  } 

  public function postRegister(Request $request) {
      $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8',
      ];
      
      $messages = [
        'name.required' => 'El nombre es requerido',
        'email.required'=> 'Su correo electrónico es requerido',
        'email.email' => 'El formato de su correo es invalido',
        'password.required'=> 'Ingrese una contraseña',
        'password.min'=>'Su contraseña debe ser minimo de 8 caracteres'
      ];

      $validator = Validator::make($request->all(),$rules,$messages);
      if($validator->fails()):
        return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert', 'danger');
      else:
        $user = new User();
        $user->name = e($request->input('name'));
        $user->email = e($request->input('email'));
        $user->password = Hash::make($request->input('password'));

        if($user->save()):
          return redirect()->route('login')->with('message','Su Usuario se creo con exito')->with('typealert', 'success');
        endif;


      endif;
  }

  public function getLogout() {
    Auth::logout();
    return redirect()->route('login');
  }

}
