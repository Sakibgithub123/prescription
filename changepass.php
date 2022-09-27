<?php

error_reporting(0);

include 'config.php';
session_start();



$email = $_SESSION['email'];
if($email == false){
  header('Location: login-user.php');
}




if(isset($_POST['submit'])){
   $_SESSION['info'] = "";
   $password = mysqli_real_escape_string($con, $_POST['password']);
   $cpass = mysqli_real_escape_string($con, $_POST['cpass']);
   if($password !== $cpass){
       $msg[] = "Confirm password not matched!";
   }else{
       $code = 0;
       $email = $_SESSION['email']; //getting this email using session
       
       $update_pass = "UPDATE `register` SET code = $code, password = '$password' WHERE email = '$email'";
       $run_query = mysqli_query($con, $update_pass);
       if($run_query){
           $info = "Your password changed. Now you can login with your new password.";
           $_SESSION['info'] = $info;
           header('Location: newlog.php');
       }else{
           $msg[] = "Failed to change your password!";
       }
   }
}




?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="changepass.css">
    <title>Document</title>
</head>
<body>

<div class="form-container">

   <form action="" method="post" autocomplete="off">
      <h3>change password</h3>

      <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div style="text-align:center ;">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>


      <?php
      if(isset($msg)){
         foreach($msg as $msg){
            echo '<span  class="error-msg">'.$msg.'</span>';
         };
      };
      ?>
      <input type="password" name="password" required placeholder="Enter new password">
      <input type="password" name="cpass" required placeholder="confirm password">
      <input type="submit" name="submit" value="change" class="form-btn">
     
   </form>

</div>
    
</body>
</html>