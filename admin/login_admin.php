<?php
error_reporting(0);
include('dbconn.php');
?>
<?php
function check_url($user_sub_url){
    $url = $_SERVER["PHP_SELF"];
    $string = preg_replace("/\//","_",$url);
    $admin = $user_sub_url;
    $subject = $string; 
    $pattern = '/'.$admin.'/'; 
    preg_match($pattern, $subject, $matches, PREG_OFFSET_CAPTURE);
    if(count($matches)>0){
      return true;
    }else{
      return false;
    }
}
?>
<?php

if (isset($_POST['login'])){

$username=$_POST['username'];
$password=$_POST['password'];

$login_query=mysqli_query($conn,"select * from admin where username='$username' and password='$password' limit 1");
$count=mysqli_num_rows($login_query);
$row=mysqli_fetch_array($login_query);

if ($count > 0){
session_start();
$_SESSION['id']=$row['admin_id'];

$roleId = $row['roleId'];

if ($roleId=='1'||$roleId=='2') {
  header('location:dashboard.php');
}

if ($roleId=='3') {
  header('location:../data/dashboard.php');
}

if ($roleId=='4') {
  header('location:../giving/dashboard.php');
}

}else{
   header('location:index.php');
}
}
?>

<?php
//default label
$user_label = " Administrator";

$is_data_entrant = false;

$is_treasurer = false;

if(check_url("data")){
	$is_data_entrant = true;
	$user_label = " Data Entrant";

}elseif(check_url("giving")){
	$is_treasurer = true;
	$user_label = " Treasurer";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <title> JCC MISSIONS</title>
</head>
<body>
  <div class="login-wrapper">
    <form action="" class="form" method="post">
      <img src="../public/img/logo7.png" alt="">
      <h2><i class="icon-lock"></i><?php echo($user_label)  ?> Login</h2>
      <div class="input-group">
        <input type="text" name="username" id="loginUser" placeholder=" &nbsp;Enter User Name" required>
     
      </div>
      <div class="input-group">
        <input type="password" name="password" id="loginPassword" placeholder=" &nbsp;Enter Password" required>
       
      </div>
      <input type="submit" value="login" name="login" class="submit-btn">
     
    </form>

    <div id="forgot-pw">
      <form action="" class="form" method="post">
        <a href="#" class="close">&times;</a>
        <h2>Reset Password</h2>
        <div class="input-group">
          <input type="email" name="email" id="email" placeholder="Email" required>
          
        </div>
        <input type="submit" value="Submit" class="submit-btn">

        <script type="text/javascript">
        $(document).ready(function(){
        $('#signin').tooltip('show');
        $('#signin').tooltip('hide');
        });
        </script> 
      </form>
    </div>
  </div>
</body>
</html>

</br>
  <div class="error">
  
</div>