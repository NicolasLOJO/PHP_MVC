<?php

class database{

    private static $db = NULL;
    private static $host = 'localhost';
    private static $dbname = 'test';
    private static $username = 'niko';
    private static $password = 'root';
    
    private function __construct(){}

    private function __clone() {}

    public static function connect(){
        if(!isset(self::$db)){
            $pdo_option[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            self::$db = new PDO('mysql:host=' . self::$host .';dbname=' . self::$dbname . ';charset=utf8', self::$username, self::$password, $pdo_option);
        }
        return self::$db;
    }
}