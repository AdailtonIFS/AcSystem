<?php
    include("../config/config.php");
    include('../vendor/autoload.php');


    $controller = new App\controller\HomeController();
    
    echo $controller -> index();

   