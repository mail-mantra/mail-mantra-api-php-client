<?php
include_once __DIR__ . '/../vendor/autoload.php';

$mmSmtp = new MailMantra\Smtp($api_key);

// $mmSmtp = new MailMantra\Smtp();
// $mmSmtp->setAuthKey($api_key);

// ---------------------- Start : View Balance ----------------------------------------------

$attachments = [
    [
        'content_type' => "text/plain",
        'file_name' => "test.txt",
        'base_64_content' => "VGhpcyBpcyB5b3VyIGF0dGFjaGVkIGZpbGUhISEK"
    ]
];

$result_arr = $mmSmtp->mail($to, $subject, $body, $attachments);
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

