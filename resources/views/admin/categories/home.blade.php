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
                    <h2 class="title"><i class="fas fa-plus"></i> Categorias</h2>
                </div>
                <div class="inside">
                    {!!Form::open(['url' => '/admin/category/add'])!!}
                    
                    
                    <label for="name">Nombre de la Cateoria</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="far fa-keyboard"></i>
                            </span>
                        </div>
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>

                    
                    <label for="module"class="mtop16">Modulo</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="far fa-keyboard"></i>
                            </span>
                        </div>
                        {!! Form::select('module',getModulesArray(), 0, ['class'=>'form-control', 'min'=>'0.00', 'step'=>'any'])!!}
                    </div>

                    <label for="icon" class="mtop16">Icono</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="far fa-keyboard"></i>
                            </span>
                        </div>
                        {!! Form::text('icon', null, ['class' => 'form-control']) !!}
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
        <div class="col-md-9" >
            <div class="panel shadow" >

                <div class="header">
                    <h2 class="title"><i class="fas fa-folder"></i> Categorias</h2>
                </div>
                <div class="inside">
                    <nav class="nav nav-pills nav-fill">
                        @foreach (getModulesArray() as $modulo => $k)
                            <a class="nav-link" href="{{ url('/admin/categories/'.$modulo)}}"> <i class="fas fa-th-list"></i> {{ $k }}</a>
                        @endforeach
                    </nav>
                    <table class="table">
                        <thead>
                            <tr>
                                <td width="32"></td>
                                <td>Nombre</td>
                                <td width="160"></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cats as $categoria)
                                <tr>
                                    <td>{!! htmlspecialchars_decode($categoria->icono) !!}</td>
                                    <td>{{ $categoria->name }}</td>
                                    <td>
                                        <div class="opts">                                
                                            <a href="{{ url('/admin/category/'.$categoria->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar">
                                                <i class="fas fa-edit edit" ></i>
                                            </a>
                                            <a href="{{ url('/admin/category/'.$categoria->id.'/remove') }}" data-toggle="tooltip" data-placement="top" title="Eliminar" >
                                                <i class="fas fa-trash delete"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
    