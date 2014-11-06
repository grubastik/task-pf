<?php

//define application root path
define('APPLICATION_ROOT_PATH', realpath(dirname(__FILE__) . '/..'));
//define application path
define('APPLICATION_PATH', APPLICATION_ROOT_PATH.'/test_pf');
//define config path
define('APPLICATION_CONFIG_PATH', APPLICATION_PATH.'/configs');

//we require only this one file to be included manually to run zend app
//all other files will be loaded using Zend autoloader
require_once 'Zend/Application.php';

//instantiate Zend App object
$application = new Zend_Application(
	'dev',//dev environment see application.ini file
	APPLICATION_CONFIG_PATH . '/application.ini'
);

//configure app through Bootstrap (bootstrap all extensions) and run it
$application->bootstrap(array('FrontController', 'DB', 'Layout', 'View'))->run();

