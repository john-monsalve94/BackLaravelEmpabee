<?php

use App\Models\Notificacion;
use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('notificacion.{user_id}',function(User $user,int $notificacion_id){
    if($user->notificaciones->contains($notificacion_id)){
        return Notificacion::find($notificacion_id);
    }
});