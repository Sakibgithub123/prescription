<?php

error_reporting(0);
include 'config.php';

session_start();
$id=$_SESSION['uid'];

if(!isset($_SESSION['email'])){
    header('location:login_form.php');

}



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>Document</title>
</head>
<body>

<?php
        include 'header.php';

        ?>

<div class="home">
       


            <div class="chemberitem">

   <?php
$select=mysqli_query($con,"SELECT * FROM addchember where aid=$id");
while($row=mysqli_fetch_assoc($select)){


?>

            <div class="chember">

                  <h1><?php echo $row['chember_name'];   ?></h1>
                   <h3><?php echo $row['location'];   ?></h3>
                   <p><?php echo $row['location_details']; ?>
                   <p><?php echo $row['day']; ?> (<?php echo $row['time']; ?>)
                    <p>mobile: <span><?php echo $row['phn'] ;?></span>
           </p>
                </p>
                <button><a href="prescription.php?idno=<?php echo $row['id'];?>">prescription</a></button>
                   <button><a href="delete.php?idno=<?php echo $row['id'];?>" onclick="return confirm('Are you sure to confirm delete?')">delete</a></button>
                   

               



                   </div>
                <?php
                    
                }
                   ?>

                   
</div>
 </div>

    <?php
    include 'fotter.php';

    ?>
   
    
</body>
</html>