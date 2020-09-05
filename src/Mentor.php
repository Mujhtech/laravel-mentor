<?php

namespace Mujhtech\LaravelMentor;

class Mentor {

    public function greet(String $sName)
    {
        return 'Hi ' . $sName . '! How are you doing today?';
    }

    public function getPath(String $path){
        return __DIR__."/../$path";
    }

}