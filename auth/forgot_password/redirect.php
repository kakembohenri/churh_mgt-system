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

        // Check password reset table

        $reset_query = mysqli_query($conn, "select * from password_reset where email='$email' and reset_code='$code'") or die('Error: '. mysqli_error($conn));
        
$count = mysqli_num_rows($reset_query);

if($count > 0){
    // Remove email and reset code from table
    mysqli_query($conn, "delete from password_reset where email='$email' and reset_code='$code'") or die('Error: '. mysqli_error($conn));

    $_SESSION['email'] = $email;
    $_SESSION['code'] = $code;
    header('location:reset_password.php');
}else{
    echo 'User not found';
}

    }


}
