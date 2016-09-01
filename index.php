<?php

define('APPLICATION_PATH', dirname(__FILE__));
define('APPLICATION_APP_PATH', APPLICATION_PATH . '/application');
define('APPLICATION_APP_VIEW_PATH', APPLICATION_APP_PATH . '/views');

$application = new Yaf\Application( APPLICATION_PATH . "/conf/application.ini");

$application->bootstrap()->run();
?>
