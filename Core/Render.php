<?php

class Render{
    public function renderView($views, $args){
        extract($args);
        require_once __DIR__."/../Views/$views.php";
    }
}