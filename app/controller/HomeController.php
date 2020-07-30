<?php

    namespace app\controller;
    use Jenssegers\Blade\Blade;

    
    class HomeController{
        private $blade;

        public function __construct(){

            $this->blade =  new Blade(DIRREQ.'/app/view',DIRREQ.'/public/cache');
        }

        public function index(){
            return $this->blade->render('home');
        }

        
    }


    