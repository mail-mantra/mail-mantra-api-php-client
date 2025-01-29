<?php
include_once __DIR__ . '/../vendor/autoload.php';

$mmKyc = new MailMantra\Kyc($api_key);

//$mmKyc = new MailMantra\Kyc();
//$mmKyc->setAuthKey($api_key);

// ---------------------- Start : View Balance ----------------------------------------------
$pan_number = 'ALWPG5809L';
$response_arr  = $mmKyc->pan($pan_number);
echo json_encode($response_arr);
die;


/*
Sample Output
-------------
{
    "status": 0,
    "message": "Valid Input",
    "data": {
        "pan_status": "VALID",
        "pan_number": "ALWPG5809L",
        "user_full_name": "SUBHAS CHANDRA BOSE",
        "pan_type": "Person"
    }
}
*/

// ---------------------- End : View Balance ----------------------------------------------

