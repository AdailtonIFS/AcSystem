<?php

    namespace app\controller;

    
    class HomeController{

        public function __construct(){

        }

        public function index(){
            $loader = new \Twig\Loader\FilesystemLoader('../app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig -> load('home.html');
           echo  $template->render();
        }

        
    }


    