<?php
include_once __DIR__ . '/../vendor/autoload.php';

$mmSmtp = new MailMantra\Smtp($api_key);

// $mmSmtp = new MailMantra\Smtp();
// $mmSmtp->setAuthKey($api_key);

// ---------------------- Start : View Balance ----------------------------------------------

$balance_arr = $mmSmtp->balance();
echo json_encode($balance_arr);
die;

/*
Sample Output
-------------
{
    "status": 0,
    "message": "Details Found",
    "data": {
        "key": "62a******-****18",
        "rate": "1.05",
        "status": "inactive",
        "balance": "49895.80",
        "sender_name": "Milan 123",
        "sender_email": "milan@mailmantra.in",
    }
}
*/

// ---------------------- End : View Balance ----------------------------------------------

