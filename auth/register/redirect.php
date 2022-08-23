<?php

session_start();
require('../../admin/dbconn.php');

$true = true;
function Validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    if(empty($_GET['code']) || empty($_GET['email']) ){
        echo 'Invalid request';
    }else{

        $code = Validate($_GET['code']);
        $email = Validate($_GET['email']);

        // Check verification table

        $verification_query = mysqli_query($conn, "select * from email_verification where email='$email' and verification_code='$code'") or die('Error: '. mysqli_error($conn));
$count = mysqli_num_rows($verification_query);

if($count > 0){
    // Remove email and verification code from table
    mysqli_query($conn, "delete from email_verification where email='$email' and verification_code='$code'") or die('Error: '. mysqli_error($conn));

    // update churches table
    $user_query = mysqli_query($conn, "select id from users where username='$email'") or die($_SESSION['error'] = mysqli_error($conn));
    $user = mysqli_fetch_array($user_query);
    $id = $user['id'];

    mysqli_query($conn, "update churches set isVerified='$true' where user_id='$id'") or die($_SESSION['error'] = mysqli_error($conn));

    $_SESSION['user_id'] = $id;
    $_SESSION['verified'] = 'Your email has been successfully verified';
    header('location:create_profile.php');
}else{
    echo 'User not found';
}

    }


}
