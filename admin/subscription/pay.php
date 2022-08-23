<?php
$username = $_POST['username'];
$amount = $_POST['amount'];
$plan = $_POST['plan'];
$id = $_POST['id'];

// Prepare rave request

$request = [
    'tx_ref' => time(),
    'amount' => $amount,
    'currency' => 'UGX',
    'payment_options' => 'mobile_money',
    'redirect_url' => 'http://localhost/church_mgt/admin/subscription/process.php',
    'customer' => [
        'email' => 'imaxtech@gmail.com',
        'name' => $username,
        
    ],
    'meta' => [
        'price' => $amount
    ],
    'customizations' => [
        'title' => 'Paying for '.$plan.' plan',
        'description' => 'sample'
    ]
];

// Call flutterwave end point

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.flutterwave.com/v3/payments',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => json_encode($request),
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer FLWSECK_TEST-c1bd2ff67fc0a33e62a3c7fbfdc42ce7-X',
        'Content-Type: application/json'
    ),
));

$response = curl_exec($curl);
echo '<pre>';
echo $response;
echo '</pre>';

$res = json_decode($response);
if ($res->status == 'success') {
    $link = $res->data->link;
    header('location: ' . $link);
} else {
    echo "Failed to reach server";
}
