<?php

session_start();
require('dbconn.php');

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

        $user_id = $_GET['user_id'];
        $church_id = $_GET['church_id'];
        $role = $_GET['role'];
        $code = Validate($_GET['code']);
        $email = Validate($_GET['email']);

       
        // Check verification table

        $verification_query = mysqli_query($conn, "select * from email_verification where email='$email' and verification_code='$code'") or die('Error: '. mysqli_error($conn));

$count = mysqli_num_rows($verification_query);


if($count > 0){
    
    // Check if user is already in church_staff table
    $query = mysqli_query($conn, "select * from church_staff where user_id='$user_id' and church_id='$church_id'") or die(mysqli_error($conn));
    $count = mysqli_num_rows($query);

    if($count > 0){
        $_SESSION['verified'] = 'Complete your profile creation';
    
        
    $_SESSION['user_email'] = $email;
    $_SESSION['code'] = $code;
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_church'] = $church_id;
    $_SESSION['role'] = $role;

    header('location: ../auth/register/create_profile_user.php');
        
    }else{

    // create user in church_staff table
    $user_query = mysqli_query($conn, "insert into church_staff(user_id, church_id, first_name, surname, phone_number, email, dob, residence, marital_status, role, avatar, occupation, isVerified) values('$user_id', '$church_id', '', '', '', '', '', '', '', '$role','', '', '$true')") or die(mysqli_error($conn));


    $_SESSION['user_email'] = $email;
    $_SESSION['code'] = $code;
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_church'] = $church_id;
    $_SESSION['role'] = $role;

    $_SESSION['verified'] = 'Your email has been successfully verified';
    header('location: ../auth/register/create_profile_user.php');
    }
}else{
    echo 'User not found';
}

    }


}
