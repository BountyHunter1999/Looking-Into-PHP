<?php

namespace Core;

class Router {
    protected $routes = [];

    public function add($uri, $controller, $method){
        $this->routes[] = [
            "uri" => $uri,
            "controller" => $controller,
            "method" => $method
        ];

        return $this;
    }
    // public function add($uri, $controller, $method){
    //     $this->routes[] = compact("uri", "controller", "method");
    // }
    public function get($uri, $controller) {
        return $this->add($uri,$controller, "GET");
    }

    public function post($uri, $controller) {
        return $this->add($uri, $controller, "POST");
    }
    public function delete($uri, $controller) {
        return $this->add($uri,$controller,"DELETE");
    }

    public function patch($uri, $controller) {
        return $this->add($uri, $controller,"PATCH");
    }
    public function put($uri, $controller) {
        return $this->add($uri,$controller,"PUT");
    }

    public function only($key) {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }

    public function route($uri, $method = "GET") {
        // dd($this->routes);
        foreach ($this->routes as $route) {
            if ($route["uri"] === $uri && $route['method'] === strtoupper($method)) {
                // apply the middleware
                if (key_exists("middleware", $route)) {
                    if ($route['middleware'] === 'guest') {
                        if ($_SESSION['user'] ?? false) {
                            header('location: /');
                            exit();
                        }
                    }
                    if ($route['middleware'] === 'auth') {
                        if (! ($_SESSION['user'] ?? false)) {
                            header('location: /');
                            exit();
                        }
                    }
                }
                return require base_path($route['controller']);
            }
        }
        
        $this->abort(); 
    }


    protected function abort($code = 404) {
        http_response_code($code);
    
        // echo "Sorry, Not Found.";
        require base_path("views/{$code}.php");
    
        die();
    }
    

}
