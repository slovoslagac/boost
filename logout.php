<?php
/**
 * Created by PhpStorm.
 * User: Korisnik
 * Date: 7.6.2017
 * Time: 17:01
 */

include(join(DIRECTORY_SEPARATOR, array('includes', 'init.php')));

$session->logout();
redirectTo("login.php");