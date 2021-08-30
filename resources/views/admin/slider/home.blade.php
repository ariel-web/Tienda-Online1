@extends('admin.master')
@section('title','Sliders')
@section('title-body','Dashboard')
@section('title-icon','fab fa-microsoft')

@section('breadcrumb')
<li class="breadcrumb-item" >
    <a href="{{ url('/admin/slider') }}">
        <i class="fas fa-folder-open"></i> Slider
    </a> 
</li>
@endsection 


@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-md-3" >
            <div class="panel shadow" >

                <div class="header">
                    <h2 class="title"><i class="fas fa-plus"></i> Agregar Imagen Slider</h2>
                </div>
                <div class="inside">
                    {!!Form::open(['url' => '/admin/slider/add','files'=>true])!!}
                    
                    <label for="img" class="">Imagen para el Slider</label>
                    <div class="custom-file">
                        {!! Form::file('img',['class' => 'col-md-12 custom-file-input', 'id'=>'customFile']) !!}
                        <label for="customFile" class="custom-file-label">Elegir Imagen</label>
                    </div>
                    
                    <label for="visible" class="mtop16">¿Estará Visible?</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">   
                                <i class="far fa-keyboard"></i>
                            </span>
                        </div>
                        {!! Form::select('visible',['0'=>'NO', '1'=>'SI'], 1, ['class'=>'form-control', 'min'=>'0.00', 'step'=>'any'])!!}
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
                    <h2 class="title" style="color:#00A3A6;"><i class="fas fa-folder"></i> Sliders</h2>
                </div>
                <div class="inside">

                    <table class="table">
                        <thead>
                            <tr>
                                <td width="32">Id</td>
                                <td width="420">Slider</td>
                                <td>Estado</td>
                                <td width="160"></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $sld)
                            <tr>
                                <td>{{$sld->id}}</td>
                                <td>
                                    <a href="{{url('/imagenes/sliders/'.$sld->sld_file_path.'/'.$sld->sld_imagen) }}" data-fancybox="gallery">
                                        <img src="{{url('/imagenes/sliders/'.$sld->sld_file_path.'/'.$sld->sld_imagen) }}" style="width: 400px; height:80px;" alt="">
                                    </a>
                                </td>
                                <td>{{$sld->sld_estado}}</td>

                                <td>
                                    <div class="opts">                                
                                        <a href="{{ url('/admin/product/'.$sld->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar">
                                            <i class="fas fa-edit edit" ></i>
                                        </a>
                                        <a href="{{ url('/admin/product/'.$sld->id.'/remove') }}" data-toggle="tooltip" data-placement="top" title="Eliminar" >
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
    