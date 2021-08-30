@extends('admin.master')

@section('title','Productos')
@section('title-body','Dashboard')
@section('title-icon','fab fa-microsoft')

@section('breadcrumb')
<li class="breadcrumb-item" >
    <a href="{{ url('/admin/productos') }}"></a>
    <i class="fab fa-microsoft"></i> Productos 
</li>
@endsection 


@section('content')
<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"><i class="fab fa-microsoft"></i> Productos</h2>
{{--             <div class="btns">
                <a href="{{ url('/admin/product/add') }}" class="btn btn-primary">
                    <i class="fas fa-plus"> Agregar producto</i>
                </a>
            </div> --}}
        </div>
        <div class="inside">
            <div class="btns">
                <a href="{{ url('/admin/product/add') }}" class="btn btn-primary">
                    <i class="fas fa-plus"> Agregar producto</i>
                </a>
            </div>
            <table class="table table-striped mtop16">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td></td>
                        <td>Nombre</td>
                        <td>Categoria</td>
                        <td>Precio</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>
                            <a href="{{url('/imagenes/productos/'.$product->file_path.'/'.$product->name.'/'.$product->image) }}" data-fancybox="gallery">
                                 <img src="{{url('/imagenes/productos/'.$product->file_path.'/'.$product->name.'/'.$product->image) }}" style="width: 60px; border-radius:50%;" alt="">
                            </a>

                        </td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->cate->name}}</td>
                        <td>S/. {{$product->price}}</td>
                        <td>
                            <div class="opts">                                
                                <a href="{{ url('/admin/product/'.$product->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar">
                                    <i class="fas fa-edit edit" ></i>
                                </a>
                                <a href="{{ url('/admin/product/'.$product->id.'/remove') }}" data-toggle="tooltip" data-placement="top" title="Eliminar" >
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

@endsection
    