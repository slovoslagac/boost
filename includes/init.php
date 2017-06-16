<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'] . DS . 'boost');
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
require INC_PATH . DS . 'usertransaction.php';
require INC_PATH . DS . 'slackfunctions.php';

//CSS

//Layouts

$headLayout = LAYOUT_PATH . DS . 'head.php';

//Variables

$salt = "$%klsakdlkakal#$$";
$adminarray = array(1, 3);
$currenciessign = array(1 => "€", 2 => "$", 3 => "£");


//Slack
$financialChanel = 'https://hooks.slack.com/services/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';


//Orders
$ordertypeclass = array('SD' => 'blue', 'SP' => 'maroon', 'SNW' => 'olive', 'DD' => 'orange', 'DP' => 'navy', 'DNW' => 'black', 'SN' => 'red');
