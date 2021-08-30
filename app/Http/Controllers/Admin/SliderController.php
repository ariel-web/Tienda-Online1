<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator,Config,Image;
use App\Http\Models\Slider;
use Illuminate\Support\Str; 

class SliderController extends Controller
{
    
    public function __construc(){
        $this->middleware('auth');
        $this->middleware('isadmin');
    }

    public function getSlider() {
        $sliders = Slider::orderBy('id','desc')->paginate(25);
        $data = ['sliders'=> $sliders];

        return view('admin.slider.home',$data);
    }

    public function postSliderAdd(Request $request) {
        $rules = [
            'img' => 'required',
        ];
        $messages = [
            'imagen.required' => 'Seleccione una imagen para continuar',
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
    
            $path ='/'.date('Y-m-d');
            $file = $request->file("img");
            $fileExt = trim($request->file('img')->getClientOriginalExtension());
            $name = Str::slug(str_replace($fileExt,'',$request->file('img')->getClientOriginalName()));
            $file->move(public_path("imagenes/sliders".$path.'/'.$request->id.'/'),$name.'.'.$fileExt);
            //$path = public_path("imagenes/productos/".$request->input('categoria').'/'.$fileName.'/').$fileName;

            $slide = new Slider;
            $slide->sld_imagen = $name.'.'.$fileExt;
            $slide->sld_file_path = $path;  
            $slide->sld_estado = $request->input('visible');
            $slide->sld_url = "http://192.168.1.49/Tienda-Online/public/imagenes/sliders".$path."/".$name.'.'.$fileExt;

            if($slide->save()):
                return redirect('/admin/slider')->with('message','Slider Guardado')->with('typealert','success');
            endif;
 
        endif;
        
    }
    

    public function postProductAdd(Request $request){
  /*       $rules = [
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
            $fileExt = trim($request->file('img')->getClientOriginalExtension());
            $upload_path = Config::get('filesystems.disks.uploads.root');
            $name = Str::slug(str_replace($fileExt,'',$request->file('img')->getClientOriginalName()));
            $filename = rand(1,999).'-'.$name.'.'.$fileExt;
            $file_file = $upload_path.'/'.$path.'/'.$filename;

            $product = new Product;
            $product->status = '1';
            $product->name = e($request->input('name'));
            $product->slug = Str::slug($request->input('name'));
            $product->category_id = e($request->input('categoria'));
            $product->file_path = date('Y-m-d');
            $product->image = $filename;
            $product->price = $request->input('price');
            $product->in_discount = $request->input('indiscount');
            $product->discount = $request->input('discount');
            $product->content = e($request->input('content'));

            if($product->save()):
                if($request->hasFile('img')):
                    $fl = $request->img->storeAs($path,$filename,'uploads');
                    $img = Image::make($file_file);
                    $img->fit(256,256, function($constraint){
                        $constraint->upsize();
                    });
                    $img->save($upload_path.'/'.$path.'/t_'.$filename);
                endif;
                return redirect('/admin/products')->with('message','Producto Guardado')->with('typealert','success');
            endif;
 
        endif;
 */

    }  


    public function getProductEdit($id){
/*         $p = Product::find($id);
        $cats = Category::where('module','0')->pluck('name','id');
        $data = ['cats'=>$cats, 'p'=>$p];
        return view('admin.products.edit',$data);  */
    }

    public function postProductEdit(Request $request, $id){
 /*        $rules = [
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
            $product->status = $request->status;
            $product->name = e($request->input('name'));
            //$product->slug = Str::slug($request->input('name'));
            $product->category_id = e($request->input('categoria'));
            if($request->hasFile('img')):
                $path ='/'.date('Y-m-d');
                $fileExt = trim($request->file('img')->getClientOriginalExtension());
                $upload_path = Config::get('filesystems.disks.uploads.root');
                $name = Str::slug(str_replace($fileExt,'',$request->file('img')->getClientOriginalName()));
                $filename = rand(1,999).'-'.$name.'.'.$fileExt;
                $file_file = $upload_path.'/'.$path.'/'.$filename;
                $product->file_path = date('Y-m-d');
                $product->image = $filename;
            endif;
            $product->price = $request->input('price');
            $product->in_discount = $request->input('indiscount');
            $product->discount = $request->input('discount');
            $product->content = e($request->input('content'));

            if($product->save()):
                if($request->hasFile('img')):
                    $fl = $request->img->storeAs($path,$filename,'uploads');
                    $img = Image::make($file_file);
                    $img->fit(256,256, function($constraint){
                        $constraint->upsize();
                    });
                    $img->save($upload_path.'/'.$path.'/t_'.$filename);
                endif;
                return redirect('/admin/products')->with('message','Producto Guardado')->with('typealert','success');
            endif;
 
        endif;
 */

    }


    public function getProductDelete($id){
/*         $prod = Product::find($id);
        $prod->delete();
        return back()->with('message','Producto Eliminado')->with('typealert', 'danger'); */
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



