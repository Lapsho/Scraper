<?php
spl_autoload_register(function ($classname) {
    require_once('src/redpepper/' . $classname . '.php');
});

$app = new AppController;
$app->indexAction();