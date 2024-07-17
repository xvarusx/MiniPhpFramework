<?php

namespace app\core;

use app\core\Router;
use app\core\Request;

class Application {

    public Router $router ;
    public Request $request;
    public static string $ROOT_DIR;

    function __construct($root_dir){
        $this->request = new Request();
        $this->router = new Router($this->request);
        self::$ROOT_DIR = $root_dir;
    }
    
    function run() 
    {
       $this->router->resolve();
    }
}