<?php
include_once __DIR__ . '/../vendor/autoload.php';

$mmSMS = new MailMantra\Sms($api_key);

// $mmSMS->setAuthKey($api_key);

// ---------------------- Start : View Balance ----------------------------------------------

$balance_arr = $mmSMS->balance();
print_r($balance_arr);
die;

/*
Sample Output
-------------
Array
(
    [status] => 1
    [message] => 100
    [code] => EMAILT
)
*/

// ---------------------- End : View Balance ----------------------------------------------

