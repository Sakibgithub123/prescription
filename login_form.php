<?php

include 'config.php';
error_reporting(0);

 session_start();



if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $password =$_POST['password'];
   // $cpass = md5($_POST['cpassword']);
   // $user_type = $_POST['user_type'];

   $select ="SELECT * FROM register WHERE email = '$email' && password= '$password'";

   $result = mysqli_query($con, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if(Is_array($row)){

         $_SESSION['uid'] = $row['id'];

         $_SESSION['image'] = $row['image'];
         $_SESSION['email'] = $row['email'];
          $_SESSION['name'] = $row['name'];
          $_SESSION['descrive'] = $row['descrive'];
          $_SESSION['designation'] = $row['designation'];
          $_SESSION['work'] = $row['work'];
         
         header('location:home.php');
      }
   }else{
      $error[]="incorrect email or password";
   }
   
   
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="log.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post" autocomplete="off">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="Enter your email" onfocus="this.value=''">
      <input type="password" name="password" required placeholder="Enter your password" value="" id="password" onfocus="this.value=''">
   
      <input type="submit" name="submit" value="Login now" class="form-btn">
      <p>don't have an account? <a href="register.php">register now</a></p>
      <p><a href="forgetpass.php">forget password?</a></p>
   </form>

</div>



</body>
</html>