<?php
include_once __DIR__ . '/../vendor/autoload.php';

$mmKyc = new MailMantra\Kyc($api_key);

//$mmKyc = new MailMantra\Kyc();
//$mmKyc->setAuthKey($api_key);

// ---------------------- Start : View Balance ----------------------------------------------
$account_number = '1234567890';
$ifsc = 'SBIN0000001';
$response_arr  = $mmKyc->bav($account_number, $ifsc);
echo json_encode($response_arr);
die;


/*
Sample Output
-------------
{
    "status": 0,
    "message": "Valid Input",
    "data": {
        "bank_ref_no": "654645646540",
        "beneficiary_name": "Mr SOURAV GANGULY",
        "transaction_remark": "Transaction Successful",
        "verification_status": "VERIFIED"
    }
}
*/

// ---------------------- End : View Balance ----------------------------------------------

