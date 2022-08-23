<?php 
    if($sub['end_date'] < date("Y-m-d")){
       header('location: dashboard.php');
       $_SESSION['expiry'] = 'Your Subscription has expired';
    }
    
    ?>