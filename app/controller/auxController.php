<?php 
    
        namespace app\controller;


        header("Content-Type: application/json");

        $request = isset($_POST['request']) ? $_POST['request'] : 0 ;
        $controller = isset($_POST['controller']) ? $_POST['controller'] : 0 ;
        $method = isset($_POST['method']) ? $_POST['method'] : 0 ;
   
        echo $request;
        echo $controller;
        echo $method;