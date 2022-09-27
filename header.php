<?php
error_reporting(0);


include 'config.php';

//session_start();
$id=$_SESSION['uid'];

// if(!isset($_SESSION['name'])){
//     header('location:login_form.php');

// }



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="header.css">
    <title>Document</title>
</head>
<body>

<div class="header">
<div class="item">
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
        <div class="logo">
            
            <h1> <span id="welcome">welcome</span>  <span id="span"> <?php echo $_SESSION['name'] ?></span></h1>
        </div>
            
                <nav>
                    <ul>
                    <li><a href="home.php">home</a></li>
                        <li><a href="profile.php">profile</a></li>
                        <li><a href="addchember.php">add chember</a></li>
                        <li><a href="logout.php">logout</a></li>
                        
                    </ul>
                </nav>

                </div>
</div>
    
</body>
</html>