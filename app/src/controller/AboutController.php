<?php

namespace app\src\controller;

use app\core\utility\AbstractController;

class AboutController extends AbstractController {

    public  function index() {
        
    return  $this->render('/About/About.html');
    }
    
}