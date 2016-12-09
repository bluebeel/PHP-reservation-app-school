<?php
require('config.php');

require('core/autoload/autoload.php');

$autoloader = new Autoload();

spl_autoload_register([$autoloader, 'load']);

$autoloader->register('loader', function(){
    return require(PATH.'/core/view/loader.php');
});

$autoloader->register('db', function(){
    return require(PATH.'/core/database/database.php');
});

$view = new View( new Loader(PATH.'/views/') );
$router = new Router();
$db = new Db();

?>
