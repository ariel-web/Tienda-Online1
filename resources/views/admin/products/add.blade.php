@extends('admin.master')

@section('title','Agregar Producto')
@section('title-body','Dashboard')
@section('title-icon','fab fa-microsoft')

@section('breadcrumb')
<li class="breadcrumb-item" >
    <a href="{{ url('/admin/products') }}">
        <i class="fab fa-microsoft"></i> Productos
    </a>

</li>
<li class="breadcrumb-item" >
    <a href="{{ url('/admin/product/add') }}">
        <i class="fas fa-plus"></i> Add 
    </a>
</li>
@endsection 


@section('content')
<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"><i class="fab fa-microsoft"></i> Productos</h2>
        </div>
        <div class="inside">
            {!! Form::open(['url' => '/admin/product/add', 'files'=>true]) !!}
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="name">Nombre del producto</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="far fa-keyboard"></i>
                            </span>
                        </div>
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="col-md-3">
                    <label for="categoria">Categoria</label>
                    <div class="input-group " style="height: 37px;" >
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="far fa-keyboard"></i>
                            </span>
                        </div>
                        {!! Form::select('categoria',$cats, ['class'=>'form-control', 'step'=>'any'])!!}
                    </div>
                </div>


                <div class="col-md-3">
                    <label for="imagen">Imagen destacada</label>
                    <div class="custom-file">
                        {!! Form::file('img',['class' => 'custom-file-input', 'id'=>'customFile', 'accept'=>'image/*']) !!}
                        <label for="customFile" class="custom-file-label">Choose File</label>
                    </div>
                </div>  


            </div>

            <div class="row mtop16">

                <div class="col-md-3">
                    <label for="price">Precio</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">   
                                S/.
                            </span>
                        </div>
                        {!! Form::number ('price', null, ['class'=>'form-control', 'min'=>'0.00', 'step'=>'any'])!!}
                    </div>    
                </div>

                <div class="col-md-3">
                    <label for="indiscount">¿En Descuento?</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">   
                                <i class="far fa-keyboard"></i>
                            </span>
                        </div>
                        {!! Form::select('indiscount',['0'=>'NO', '1'=>'SI'], 0, ['class'=>'form-control', 'min'=>'0.00', 'step'=>'any'])!!}
                    </div>    
                </div>

                <div class="col-md-3">
                    <label for="discount">Descuento</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">   
                                S/.
                            </span>
                        </div>
                        {!! Form::number ('discount', 0.00, ['class'=>'form-control', 'min'=>'0.00', 'step'=>'any'])!!}
                    </div>    
                </div>

            </div>

            <div class="row mtop16">
                <div class="col-md-12">
                    <label for="content" >Descripcion</label>
                    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
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
    