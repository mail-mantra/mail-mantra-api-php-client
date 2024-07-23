<?php
include_once __DIR__ . '/../vendor/autoload.php';

$mmKyc = new MailMantra\Kyc($api_key);

//$mmKyc = new MailMantra\Kyc();
//$mmKyc->setAuthKey($api_key);

// ---------------------- Start : View Balance ----------------------------------------------

$balance_arr = $mmKyc->balance();
print_r($balance_arr);
die;

/*
Sample Output
-------------
Array
(
    [status] => 0
    [message] => Details Found
    [data] => Array
        (
            [key] => 62a990c3b9b83-1655279811
            [rate] => 5.00
            [status] => active
            [balance] => 0.00
            [key_name] => test
        )

)
*/

// ---------------------- End : View Balance ----------------------------------------------

