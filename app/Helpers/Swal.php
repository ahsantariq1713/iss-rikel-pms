<?php

namespace App\Helpers;

class Swal
{
    public static function alert($component,$icon,$title,$text, $button = 'Ok', $timer = 0, $dismiss = null){
        $component->emit('redirect',[
            'icon' => $icon,
            'title' => $title,
            'text' => $text,
            'button' => $button,
            'timer' => $timer,
            'dismiss' => $dismiss
        ]);
    }

    public static function redirect($component,$icon,$title,$text,$redirect,$options,$timer = 0){
        $component->emit('redirect',[
            'icon' => $icon,
            'title' => $title,
            'text' => $text,
            'redirect' => $redirect,
            'options' => $options,
            'timer' => $timer,
            'dismiss' => null
        ]);
    }
}
