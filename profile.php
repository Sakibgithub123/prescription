<?php

error_reporting(0);


include 'config.php';

session_start();
$id=$_SESSION['uid'];

if(!isset($_SESSION['name']) && !isset($_SESSION['name']) && !isset($_SESSION['descrive']) && !isset($_SESSION['designation']) && !isset($_SESSION['work'])){
    header('location:login_form.php');
}








?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile.css">
    <title>Document</title>
</head>
<body>

<?php
include 'header.php';

?>

<div class="container">
    <div class="content">
        <h1>profile</h1>
        <?php
   

//     if($_SESSION['image']==""){
//         echo '<img src="avater.png" alt="">';
//     }else{
//         echo '<img src="upload/'.$_SESSION['image'].'" alt="">';

//     }


// ?>

<?php
    $select=mysqli_query($con, "SELECT * FROM `register` where id=$id");
    if(mysqli_num_rows($select)>0){
        $row=mysqli_fetch_assoc($select);
    }

    if($row['image']==""){
        echo '<img src="avater.png" alt="">';
    }else{
        echo '<img src="upload/'.$row['image'].'" alt="">';

    }


?>
    <h1><?php echo $_SESSION['name'] ?></h1>
    <h2><?php echo $_SESSION['descrive'] ?></h2>
    <h2><?php echo $_SESSION['designation'] ?></h2>
    <h2><?php echo $_SESSION['work'] ?></h2>

    
    <button><a href="updateprofile.php">update profile</a></button>


    </div>
   
</div>


<?php
    include 'fotter.php';

    ?>
    
</body>
</html>