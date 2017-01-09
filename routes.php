<?php
require('controllers/reservation.php');
require('controllers/index.php');
require('controllers/admin.php');

/*
 * Routes of the app
 */
$router->add('/tw/',
function () use ($view, $db) {
    indexController($view, $db);
});

$router->add('/tw/admin',
function () use ($view, $db) {
    adminController($view, $db);
});

$router->add('/tw/reservation',
function () use ($view, $db) {
    reservationController($view, $db);
});
