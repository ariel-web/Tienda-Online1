<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('/static/css/connect.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/b548e1e62c.js" crossorigin="anonymous"></script>
    <title>@yield('title')</title>
</head>
<body>
    {{-- @if(Session::has('message'))
        <div class="container">
            <div class="alert alert-{{Session::get('typealert') }}" style="display:none">
                {{Session::get('message') }}
                @if ($errrors->any())
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
    @endif --}}

    @section('content')  

    @show
    
</body>
</html>