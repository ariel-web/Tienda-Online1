@extends('admin.master')

@section('title','Categorias')
@section('title-body','Dashboard')
@section('title-icon','fab fa-microsoft')

@section('breadcrumb')
<li class="breadcrumb-item" >
    <a href="{{ url('/admin/categories/0') }}">
        <i class="fas fa-folder-open"></i> Categorias
    </a> 
</li>
@endsection 


@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-md-3" >
            <div class="panel shadow" >

                <div class="header">
                    <h2 class="title"><i class="fas fa-pen"></i> Editar Categoria</h2>
                </div>
                <div class="inside">
                    {!!Form::open(['url' => '/admin/category/'.$cat->id.'/edit'])!!}
                    
                    <label for="name">Nombre de la Cateoria</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="far fa-keyboard"></i>
                            </span>
                        </div>
                        {!! Form::text('name', $cat->name, ['class' => 'form-control']) !!}
                    </div>

                    
                    <label for="module"class="mtop16">Modulo</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="far fa-keyboard"></i>
                            </span>
                        </div>
                        {!! Form::select('module',getModulesArray(), $cat->module, ['class'=>'form-control', 'min'=>'0.00', 'step'=>'any'])!!}
                    </div>

                    <label for="icon" class="mtop16">Icono</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="far fa-keyboard"></i>
                            </span>
                        </div>
                        {!! Form::text('icon', $cat->icono, ['class' => 'form-control']) !!}
                    </div>

                    
                    <label for="imagen" class="mtop16">Imagen destacada</label>
                    <div class="custom-file">
                        {!! Form::file('imagen',['class' => 'col-md-12 custom-file-input', 'id'=>'customFile']) !!}
                        <label for="customFile" class="custom-file-label">Choose File</label>
                    </div>
              


                    <div class="row mtop16">
                        <div class="col-md-12">
                            {!! Form::submit('Guardar', ['class' => 'btn btn-dark  btn-block']) !!}
                        </div>
                    </div>


 
                    
                    {!!Form::close() !!}
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
    