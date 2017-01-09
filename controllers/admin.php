<?php
include_once(PATH . "/models/reservation.php");

function adminController($view, $db)
{
    $result = $db->select("SELECT * FROM reservation");
    $view->assign("reservationList", $result);
    $view->display('admin.php');
}
