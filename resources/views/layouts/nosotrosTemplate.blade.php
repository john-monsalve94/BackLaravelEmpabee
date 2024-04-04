<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/public/css/home.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;700&display=swap" rel="stylesheet">
    {{-- <script src="https://use.fontawesome.com/03f8a0ebde.js"></script> --}}
    <script src="https://kit.fontawesome.com/d012b974aa.js" crossorigin="anonymous"></script>

    @yield('estilos')
    {{-- <link rel="stylesheet" href="https://rsms.me/inter/inter.css"> --}}
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>EmpaBee 2</title>
</head>

<body>

    <header>
    </header>

    <main>

        @yield('nosotros')

    </main>

    <footer>
    </footer>

    {{-- @yield('javascript') --}}



    {{-- header y footer --}}


</body>

</html>
