<?php
    class Route{
        public function run(){
            $elements = explode('/',$_SERVER['REQUEST_URI']);
            $action = 'index';
            $controller = 'main';
                if(isset($elements[1])&&(!empty($elements[1]))){
                    if (!file_exists("app/controllers/".$elements[1].".php")){                 
                        $controller ='error_404';
                    }
                    else{                       
                        $controller =$elements[1];
                    }
                }
                else{
                    $this->do_action($controller,$action);
                    return;
                }
                
                if(isset($elements[2])&&(!empty($elements[2]))){
                    if(!method_exists($run['controller'],$elements[2])){
                        $controller ='error_404';
                    }
                    else{
                        $action = $elements[2];
                    }
                }
                
                $this->do_action($controller,$action);                           
        }
        
        public function do_action($controller,$action){
            include_once("app/controllers/".$controller.".php");
            $obj = new $controller;
            $obj->$action();
        }
        
    }
?>