@extends('connect.master')

@section('title', 'Registrarse')

@section('content')
<div class="box box_register col-sm">
    <div class="header">
        <a href="{{ url('/') }}">
            <img class="logo" src="{{ url('/static/imagenes/logo-claro.png') }}" alt="">
        </a>
    </div>

    <div class="inside">

        {!! Form::open(['url' => '/register']) !!}
        
        <label for="name">Nombre: </label>
        <div class="input-group mt-1">
            <div class="input-group-prepend">
                <div class="input-group-text fondo-icono">&nbsp;<i class="far fa-user"></i>&nbsp;</div>
            </div>
            {!! Form::text('name', null, ['class' => 'form-control',    'required']) !!}
        </div>
        
        <label for="email" class="mtop16">Correo: </label>
        <div class="input-group mt-1">
            <div class="input-group-prepend">
                <div class="input-group-text fondo-icono">&nbsp;<i class="far fa-envelope-open"></i>&nbsp;</div>
            </div>
            {!! Form::email('email', null, ['class' => 'form-control','required']) !!}
        </div>

        <label for="password" class="mtop16">Contraseña:</label>
        <div class="input-group mt-1">
            <div class="input-group-prepend">
                <div class="input-group-text fondo-icono">&nbsp;<i class="fas fa-lock"></i>&nbsp;</div>
            </div>
            {!! Form::password('password', ['class' => 'form-control','required']) !!}
        </div>
        
        <div class="mb-2 mt-2">
            {!! Form::submit('Registrar',['class'=> 'btn btn-success p-2 mtop16']) !!}
        </div>        
        {!! Form::close() !!}


        @if(Session::has('message'))
            <div class="container">
                <div class="alert alert-{{Session::get('typealert') }}" style="display:none">
                    {{Session::get('message') }}
                    @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>
                    @endif
                    <script>
                        $('.alert').slideDown();
                        setTime(function(){ $('.alert').slideUp(); }, 10000 );
                    </script>
                </div>
            </div>
        @endif






        <div class="mtop16 " style=" display: flex; justify-content: center;">
            ¿Ya tienes una cuenta?<a href="{{ url('/login') }}">, Ingresa </a>
        </div>
    </div>       

</div>
    
@stop

