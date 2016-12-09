<?php
require('bootstrap.php');
require('routes.php');
include_once("models/reservation.php");

session_start();
if (!isset($_SESSION["res"])) {
    $reservation     = new Reservation;
    $_SESSION["res"] = $reservation;
} else {
    $reservation = $_SESSION["res"];
}

$router->dispatch();
