<?php   

    namespace app\controller;

    class RoutesController
    {
        public static function parseUrl($par=null)
        {
            $url=explode('/',rtrim($_GET['url']));
            if(!is_null($par)){
                if(array_key_exists($par,$url)){
                    return $url[$par];
                }else{
                    return false;
                }
            }else{
                return $url;
            }
        }
    }