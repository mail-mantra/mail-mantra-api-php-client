<?php
include_once __DIR__ . '/../vendor/autoload.php';

$mmSmtp = new MailMantra\Smtp($api_key);

// $mmSmtp = new MailMantra\Smtp();
// $mmSmtp->setAuthKey($api_key);

// ---------------------- Start : View Balance ----------------------------------------------

$result_arr = $mmSmtp->mail($to, $subject, $body);
echo json_encode($result_arr);
die;

/*
Sample Output
-------------
{
    "status": 0,
    "message": "Email successfully sent"
}
*/

// ---------------------- End : View Balance ----------------------------------------------

