<?php
$contact = "0753273361";
$contact = substr_replace($contact,"+256",0,1);




function send_sms($number, $title,$content){
    $username="Ianchris";
    $password="sister856";
    $sender="+256772027934";//the person sending.
    //$number='+256709518661';//the person recieving the message.
    
    $contact = $number;

    $contact = substr_replace($contact,"+256",0,1);
    $number="$contact";//the person recieving the message.

    $message = "$title\n $content";

    print_r($number);

    $token_status = SendSMS($username, $password, $sender, $number, $message);
    print_r($token_status);
}


//send_sms("0753273361","1234");
