<?php   

    namespace app\controller;

    class RoutesController
    {   
        #setting up an Array with my URL: 
        public static function parseUrl($par=null)
        {
            $url=explode('/',rtrim($_GET['url']));#tratando a Url

            if(!is_null($par)){
                #checking if the parameter is in the url: 
                if(array_key_exists($par,$url)){ 
                    return $url[$par];
                }else{
                    return false;
                }

            }else{
                return $url;
            }
        }

        #creating my route system
        public function getRoute($request, $action)
        {
            #getting the controller
            $url=self::parseUrl(0);

            #cheking if my URL has the request
            if ($url == $request) {
                #receiving my action
                $finalAction = explode('@',$action);

                #receiving my controller
                $controller = "App\\controller\\{$finalAction[0]}";

                #receiving my method
                $method = $finalAction[1];

                #instantiating my controller
                $instance = new $controller;

                echo call_user_func_array([$instance,$method],self::parseUrl());
            }
        }
    }