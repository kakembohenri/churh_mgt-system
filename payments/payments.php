<?php
require("Flutterwave-Rave-PHP-SDK/library/MobileMoney.php");

use Flutterwave\EventHandlers\EventHandlers\EventHandlers\EventHandlers\EventHandlers\MobileMoney;

// The data variable holds the payload
$data = array(
    "order_id" => "USS_URG_89245453s2323",
    "amount" => "1500",
    "type" => "mobile_money_uganda", // could be mobile_money_rwanda,mobile_money_uganda, mobile_money_zambia, mobile_money_ghana
    "currency" => "UGX",
    "email" => "ekene@flw.com",
    "phone_number" => "0712804062",
    "fullname" => "Changretta",
    "client_ip" => "154.123.220.1",
    "device_fingerprint" => "62wd23423rq324323qew1",
    "meta" => [
        "flightID" => "213213AS"
    ]
);


$payment = new MobileMoney();
$result = $payment->mobilemoney($data);
$id = $result['data']['id'];
$verify = $payment->verifyTransaction($id);
$print_r($result);
