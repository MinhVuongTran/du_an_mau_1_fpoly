<?php 
    class App {

        private $controller, $action, $params, $route;  

        public function __construct()
        {
            $this -> route = new Route();
            global $routes;

            if(!empty($routes['default_controller'])) {
                $this -> controller = $routes['default_controller'];
            }
            $this -> param = [];
            $this -> action = 'index';

            $this -> handleUrl();
        }

        public function handleUrl()
        {

            $url = getUrl();
            $url = $this -> route -> handleRoute($url);
            
            $urlArr = array_filter(explode('/', $url));
            $urlArr = array_values($urlArr);

            // Xử lý controller
            
            $urlCheck = '';
            if (!empty($urlArr)) {
                foreach ($urlArr as $key => $item) {
                    $urlCheck .= $item . '/';

                    $fileCheck = rtrim($urlCheck, '/');
                    $fileArr = explode('/', $fileCheck);
                    $fileArr[count($fileArr) - 1] = ucfirst($fileArr[count($fileArr) - 1]);
                    $fileCheck = implode('/', $fileArr);
    
                    if(!empty($urlArr[$key - 1])){
                        unset($urlArr[$key - 1]);
                    }
                    if(file_exists("./app/Controllers/" . ($fileCheck) . "Controller.php")) {
                        $urlCheck = $fileCheck . "Controller.php";
                        break;
                    }
                }
                $urlArr = array_values($urlArr);
            }

            if (!empty($urlArr[0])) {
                $this -> controller = ucfirst(strtolower($urlArr[0])) . 'Controller';
            } else {
                $this -> controller = ucfirst(strtolower($this -> controller)) . 'Controller';
            }

            if(file_exists("./app/Controllers/" . trim($urlCheck, '/'))) {
                if (explode('/', $urlCheck)[0] === 'site' || explode('/', $urlCheck)[0] === '') {
                    require_once "./app/Controllers/site/".$this -> controller.".php";
                } else {
                    require_once "./app/Controllers/admin/".$this -> controller.".php";
                }
                $this -> controller = new $this -> controller();
                unset($urlArr[0]);
            } else {
                echo "Không tồn tại";
            }


            $urlArr = array_values($urlArr);
            
            // Xử lý action
            if (!empty($urlArr[0])) {
                $this -> action = $urlArr[0];
                unset($urlArr[0]);
            }

            // Xử lý params
            $this -> params = array_values($urlArr);
            
            // Kiểm tra method tồn tại
            if (method_exists($this -> controller, $this -> action)) {
                call_user_func_array([$this -> controller, $this -> action], $this -> params);
            } else {
                echo "Không tồn tại";
            }
        }
    }
?>