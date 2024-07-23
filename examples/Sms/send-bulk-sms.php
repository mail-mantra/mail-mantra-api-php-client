<?php
include_once __DIR__ . '/../vendor/autoload.php';

$mmSMS = new MailMantra\Sms($api_key);

// $mmSMS->setAuthKey($api_key);


// ---------------------- Start : Send SMS ----------------------------------------------

$sms = [
    [
        'message' => 'Your OTP Verification Code is 1234. Do not share with anyone.
//www.test.com -ECOSOL',
        'to' => [
            '9999999999',
            '8888888888',
        ]
    ],
    [
        'message' => 'Your OTP Verification Code is 5678. Do not share with anyone.
//www.test.com -ECOSOL',
        'to' => [
            '9999999999',
            '7777777777'
        ]
    ],
];

$send_report = $mmSMS->sendBulk($sms, '1207162918322103729');

print_r($send_report);

/*
Sample Output
-------------
Array
(
    ["status"] => 1,
    ["message"] => "4 SMS send Successfully..",
    ["code"] => "346772776371353130393036"
);

// ---------------------- End : Send SMS ----------------------------------------------