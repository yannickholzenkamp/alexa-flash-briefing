<?php

date_default_timezone_set("Europe/Berlin");
setlocale(LC_ALL, 'de_DE');
spl_autoload_register('autoloader');

require 'config.php';

foreach (Config::define() as $getter) {
    $getter->executeLoader();
}

function autoloader($classname) {
    $folder = explode('_', $classname);
    $file = 'app/classes/' . strtolower(implode('/', $folder)) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
}

?>