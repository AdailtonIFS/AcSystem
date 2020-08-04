<?php

    namespace app\controller;

    class LabsController{

        public function __construct(){


        }

        public function index(){
            $loader = new \Twig\Loader\FilesystemLoader('../app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig -> load('labs.html');
            echo  $template->render();
        }
  
    }


    