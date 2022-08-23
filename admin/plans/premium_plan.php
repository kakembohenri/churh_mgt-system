<?php
    if($sub['plan'] == 'premium'){
       return true;
    }elseif($sub['plan'] == 'free'){
        return true;
    }else{
         
       $_SESSION['upgrade'] = 'Upgrade your subscription plan!';
       header('location: dashboard.php');
    }
?>