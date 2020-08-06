<?php
   
   
    $routes = new App\controller\RoutesController();
    $routes -> getRoute('home','HomeController@index');
    $routes -> getRoute('laboratorios','LabsController@index');
    $routes -> getRoute('','HomeController@index');
