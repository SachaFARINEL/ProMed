<?php

namespace Controllers;

abstract class Controller
{

    protected $modelName;
    protected $model;

    public function __construct()
    {
        session_start();
        $realModelName = "\\Models\\" . $this->modelName;
        $this->model = new $realModelName();
    }
}
