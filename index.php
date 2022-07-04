<?php

include 'vendor\autoload.php';
include 'config.php';

session_start();

if (isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] !== '/') {

    $path = trim($_SERVER['PATH_INFO'], '/');
    $path = explode('/', $path);

    $class = '\Controller\\' . ucfirst($path[0]);
    if (class_exists($class)) {
        $obj = new $class();

        if (isset($path[1])) {
            $method = $path[1];
        } else {
            $method = 'index';
        }

        if (method_exists($obj, $method)) {
            if (isset($path[2])) {
                $id = $path[2];
                $obj->$method($id);
            } else {
                $obj->$method();
            }
        } else {
            echo '404';
        }
    } else {
        echo '404';

    }
} else {
    $obj = new \Controller\Home();
    $obj->index();
}