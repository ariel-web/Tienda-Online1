@extends('admin.master')

@section('title','Usuarios')
@section('title-body','Dashboard')
@section('title-icon','fab fa-microsoft')

@section('breadcrumb')
<li class="breadcrumb-item" >
    <a href="{{ url('/admin/users') }}"></a>
    <i class="fas fa-users"></i> Usuarios 
</li>
@endsection 

@section('content')
<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"><i class="fas fa-users"></i> Usuarios</h2>
        </div>
        <div class="inside">
{{--             <table class="table" id="example1">
            
                 <thead>
                    <td>ID</td>
                    <td>NOMBRE</td>
                    <td>TIPO DE USUARIO</td>
                    <td>EMAiL</td>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id }}</td>
                        <td>{{$user->name }}</td>
                        <td>
                            @if( $user->role == 1 )
                                Administrador
                            @else
                                Normalito
                            @endif
                        </td>
                        <td>{{$user->email}}</td>
                        <td>
                            <div class="opts">                                
                                <a href="{{ url('/admin/user/'.$user->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar">
                                    <i class="fas fa-edit edit" ></i>
                                </a>
                                <a href="{{ url('/admin/user/'.$user->id.'/remove') }}" data-toggle="tooltip" data-placement="top" title="Eliminar" >
                                    <i class="fas fa-trash delete"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                        
                    @endforeach
                </tbody>

            </table>
 --}}



            <table id="example" class="display" >            
                <thead>
                   <td>ID</td>
                   <td>NOMBRE</td>
                   <td>TIPO DE USUARIO</td>
                   <td>EMAiL</td>
                   <td>ACCIONES</td>
               </thead>
               <tbody>
                   @foreach ($users as $user)
                   <tr>
                       <td>{{$user->id }}</td>
                       <td>{{$user->name }}</td>
                       <td>
                           @if( $user->role == 1 )
                               Administrador
                           @else
                               Normalito
                           @endif
                       </td>
                       <td>{{$user->email}}</td>
                       <td>
                           <div class="opts">                                
                               <a href="{{ url('/admin/user/'.$user->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar">
                                   <i class="fas fa-edit edit" ></i>
                               </a>
                               <a href="{{ url('/admin/user/'.$user->id.'/remove') }}" data-toggle="tooltip" data-placement="top" title="Eliminar" >
                                   <i class="fas fa-trash delete"></i>
                               </a>
                           </div>
                       </td>
                   </tr>
                       
                   @endforeach
               </tbody>
               <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Correo</th>
                    <th>Acciones</th>

                </tr>
            </tfoot>

           </table>

        </div>
    </div>
</div>

@endsection