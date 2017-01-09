<?php
include_once(PATH . "/models/reservation.php");

function indexController($view, $db)
{
    $view->display('index.php');
}
