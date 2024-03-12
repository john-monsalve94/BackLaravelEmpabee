<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notificaciones</title>
    @csrf
</head>

<body>
    @vite(['resources/js/app.js'])
    <script>
        const user_id = {!! json_encode($user_id) !!};
        window.Echo
            .channel(`notifiacion.${user_id}`)
            .listen('NotificacionEvent', (e) => {
                console.log(e);
            });
    </script>

</body>

</html>
