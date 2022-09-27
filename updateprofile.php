<?php

error_reporting(0);

include 'config.php';
session_start();
$uid=$_SESSION['uid'];


if(isset($_POST['submit'])){
    $uptname=$_POST['uptname'];
    $uptdescrive=$_POST['uptdescrive'];
    $uptdesignation=$_POST['uptdesignation'];
    $uptwork=$_POST['uptwork'];

    $update="UPDATE `register` SET name='$uptname', descrive='$uptdescrive' , designation='$uptdesignation', work='$uptwork' where id='$uid'";
    $uptquery=mysqli_query($con,$update);


    $image=$_FILES['image']['name'];
    $tmp_name=$_FILES['image']['tmp_name'];
    $imagefolder='upload/'.$image;
    $imagesize=$_FILES['image']['size'];

    if($imagesize>2000000){
        echo "image is too large only accept jpg, jpeg and png";

    }else{
        $update="UPDATE `register` SET image='$image' where id='$uid'";
            $uptquery=mysqli_query($con,$update);
            $message[]=" image update success";

    }

 


    $oldpass=$_POST['oldpass'];
    $prevpass=$_POST['prevpass'];
    $newpass=$_POST['newpass'];
    $cpass=$_POST['cpass'];

    if(!empty($prevpass) || !empty($newpas) || !empty($cpass)){
        if($prevpass !=$oldpass){
            $message[]="old password not matched";
        }elseif($newpass !=$cpass){
            $message[]="confirm password not matched";

        }else{
            $update="UPDATE `register` SET password='$newpas' where id='$uid'";
            $uptquery=mysqli_query($con,$update);
            $message[]=" password update success";

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
    <link rel="stylesheet" href="updateprofile.css">
    <title>Document</title>
</head>
<body>
<?php
include 'header.php';

?>
    

    <div class="form-container">

 

    <?php

    $select="SELECT * FROM register where id='$uid'";
    $query=mysqli_query($con,$select);
    if(mysqli_num_rows($query)>0){
        $row=mysqli_fetch_assoc($query);
    }


?>

   <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
      <h3>update profile</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<span class="error-msg">'.$message.'</span>';
         };
      };
      ?>
      <input type="text" name="uptname" value="<?php echo $row['name']  ?>"  placeholder="name">
            <input type="text" value="<?php echo $row['descrive']  ?>" name="uptdescrive"   placeholder="descrive">
            <input type="text" value="<?php echo $row['designation']  ?>" name="uptdesignation"  placeholder="designation">
            <input type="text" value="<?php echo $row['work']  ?>" name="uptwork"  placeholder="work">
            <input type="file" name="image" accept="image/jpg, image/jpeg, image/png">
           
            <input type="hidden" value="<?php echo $row['password']  ?>" name="oldpass"  placeholder="oldpass">
            <input type="password"  name="prevpass" placeholder="previous pass"onfocus="this.value=''">
            <input type="password"  name="newpass" placeholder="newpass"onfocus="this.value=''">
            <input type="password"  name="cpass"  placeholder="confirm pass">
            <input type="submit"  name="submit" value="update" class="form-btn">
            <button><a href="profile.php"  >back</a></button>
            
   </form>

</div>


<?php
    include 'fotter.php';

    ?>
    
</body>
</html>