<?php 
namespace app\core ;

use app\core\Request;
use app\core\Application;
use app\core\utility\SingleInstanceFromFile;;

class Router {
    public Request $request; 
    protected array $routes =[];
    public function __construct (Request $request)
    {
        $this->request = $request;
    }
    
    function resolve()
    {
        $this->routes = require_once Application::$ROOT_DIR.'/../app/routes/routes.php';
        $path = $this->request->getPath();
        $methods= $this->request->getMethode();
        try{
            if ($this->routes[$path] && $this->routes[$path]['methode'] == strtolower($methods))
                {
                        $controller = $this->routes[$path]['controller'];
                        $class = SingleInstanceFromFile::getInstance('\app\src\controller\\'.$controller)->getInstanceFromFile();
                        return call_user_func(array($class,'index'));
                }
        }catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        if ( !$this->routes[$path])
        {
            return  "not found";
        }

    }
}