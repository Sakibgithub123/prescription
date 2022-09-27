<?php
error_reporting(0);
include 'config.php';
session_start();
$email = $_SESSION['email'];
if($email == false){
  header('Location: login_form.php');
}



if(isset($_POST['submit'])){
   $_SESSION['info'] = "";
   $otp = mysqli_real_escape_string($con, $_POST['otp']);
   $check_code =mysqli_query ($con,"SELECT * FROM register WHERE code = $otp");
   
   if(mysqli_num_rows($check_code) > 0){
       $row = mysqli_fetch_assoc($check_code);
       $email = $row['email'];
       $_SESSION['email'] = $email;
       $info = "Please create a new password that you don't use on any other site.";
       $_SESSION['info'] = $info;
       header('location: changepass.php');
       exit();
   }else{
       $msg[] = "You've entered incorrect code!";
   }
}



?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resetotp.css">
    <title>Document</title>
</head>
<body>

<div class="form-container">

   <form action="" method="post" autocomplete="off">
      <h3>your otp verification</h3>

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
      <input type="text" name="otp" required placeholder="Enter your otp code" required>
     
      <input type="submit" name="submit" value="submit" class="form-btn">
      
   </form>

</div>
    
</body>
</html>