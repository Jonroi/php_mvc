<?php

class Controller
{
    public function view($name)
    {
        $file = "../app/views/" . $name . ".view.php";
        if (file_exists($file)) {
            require $file;
            return true;
        } else {
            $file = "../app/views/404.view.php";
            require $file;
        }
    }
}
