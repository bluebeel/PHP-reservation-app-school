<?php
include_once(PATH . "/models/reservation.php");

function indexController($view, $db)
{
    $result = $db->select("SELECT * FROM reservation");
    $view->assign("reservationList", $result);
    $view->display('index.php');
}
