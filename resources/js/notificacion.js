import Echo from "laravel-echo"

window.Echo
    .channel(`notifiacion.${user_id}`)
    .listen('NotificacionEvent',(e)=>{
        console.log(e);
    });