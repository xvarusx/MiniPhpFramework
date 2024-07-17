<?php 

namespace app\core\utility;

use app\core\Application;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

abstract class AbstractController 
{
    

    protected function render(string $view , array $params = []){
        
        $loader = new FilesystemLoader(Application::$ROOT_DIR.'/../app/src/view');

        $twig = new Environment($loader, [
            'cache' => Application::$ROOT_DIR.'/../var/cache/view',
        ]);
        // $loader = new \Twig\Loader\ChainLoader([$loader1, $loader2]);
         echo $twig->render($view, $params);
    }
}