
<?php
error_reporting(0);

session_start();
include 'config.php';

if($_SESSION['info'] == false){
   header('Location: login_form.php');  
}

if(isset($_POST['submit'])){
   header('Location: login_form.php');
}



?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="newlog.css">
    <title>Document</title>
</head>
<body>

<div class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      
      <?php 
      if(isset($_SESSION['info'])){
          ?>
          <div style="text-align:center ;">
          <?php echo $_SESSION['info']; ?>
          </div>
          <?php
      }
      ?>
      
      <input type="submit" name="submit" value="Login now" class="form-btn">
      
   </form>

</div>
    
</body>
</html>