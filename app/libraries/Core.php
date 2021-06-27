<?php
    //Core App Class
    class Core {
        protected $currentController = 'Pages';
        protected $currentMethod     = 'index';
        protected $params            = [];

        public function __construct() {
            $url = $this->getUrl();
            //Look for first value in controllers and capitalize first letter with ucwords
            if(strtolower($url[0]) != '') {
                if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                    //Set a new controller
                    $this->currentController = ucwords($url[0]);
                    unset($url[0]);
                } else {
                    header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
                    die("Incorrect route");
                }
            }

            //Require the controller
            require_once '../app/controllers/'. $this->currentController. '.php';
            $this->currentController = new $this->currentController;

            //Check for second part of the URL
            if (isset($url[1])) {
                if (method_exists($this->currentController, $url[1])) {
                    $this->currentMethod = $url[1];
                    unset($url[1]);
                } else {
                    header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
                    die("Incorrect route");
                }
            }
            //get parametrs
            $this->params = $url ? array_values($url) : [];
            // call a callback with array of params
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        }

        public function getUrl() {
            if (isset($_GET['url'])) {
                $url = rtrim($_GET['url'], '/');
                //filter variables as string/filter
                $url = filter_var($url, FILTER_SANITIZE_URL);
                // Breaking into array
                $url = explode('/', $url);
                return $url;
            }
        }

    }
?>