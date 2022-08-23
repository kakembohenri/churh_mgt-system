<?php
$username="Ianchris";
$password="sister856";
$sender="+256772027934";//the person sending.
$number='+256709518661';//the person recieving the message.
$message="thank you for paying with LFRDA, sam the sms code is working from bengo Ianchris";

function SendSMS($username, $password, $sender, $number, $message)
{

    $url = "www.egosms.co/api/v1/plain/?";

    $parameters = " number=[number]&message=[message]&username=[username]&password=[password]&sender=[sender]";
    $parameters = str_replace("[message]", urlencode($message) , $parameters);
    $parameters = str_replace("[sender]", urlencode($sender) , $parameters);
    $parameters = str_replace("[number]", urlencode($number) , $parameters);
    $parameters = str_replace("[username]", urlencode($username) , $parameters);
    $parameters = str_replace("[password]", urlencode($password) , $parameters);
    $live_url = "https://" . $url . $parameters;
    $parse_url = file($live_url);
    $response = $parse_url[0];
    return $response;
}
// $username = "Egosmstest";
// $password = "egotest";
// $sender = "Egosms";
// $number = "+256788200915";
// $message = "My First Message through Egosms";
//echo SendSMS($username, $password, $sender, $number, $message);
?>