   <div class="row-fluid">
     <!-- block -->
     <div class="block">
       <div class="navbar navbar-inner block-header">
         <div class="muted pull-left"><i class="icon-plus-sign icon-large"> Add System User</i></div>
       </div>
       <div class="block-content collapse in">
         <div class="span12">
           <form method="post">
             <div class="control-group">
               <div class="controls">
                 <input class="input focused" style='padding: 1rem;' name="email" id="focusedInput" type="text" placeholder="Email" required>
               </div>
             </div>
             <div class="control-group">
               <p>
               <div class="controls">
                 <label for="role">
                   Role:
                 </label>
                 <p>
                   <select class="input focused" name="role" id="focusedInput" required="required" type="text">
                     <option value="">Select Role</option>
                     <option value="admin">Admin</option>
                     <option value='data_entrant'>Data Entrant</option>
                     <option value='finance'>Finance</option>
                   </select>
                 </p>
               </div>
             </div>
             </p>

             <div class="control-group">
               <div class="controls">
                 <button name="save" style='text-decoration: none; border: none; padding: 0.4rem; background: 
#8ef3c5; color: #fff; border-radius: 0.4rem;' id="Send" data-placement="right" title="Click to Save"><i class="icon-plus-sign icon-large">Send code</i></button>
                 <script type="text/javascript">
                   $(document).ready(function() {
                     $('#save').tooltip('show');
                     $('#save').tooltip('hide');
                   });
                 </script>
               </div>
             </div>
           </form>
         </div>
       </div>
     </div>
     <!-- /block -->
   </div>

   <?php


   require('dbconn.php');

    use PHPMailer\PHPMailer\PHPMailer;

    require('../vendor/autoload.php');


    $code = rand(100000, 999999);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $role = $_POST['role'];
      $email = $_POST['email'];
      $_SESSION['error'] = '';
      $church_id = $_SESSION['church_admin'];
      
      $query = mysqli_query($conn, "select * from church_staff where email = '$email'") or die(mysqli_error($conn));
      $count = mysqli_num_rows($query);

      if ($count > 0) {
        $_SESSION['error'] = 'This email address already exists';
      } else {

        mysqli_query($conn, "insert into users (username, password) values('$email','')") or die(mysqli_error($conn));

        $query =  mysqli_query($conn, "select * from users where username='$email'") or die(mysqli_error($conn));
        $user = mysqli_fetch_array($query);
        $user_id = $user['id'];

        $activity = 'Added a new member';
        mysqli_query($conn, "insert into activity_log(username, church_id, action) values('$username', '$id', '$activity')") or die (mysqli_error($conn));

        try {
          $mail = new PHPMailer();

          // specify SMTP credentials
          $mail->isSMTP();
          $mail->Host = 'smtp.gmail.com';
          $mail->SMTPAuth = true;
          $mail->Username = 'familytree733@gmail.com';
          $mail->Password = 'tvqfbuqptaxygmou';
          $mail->SMTPSecure = 'ssl';
          $mail->Port = 465;

          $mail->setFrom('familytree733@gmail.com', 'Church sys Website');
          $mail->addAddress($email);
          $mail->Subject = 'Invitation to join Product name';

          // Enable HTML if needed
          $mail->isHTML(true);
          $mail->Body = '<div style="display: flex; flex-direction: column; justify-content: center"><h3 style="font-family: tahoma, sans-serif; color: #454545">Welcome to product </h3><p style="font-family: tahoma, sans-serif;">Click the button below to create your new profile</p><a style="text-decoration: none; font-family: tahoma, sans-serif; width: fit-content; color: #454545; background: #ff652f; padding: 0.8rem; cursor: pointer; border-radius: 0.4rem;" target="_blank" href="http://localhost/church_mgt/admin/redirect.php?email='.$email.'&code='.$code.'&user_id='.$user_id.'&church_id='.$church_id.'&role='.$role.'"'.'>Create your profile</a></div>';

          if ($mail->send()) {

         // Insert into email verification table
         mysqli_query($conn, "insert into email_verification(email, verification_code) values('$email','$code')") or die($_SESSION['error'] = mysqli_error($conn));

         $activity = "Add system user ". $email;
         mysqli_query($conn, "insert into activity_log(username, church_id, action) values('$username', '$id', '$activity')") or die (mysqli_error($conn));

            $_SESSION['success'] = "Link has been sent";
          } else {
            $_SERVER['error'] = "Something went wrong";
          }
        } catch (Exception $e) {
          $_SESSION['error'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }


       

      }
    }
    ?>