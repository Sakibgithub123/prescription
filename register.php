
<?php
error_reporting(0);
include 'config.php';

if(isset($_POST['submit'])){
    $name=mysqli_real_escape_string($con,$_POST['name']);
    $descrive=mysqli_real_escape_string($con,$_POST['descrive']);
    $designation=mysqli_real_escape_string($con,$_POST['designation']);
    $work=mysqli_real_escape_string($con,$_POST['work']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $image=$_FILES['image']['name'];
    $tmp_name=$_FILES['image']['tmp_name'];
    $imagefolder='upload/'.$image;
    $imagesize=$_FILES['image']['size'];
    $password=mysqli_real_escape_string($con,$_POST['password']);
    
    $cpass=mysqli_real_escape_string($con,$_POST['cpass']);

    $email_check="SELECT * FROM register where email='$email' && password='$password'";
    $email_query=mysqli_query($con,$email_check);
    if(mysqli_num_rows($email_query) >0){
        $message[]= "email already exit";
    }else{
        if($imagesize>2000000){
            $message[]= "image is too large only accept jpg, jpeg and png";

        }else{
            if($password != $cpass){
                $message[]= "password doesn't match";
            }else{
                $query="INSERT INTO register (name,descrive,designation,work,email,password,cpass,image) values('$name','$descrive','$designation','$work','$email','$password','$cpass','$image')";
    
                $insert=mysqli_query($con,$query);
            
                if($insert){
                    move_uploaded_file($tmp_name,$imagefolder);
                    $message[]="register successfully";
                }else{
                    $message[]="send failed";
            
                }
    
            }
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
    <link rel="stylesheet" href="register.css">
    <title>Document</title>
</head>
<body>

    <div class="form">
        <div class="form_content">
        <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
            <h1>Register now!</h1>
            <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<span class="error-msg">'.$message.'</span>';
         };
      };
      ?>
            <input type="text" name="name" placeholder="Enter your name" required>
            <textarea name="descrive" id="" cols="10" rows="5" placeholder="Descrive yourself" required></textarea>
            <input type="text" name="designation" placeholder="Your designation" required> 
            <input type="text" name="work" placeholder="where are you works ?" required>
            
         
             <input type="file" name="image" accept="image/jpg, image/jpeg, image/png">
            <input type="email" name="email" placeholder="Email" required onfocus="this.value=''">

            <input type="password" name="password" placeholder="Password" onfocus="this.value=''"   required> 

            <input type="password" name="cpass" placeholder="Confirm password" required> 

            <input type="submit" class="btn" name="submit" value="Submit"><br>
            <button><a href="login_form.php">login now</a></button>

            
            
            

        </form>
        

      
        


        </div>
       
    </div>
    
</body>
</html>