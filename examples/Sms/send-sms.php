<?php
include_once __DIR__ . '/../vendor/autoload.php';

$mmSMS = new MailMantra\Sms($api_key);

// $mmSMS->setAuthKey($api_key);


// ---------------------- Start : Send SMS ----------------------------------------------
$send_report = $mmSMS->send('7044064526', 'Your OTP Verification Code is 9842. Do not share with anyone.', '1207162918322103729');

print_r($send_report);

/*
Sample Output
-------------
Array
(
    ["status"] => 1,
    ["message"] => "1 SMS send Successfully..",
    ["code"] => "346772776371353130393036"
);

// ---------------------- End : Send SMS ----------------------------------------------