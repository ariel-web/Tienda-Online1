@extends('connect.master')

@section('title', 'Login')

@section('content')
<div class="box box_login col-sm">
    <div class="header">
        <a href="{{ url('/') }}">
            <img class="logo" src="{{ url('/static/imagenes/logo-claro.png') }}" alt="">
        </a>
    </div>

    <div class="inside">

        {!! Form::open(['url' => '/login']) !!}
        <label for="email">Correo: </label>
        <div class="input-group mt-1">
            <div class="input-group-prepend">
                <div class="input-group-text fondo-icono">&nbsp;<i class="far fa-envelope-open"></i>&nbsp;</div>
            </div>
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
        </div>

        <label for="password" class="mtop16">Contraseña:</label>
        <div class="input-group mt-1">
            <div class="input-group-prepend">
                <div class="input-group-text fondo-icono">&nbsp;<i class="fas fa-lock"></i>&nbsp;</div>
            </div>
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>
        <div class="mb-2 mt-2">
            {!! Form::submit('Ingresar',['class'=> 'btn btn-success p-2 mtop16']) !!}
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
            ¿No tienes una cuenta?<a href="{{ url('/register') }}">, Registrate </a>
        </div>
        <div class="mb-2" style=" display: flex; justify-content: center;">
            <a href="{{ url('/recover') }}"> Recuperar contraseña </a>
        </div>
    </div>       

</div>
    
@stop

