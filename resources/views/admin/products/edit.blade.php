@extends('admin.master')

@section('title','Editar Producto')
@section('title-body','Dashboard')
@section('title-icon','fab fa-pen')

@section('breadcrumb')
<li class="breadcrumb-item" >
    <a href="{{ url('/admin/products') }}">
        <i class="fab fa-microsoft"></i> Productos
    </a>

</li>
<li class="breadcrumb-item" >
    <a href="{{ url('/admin/product/add') }}">
        <i class="fas fa-plus"></i> Edit
    </a>
</li>
@endsection 


@section('content')
<div class="container-fluid">

            <div class="panel shadow">
                <div class="header">
                    <h2 class="title"><i class="fab fa-microsoft"></i> Edit</h2>
                </div>
                <div class="inside">
                    {!! Form::open(['url' => '/admin/product/'.$p->id.'/edit', 'files'=>true]) !!}
                    @csrf
                    <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="name">Nombre del producto</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="far fa-keyboard"></i>
                                        </span>
                                    </div>
                                    {!! Form::text('name', $p->name, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="categoria">Categoria</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="far fa-keyboard"></i>
                                        </span>
                                    </div>
                                    {!! Form::select('categoria',$cats,$p->category_id, ['class'=>'form-control', 'min'=>'0.00', 'step'=>'any'])!!}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="imagen">Imagen destacada</label>
                                <div class="custom-file">
                                    {!! Form::file('img',['class' => 'custom-file-input', 'id'=>'customFile', 'accept'=>'image/*']) !!}
                                    <label for="customFile" class="custom-file-label">Choose File</label>
                                </div>
                            </div>
                            

                        </div>

                        <div class="row mtop16">

                            <div class="col-md-4">
                                <label for="price">Precio</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">   
                                            S/.
                                        </span>
                                    </div>
                                    {!! Form::number ('price', $p->price, ['class'=>'form-control', 'min'=>'0.00', 'step'=>'any'])!!}
                                </div>    
                            </div>

                            <div class="col-md-4">
                                <label for="indiscount">¿En Descuento?</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">   
                                            <i class="far fa-keyboard"></i>
                                        </span>
                                    </div>
                                    {!! Form::select('indiscount',['0'=>'NO', '1'=>'SI'], $p->in_discount, ['class'=>'form-control', 'min'=>'0.00', 'step'=>'any'])!!}
                                </div>    
                            </div>

                            <div class="col-md-4">
                                <label for="discount">Descuento</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">   
                                            S/.
                                        </span>
                                    </div>
                                    {!! Form::number ('discount', $p->discount, ['class'=>'form-control', 'min'=>'0.00', 'step'=>'any'])!!}
                                </div>    
                            </div>

                            <div class="col-md-4">
                                <label for="indiscount">Estado</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">   
                                            <i class="far fa-keyboard"></i>
                                        </span>
                                    </div>
                                    {!! Form::select('status',['0'=>'privado', '1'=>'Publico'], $p->status, ['class'=>'form-control', 'min'=>'0.00', 'step'=>'any'])!!}
                                </div>    
                            </div>

                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="col-md-12">
                            <label for="name">Imagen Destacada</label>
                            <div row>
                                <a href="{{url('/imagenes/productos/'.$p->file_path.'/'.$p->name.'/'.$p->image) }}" data-fancybox="gallery">
                                    <img src="{{url('/imagenes/productos/'.$p->file_path.'/'.$p->name.'/'.$p->image) }}" style="width: 150px; border-radius:5px;"" alt="">
                               </a>
                            </div>
                        </div>
                    </div>
                </div>
                               

                    <div class="row mtop16">
                        <div class="col-md-12">
                            <label for="content" >Descripcion</label>
                            {!! Form::textarea('content', $p->content, ['class' => 'form-control']) !!}
                            <script type="text/javascript"> CKEDITOR.replace( 'content', { width : 1060, height: 100}); </script>
                        </div>
                    </div>

                    <div class="row mtop16">
                        <div class="col-md-12">
                            {!! Form::submit('Guardar', ['class' => 'btn btn-dark']) !!}
                        </div>
                    </div>

                    {!! Form::close() !!}



                </div>
            </div>
    
</div>

@endsection
    