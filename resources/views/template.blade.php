<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto web</title>
</head>
<body>
    <p>
        <a href="{{ route('home')}}">Home</a>
        <a href="{{ route('blog')}}">Blog</a>

        <!-- La siguiente directiva verifica si esta iniciada la sesion
         y funciona como un if else -->
         @auth
        <a href="{{ route('dashboard')}}">Dashboard</a>
         @else
         <a href="{{ route('login')}}">Login</a>
         @endauth
    
    </p>
    <hr>

    <!-- directiva sirve para reemplazar la informacion -->
    @yield('content')
</body>
</html>