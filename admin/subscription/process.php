<?php
include('../dbconn.php');

if (isset($_GET['status'])) {
    // Check payment status
    if ($_GET['status'] == 'cancelled') {
        header('location: ../dashboard.php');
    } elseif ($_GET['status'] == 'successful') {

        $txid = $_GET['transaction_id'];

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/{$txid}/verify",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer FLWSECK_TEST-c1bd2ff67fc0a33e62a3c7fbfdc42ce7-X',
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // echo $response;
        $res = json_decode($response);

        // $id = substr($res->data->customer->name, 0, 1);
        $id = substr($res->data->customer->name, 0, 1);
        // echo $id;
        if ($res->status) {
            $amountPaid = $res->data->charged_amount;
            $amountToPay = $res->data->meta->price;
            if ($amountPaid >= $amountToPay) {
                echo 'Payment Successful' . '<br>';
                // Update subscription table and insert into payments table

                $plan = '';
                if ($amountPaid == 30000) {
                    $plan = 'basic';
                    echo $plan;
                } elseif ($amountPaid == 40000) {
                    $plan = 'standard';
                    echo $plan;
                } elseif ($amountPaid == 50000) {
                    $plan = 'premium';
                    echo $plan;
                } else {
                    $plan = '';
                    echo $plan;
                }

                if ($plan != '') {
                    $datetime = new DateTime();
                    $today = $datetime->format('Y-m-d H:i:s');

                    // Insert into payments table
                    $query = "INSERT INTO sub_payments (user_id, plan, amount, created_at) VALUES ('$id', '$plan', '$amountPaid', '$today')";

                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

                    if ($result != null) {
                       

                    $datetime = new DateTime();
                    $datetime->modify('+30 days');
                    $end_date = $datetime->format('Y-m-d H:i:s');
                    //echo $end_date;
                    // Insert into subscription table
                    $query = "INSERT INTO subscription (user_id, plan, start_date, end_date, timestamp) VALUES ('$id', '$plan', '$today', '$end_date', '$today')";

                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

                    if ($result != null) {
                        
                        $_SESSION['success'] = 'You have upgraded your account';
    
                        header('location: ../dashboard.php');
                    }
                }
                }
            } else {
                echo 'Payment failed. Fraudulent transaction detected';
            }
        }
    }
}
