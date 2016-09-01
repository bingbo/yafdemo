<?php

function custom_autoload($class){
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $file = APPLICATION_APP_PATH . DIRECTORY_SEPARATOR . $class . '.php';
    if(file_exists($file)){
        Yaf\Loader::import($file);
    }
}
