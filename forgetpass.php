<?php

error_reporting(0);


include 'config.php';

session_start();

 $email="";
if(isset($_POST['submit'])){
   $email=mysqli_real_escape_string($con,$_POST['email']);
   $email_check=mysqli_query($con,"SELECT * FROM `register` WHERE email='$email'");
   if(mysqli_num_rows($email_check) > 0){
     
      $code=rand(99999,11111);
      $update=mysqli_query($con,"UPDATE `register` SET code=$code WHERE email='$email'");
      if($update){
         $subject = "Password Reset Code";
         $message = "Your password reset code is $code";
         $sender = "From: sakibbangla49@gmail.com";
         if(mail($email, $subject, $message, $sender)){
             $info = "We've sent a passwrod reset otp to your email - $email";
             $_SESSION['info'] = $info;
             $_SESSION['email'] = $email;
             header('location: resetotp.php');
      }else{
         $msg[]="Failed while sending code!";
      }
   }else{
      $msg[]="Something went wrong!";
   }
}else{
   $msg[]="This email address does not exist!";
}
}

?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="forgetpass.css">
</head>

<body>

<div class="form-container">

   <form action="" method="post" autocomplete="off">
      <h3>forget password</h3>
      <?php
      if(isset($msg)){
         foreach($msg as $msg){
            echo '<span  class="error-msg">'.$msg.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="Enter your email" value="<?php echo $email ?>">
      
      <input type="submit" name="submit" value="continue" class="form-btn">
      <button class="form-btn"><a href="login_form.php">back</a></button>
     
   </form>

</div>
    
</body>
</html>