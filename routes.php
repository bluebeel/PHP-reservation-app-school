<?php
require('controllers/reservation.php');
require('controllers/index.php');

/*
 * Routes of the app
 */
$router->add('/tw/',
function () use ($view, $db) {
    indexController($view, $db);
});

$router->add('/tw/reservation',
function () use ($view, $db) {
    reservationController($view, $db);
});
