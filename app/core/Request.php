<?php
namespace app\core;

use Exception;

class Request {

    public function getPath(){
        $path = $_SERVER['REQUEST_URI'] ??  '/';
        $position = strpos($path,'?');
        if ($position == false){
            
            return $path;
        }
        return substr($path,0,$position);

    }
    public function getMethode(){
        return $_SERVER['REQUEST_METHOD'] ?? 'GET';
    }
    public function getBody(){
        if($this->getMethode() == 'POST'){
            $entityBody = file_get_contents('php://input');
                if($entityBody){
                    return $entityBody;
                }
        }
        return false;
    }
}