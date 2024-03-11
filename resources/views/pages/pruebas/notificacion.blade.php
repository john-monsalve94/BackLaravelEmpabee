<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notificaciones</title>
</head>
<body>
    <script>
        const user_id = {!! json_encode($user_id) !!};
    </script>
    @vite(['resources/js/app.js','resources/js/notificacion.js'])
</body>
</html>