<?php

if(class_exists('MailMantra', false)) {
    // Prevent error with preloading in PHP 7.4
    // @see https://github.com/googleapis/google-api-php-client/issues/1976
    return;
}

$classMap = [
    'MailMantra\\Sms' => 'MM_Sms',
    'MailMantra\\Kyc' => 'MM_Kyc',
    'MailMantra\\Smtp' => 'MM_Smtp',
//    'MailMantra\\Sms\\balance' => 'MM_Sms_Balance'
];


foreach ($classMap as $class => $alias) {
    class_alias($class, $alias);
}



/** @phpstan-ignore-next-line */
if (\false) {
//    class MM_Sms_Balance extends \MailMantra\Sms\balance
//    {
//    }
    class MM_Smtp extends \MailMantra\Smtp
    {
    }
    class MM_Kyc extends \MailMantra\Kyc
    {
    }
    class MM_Sms extends \MailMantra\Sms
    {
    }
}