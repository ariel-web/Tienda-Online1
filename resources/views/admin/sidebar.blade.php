<div class="sidebar shadow">
    <div class="section-top">
        <div class="logo">
            <img src="{{url('static/imagenes/logo-claro.png')}}" alt="" class="img-fluid">
        </div>
        <hr class="hr3">
        <div class="user">
            <div class="namePerfil">
               {{ strtoupper ($resultado = substr(Auth::user()->name, 0,2)) }}
            </div>
            <div class="datos">
                <div class="name">
                    {{Auth::user()->name }}   
                </div>
                <div class="email">
                    {{Auth::user()->email }}
                </div>
            </div>

        </div>
        <hr class="hr3" style="margin-bottom: 0px">
    </div>

    <div class="main">
        <ul>
            <li>
                <a href="{{url('/admin')}}">
                    <i class="fab fa-microsoft"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="{{url('/admin/users') }}">
                    <i class="fas fa-users"></i> Usuarios
                </a>
            </li>
            <li>
                <a href="{{url('/admin/products')}}">
                    <i class="fas fa-tshirt"></i> Productos
                </a>
            </li>

            <li>
                <a href="{{url('/admin/categories/0') }}">
                    <i class="fas fa-hard-hat"></i> Categorias
                </a>
            </li>
            <li>
                <a href="{{url('/admin/slider') }}">
                    <i class="fas fa-image"></i> Sliders
                </a>
            </li>
            <hr class="hr3">
            <li>
                <a href="{{url('/admin/contact') }}">
                    <i class="fas fa-hard-hat"></i> Contactame
                </a>
            </li>
            <li>
                <a href="{{ url('/logout') }}"> 
                    <i class="fas fa-sign-out-alt"></i> Cerrar Sesión 
                </a>
{{--                 <a href="{{ url('/logout') }}" data-toggle="tooltip" data-placement="top" title="Salir"> 
                    <i class="fas fa-sign-out-alt"></i> Salir 
                </a> --}}
            </li>
            
        </ul>

    </div>
</div>