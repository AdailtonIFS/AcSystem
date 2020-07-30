<?php
    include("../config/config.php");
    include('../vendor/autoload.php');


    $routes = new App\controller\RoutesController();
    
    var_dump($routes::parseUrl());

   