<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Category;
use Validator,Config,Image;
use App\Http\Models\Product;
use Illuminate\Support\Str; 

class ProductController extends Controller
{
    
    public function __construc(){
        $this->middleware('auth');
        $this->middleware('isadmin');
    }

    public function getHome() {
        $products = Product::orderBy('id','desc')->paginate(25);
        $data = ['products'=> $products];
        return view('admin.products.home',$data);
    }

    public function getProductAdd() {
        $cats = Category::where('module','0')->pluck('name','id');
        $data = ['cats' => $cats];
        return view ('admin.products.add',$data);
    }

    public function postProductAdd(Request $request){
        
        $rules = [
            'name' => 'required',
            'img' => 'required',
            'price' => 'required',
            'content' => 'required'
        ];
        $messages = [
            'name.required' => 'Ingrese el nombre del producto',
            'img.required' => 'Seleccione una imagen',
            'img.image' => 'El archivo no es una imagen',
            'price.required' => 'Ingrese el precio del producto',
            'content.required' => 'Ingrese una descripcion'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $path ='/'.date('Y-m-d');
            $file = $request->file("img");
            $fileExt = trim($request->file('img')->getClientOriginalExtension());
            $name = Str::slug(str_replace($fileExt,'',$request->file('img')->getClientOriginalName()));
            $file->move(public_path("imagenes/productos".$path.'/'.$request->name.'/'),$name.'.'.$fileExt);

            $product = new Product;
            $product->status = '1';
            $product->name = e($request->input('name'));
            $product->slug = Str::slug($request->input('name'));
            $product->category_id = e($request->input('categoria'));
            $product->file_path = date('Y-m-d');
            $product->url = "http://192.168.1.49/Tienda-Online/public/imagenes/productos".$path.'/'.$request->name.'/'.$name.'.'.$fileExt;
            $product->image =  $name.'.'.$fileExt;
            $product->price = $request->input('price');
            $product->in_discount = $request->input('indiscount');
            $product->discount = $request->input('discount');
            $product->content = e($request->input('content'));

            if($product->save()):
                return redirect('/admin/products')->with('message','Producto Guardado')->with('typealert','success');
            endif;
 
        endif;
    }  


    public function getProductEdit($id){    
        $p = Product::find($id);
        $cats = Category::where('module','0')->pluck('name','id');
        $data = ['cats'=>$cats, 'p'=>$p];
        return view('admin.products.edit',$data); 
    }

    public function postProductEdit(Request $request, $id){
        $rules = [
            'name' => 'required',
            'price' => 'required',
            'content' => 'required'
        ];
        $messages = [
            'name.required' => 'Ingrese el nombre del producto',
            'price.required' => 'Ingrese el precio del producto',
            'content.required' => 'Ingrese una descripcion'
        ];

        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $product = Product::find($id);
            $product->status = '1';
            $product->name = e($request->input('name'));
            $product->file_path = date('Y-m-d');
            //$product->slug = Str::slug($request->input('name'));
            $product->category_id = e($request->input('categoria'));
            if($request->hasFile('img')):
                $path ='/'.date('Y-m-d');
                $file = $request->file("img");
                $fileExt = trim($request->file('img')->getClientOriginalExtension());
                $name = Str::slug(str_replace($fileExt,'',$request->file('img')->getClientOriginalName()));
                $file->move(public_path("imagenes/productos".$path.'/'.$request->name.'/'),$name.'.'.$fileExt);
                $product->url = "http://192.168.1.49/Tienda-Online/public/imagenes/productos".$path.'/'.$request->name.'/'.$name.'.'.$fileExt;
                $product->image =  $name.'.'.$fileExt;
            endif;
            $product->price = $request->input('price');
            $product->in_discount = $request->input('indiscount');
            $product->discount = $request->input('discount');
            $product->content = e($request->input('content'));

            if($product->save()):
                return redirect('/admin/products')->with('message','Producto Guardado')->with('typealert','success');
            endif;
 
        endif;


    }


    public function getProductDelete($id){
        $prod = Product::find($id);
        $prod->delete();
        return back()->with('message','Producto Eliminado')->with('typealert', 'danger');
    }



}



    





    /*     public function postProductAdd(Request $request){
        $rules = [
            'name' => 'required',
            'img' => 'required',
            'price' => 'required',
            'content' => 'required'
        ];
        $messages = [
            'name.required' => 'Ingrese el nombre del producto',
            'img.required' => 'Seleccione una imagen',
            'img.image' => 'El archivo no es una imagen',
            'price.required' => 'Ingrese el precio del producto',
            'content.required' => 'Ingrese una descripcion'

        ];

        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $file = $request->file("img");
            $fileExt = trim($request->file('img')->getClientOriginalExtension());
            $fileName = trim($request->file('img')->getClientOriginalName());
            $file->move(public_path("imagenes/productos/".$request->input('categoria').'/'.$fileName.'/'),$fileName);
            //$path = public_path("imagenes/productos/".$request->input('categoria').'/'.$fileName.'/').$fileName;

            $product = new Product;
            $product->status = '0';
            $product->name = e($request->input('name'));
            $product->slug = Str::slug($request->input('name'));
            $product->category_id = e($request->input('categoria'));
            $product->image = $fileName;
            $product->price = $request->input('price');
            $product->in_discount = $request->input('indiscount');
            $product->discount = $request->input('discount');
            $product->content = e($request->input('content'));

            if($product->save()):
                return redirect('/admin/products')->with('message','Producto Guardado')->with('typealert','success');
            endif;
 
        endif;


    }  */



