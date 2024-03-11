import Echo from "laravel-echo"

Echo
    .join(`notifiacion.${user_id}`)
    .listen('NotificacionEvent',(e)=>{
        console.log(e);
    });