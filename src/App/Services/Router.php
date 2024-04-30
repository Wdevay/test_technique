<?php

namespace App\Services;


class Router
{
    private $page;
    private $action;

    public function __construct()
    {
        $this->setPage();
        $this->setAction();
    }

    public function setPage()
    {
        $this->page = isset($_GET['page']) ? strtolower($_GET['page']) : 'user';
    }

    public function getPage()
    {
        return $this->page;
    }

    public function setAction()
    {
        $this->action = isset($_GET['action']) ? strtolower($_GET['action']) : 'index';
    }

    public function getAction()
    {
        return $this->action;
    }

    public function run()
    {   
        $controllerName = "App\Controllers\UserController";
        $action = "index";

        if(file_exists("./src/App/Controllers/". ucfirst($this->getPage()) ."Controller.php")){
            $controllerName = "App\Controllers\\" . ucfirst($this->getPage()) . "Controller"; // ucfirst() met la première lettre en majuscule
        }
        if(method_exists($controllerName,$this->getAction())){
            $action = $this->getAction();
        }
        $controller = new $controllerName();
        $controller->$action();
    }
}
