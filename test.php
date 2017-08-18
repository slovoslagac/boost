<?php
/**
 * Created by PhpStorm.
 * User: petar
 * Date: 8.6.2017
 * Time: 12:49
 */
include(join(DIRECTORY_SEPARATOR, array('includes', 'init.php')));

$allorders = getDetailedOrders();

$i = 0;
foreach ($allorders as $item) {
    $i++;
//    ($i == 5) ? sleep(10) : '';
    if ($item->status != 0) {
        var_dump($item);
    }
//
}
