<?php
require('config.php');
require('core/database/database.php');
require('core/router/router.php');
require('core/view/loader.php');
require('core/view/view.php');

/*
 * Loading important classes.
 */

$view = new View(new Loader(PATH . '/views/'));
$router = new Router();
$router->setView($view);
$db = new Db();
