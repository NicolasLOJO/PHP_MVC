<?php
class route{

    private static $listControl = [];

    public function __construct(){
    }

    public static function setRoute($route, $action){
        if(array_key_exists($route, self::$listControl)){
            if(in_array($action, self::$listControl[$route])){
                $status = 'Already exist';
                return $status;
            }
        } else {
            self::$listControl[$route] = $action;
            $status = 'Added';
            return $status;
        }
    }

    public static function getRoute(){
        return self::$listControl;
    }

    public static function call($controller, $action){
        self::selectRoute('controllers', $controller);
        $list = self::getRoute();
        
        foreach($list as $key => $value){
            switch($controller){
                case $key:
                    $controller = new $key();
                break;
            }
        }
        
        $controller->{$action}();
    }

    public static function selectRoute($path, $controller){
        require_once($path . '/' . $controller . '_Controller.php');
    }

}