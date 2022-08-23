<?php

class Controller
{
    public function view($view, $data = [])
    {

        if (!isset($_SESSION["login"])) {
            require '../app/views/login/index.php';
        } else {
            require '../app/views/' . $view . '.php';
        }
    }

    public function model($model)
    {
        require '../app/models/' . $model . '.php';

        return new $model;
    }
}
