<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Http\Models\Category;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    public function __construc(){
        $this->middleware('auth');
        $this->middleware('isadmin');
    }

    public function getHome($module) {
        $cats = Category::where('module',$module)->orderBy('name','Asc')->get();
        $data = ['cats' => $cats];
        return view('admin.categories.home',$data);
    }

    public function categorieAdd () {
        return view ('admin.categories.add');
    }

    public function postCategoryAdd(Request $request){

        $rules = [
            'name' => 'required',
            'icon' => 'required'
          ];
          $messages = [
            'name.required' => 'Se requiere el nombre de la categoria',
            'icon.required' => 'Se requiere un icono para la categoria'
          ];
        
          $validator = Validator::make($request->all(),$rules,$messages);
          if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert', 'danger');
          else:
            $c = new Category;
            $c->module = $request->input('module');
            $c->name = e($request->input('name'));
            $c->slug = Str::slug($request->input('name'),'-');
            $c->icono = e($request->input('icon'));
            $c->imagen = "imagen";
            if($c->save()):
                return back()->with('message','Guardado')->with('typealert', 'success');
            endif;
          endif;
    }

    public function getCategoryEdit($id){
      $cat = Category::find($id);
      $data = ['cat' => $cat];
      return view('admin.categories.edit',$data);

    }

    public function postCategoryEdit(Request $request, $id){

      $rules = [
          'name' => 'required',
          'icon' => 'required' 
        ];
        $messages = [
          'name.required' => 'Se requiere el nombre de la categoria',
          'icon.required' => 'Se requiere un icono para la categoria'
        ];
      
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()):
          return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert', 'danger');
        else:
          $c = Category::find($id);
          $c->module = $request->input('module');
          $c->name = e($request->input('name'));
          $c->slug = Str::slug($request->input('name'),'-');
          $c->icono = e($request->input('icon'));
          $c->imagen = "imagen";
          if($c->save()):
              return redirect('/admin/categories/0')->with('message',' Categoria Editada')->with('typealert', 'primary');
          endif;

        endif;
   
    }

    public function getCategoryDelete($id){
        $cat = Category::find($id);
        $cat->delete();
        return back()->with('message','Categoria Eliminada')->with('typealert', 'danger');
    }



}
