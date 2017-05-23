<?php
/**
* route class
*/
class Route
{ 
    protected $controller;

    protected $method;

    protected $params;

    public function __construct()
    {
        $this->controller = 'home';

        $this->method = 'index';

        $this->params = array();

        $url = $this->parse_url();

        if ($url === null) {
            $this->redirect_to_home();
        }

        if (file_exists('app/controller/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        } else {
            $this->redirect_to_home();
        }

        require_once 'app/controller/' . $this->controller . '.php';

        $this->controller = new $this->controller;
        
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            } else {
                $this->redirect_to_home();
            }
        }

        $this->params = $url ? array_values($url) : array();

        call_user_func_array(array($this->controller, $this->method), $this->params);
    }

    private function parse_url()
    {
        if (isset($_GET['url'])) {
            $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
            return $url;
        }
    }

    private function redirect_to_home()
    {
        header('Location:' . DOMAIN . 'home');
        die();
    }

    public static function action($controller, $method = 'index', $data = '') {
        $url = DOMAIN  . $controller . '/' . $method;
        if (!empty($data)) {
            foreach ($data as $key) {
                $url = $url . '/' . $key;
            }
        }
        return $url;
    }

    public static function redirect($url)
    {
        header('Location:' . DOMAIN . $url);
        die();
    }
}
