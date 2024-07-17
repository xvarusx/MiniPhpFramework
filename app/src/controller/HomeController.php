<?php

namespace app\src\controller;

use app\core\utility\AbstractController;

class HomeController extends AbstractController {

    public  function index () {
    // return renderView('home.html');
    $this->render('/Home/Home.html');
    }
    
}