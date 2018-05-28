<?php
require_once('../../classes/database.php');
$list = [];
$db = database::connect();
$rep = $db->query('SELECT id, author, signin_date FROM user');
foreach($rep->fetchAll() as $posts){
    $list[] = $posts;
}
    echo json_encode($list);


  