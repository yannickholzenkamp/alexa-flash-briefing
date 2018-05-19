<?php

date_default_timezone_set("Europe/Berlin");
setlocale(LC_ALL, 'de_DE');
spl_autoload_register('autoloader');

require 'config.php';
require 'vendor/autoload.php';

foreach (Config::define() as $instance) {
    if ($instance->getLoader() != null) {
        $instance->getLoader()->init($instance);
        $instance->getLoader()->load();
    }
}

function autoloader($classname) {
    $folder = explode('_', $classname);
    $file = 'app/classes/' . strtolower(implode('/', $folder)) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
}

?>