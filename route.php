<?php
require_once('classes/route.php');

route::setRoute('pages', (['home', 'error']));
route::setRoute('posts', (['index', 'show', 'update', 'create', 'add', 'delete', 'updateadd', 'test']));
route::setRoute('comment', (['add', 'create']));
route::setRoute('Connected', (['login', 'signup', 'create', 'verifLogin', 'logout', 'member']));
route::setRoute('ajax', (['create', 'favoritePost', 'favoriteAnnonce', 'logout', 'login', 'test']));
route::setRoute('annonce', (['index', 'create', 'show', 'delete']));

$controllers = route::getRoute();

if (array_key_exists($controller, $controllers)) {
    if(in_array($action, $controllers[$controller])) {
        route::call($controller, $action);
    } else {
        route::call('pages', 'error');
    }
} else {
    route::call('pages', 'error');
}