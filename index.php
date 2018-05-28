<?php

session_start();
date_default_timezone_set('Europe/Paris');
require_once('classes/database.php');
require_once('models/sql_Manager.php');
require_once('models/posts.php');
$title = 'Mini Blog';

if(isset($_GET['controller']) && isset($_GET['action'])){
    if($_GET['controller'] == 'ajax'){
        $controller = $_GET['controller'];
        $action = $_GET['action'];
        require('views/ajaxlayout.php');
    } else {
        $controller = $_GET['controller'];
        $action = $_GET['action'];
        require('views/layout.php');
    }
} else {
    $controller = 'pages';
    $action = 'home';
    require('views/layout.php');
}
