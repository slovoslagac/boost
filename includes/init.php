<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'].DS.'boost');
defined('LAYOUT_PATH') ? null : define('LAYOUT_PATH', SITE_ROOT . DS . 'layouts');
defined('INC_PATH') ? null : define('INC_PATH', SITE_ROOT . DS . 'includes');


//Clasess

require INC_PATH . DS . 'config.php';
require INC_PATH . DS . 'user.php';
require INC_PATH . DS . 'db.php';
require INC_PATH . DS . 'functions.php';
require INC_PATH . DS . 'apifunctions.php';
require INC_PATH . DS . 'session.php';
require INC_PATH . DS . 'summoners.php';
require INC_PATH . DS . 'orders.php';


//Layouts

$headLayout = LAYOUT_PATH.DS.'head.php';

//Variables

$salt = "$%klsakdlkakal#$$";

