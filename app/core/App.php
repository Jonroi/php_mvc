<?php

class App
{
    private $controller = 'home';
    private $method = 'index';

    //  gets URL and splits it into array
    private function splitURL()
    {
        $URL = $_SERVER['REQUEST_URI'] ?? 'home';
        $URL = explode("/", $URL);
        return $URL;
    }

    //  downloads file/page , checks if file exists, if not, throws error
    public function loadController()
    {
        $URL = $this->splitURL();
        $file = "../app/controllers/" . ucfirst($URL[1]) . ".php";
        if (file_exists($file)) {
            require $file;
            $this->controller = ucfirst($URL[1]);
        } else {
            $file = "../app/controllers/_404.php";
            require $file;
            $this->controller = "_404";
        }

        $this->method = isset($URL[2]) ? $URL[2] : 'index'; // Set method based on URL

        $controller = new $this->controller;
        if (method_exists(
            $controller,
            $this->method
        )) {
            $controller->{$this->method}();
        } else {

            echo "Method not found";
        }
    }
}
