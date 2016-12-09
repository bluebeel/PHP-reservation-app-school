<?php

require('controllers/reservation.php');
require('controllers/index.php');

$router->add('/tw/', function () use ($view, $db) {
    indexController($view, $db);
});

$router->add('/tw/about', function () use ($view) {
    $view->display('about.php');
});

/*
$router->add('/tw/reservation/all', function () use ($view, $db) {
    reservationController($view, $db);
});
*/

$router->add('/tw/reservation', function () use ($view, $db) {
    reservationController($view, $db);
});
