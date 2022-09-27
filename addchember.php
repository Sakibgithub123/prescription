<?php


include 'config.php';
session_start();
$id=$_SESSION['uid'];

if(!isset($_SESSION['email'])){
    header('location:login_form.php');

}

if(isset($_POST['submit'])){
    $chember_name=$_POST['chember_name'];
    $location=$_POST['location'];
    
    $phn=$_POST['phn'];
    $location_details=$_POST['location_details'];
    $day=$_POST['day'];
    $time=$_POST['time'];

    $insert= "INSERT INTO `addchember`(chember_name,aid,location,phn,location_details,day,time)
     values('$chember_name',(SELECT id FROM register where id='$id'),'$location','$phn','$location_details','$day','$time')";

    $query=mysqli_query($con,$insert);
    if($query){
        $erro= "chember added";
        header('location:home.php');
    }else{
        $erro= "adding chember failed";
    }
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




    <div class="form">
        <form action="" method="POST">
            <h1>add chember</h1>

            <?php
      if(isset($erro)){
         foreach($error as $erro){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
            <input type="text" name="chember_name" placeholder="chember name">
            <input type="text" name="location" placeholder="chember location">
            
            <input type="text" name="phn" placeholder="add phn no"> <br>
            <textarea name="location_details" id="" cols="10" rows="5" placeholder="location details"></textarea>
            <input type="text" list="day" name="day" placeholder="when you seat?"> <br>
            <datalist  id="day">
                <option value="select day" disabled>when you seat</option>
                <option value="sat">sat</option>
                <option value="sunt">sun</option>
                <option value="mon">mon</option>
                <option value="tue">tue</option>
                <option value="wed">wed</option>
                <option value="thu">thu</option>
                <option value="fri">fri</option>
                <option value="sat, sun">sat,sun</option>
                <option value="sat, mon">sat,mon</option>
                <option value="sat, tue">sat,tue</option>
                <option value="sat, wed">sat,wed</option>
                <option value="sat, thu">sat,thu</option>
                <option value="sat, fri">sat,fri</option>
                <option value="sat, mon, tue">sat,mon,tue</option>
                <option value="sat, mon, wed">sat,mon,wed</option>
                <option value="sat, mon, thu">sat,mon,thu</option>
                <option value="sat, mon, fri">sat,mon,fri</option>
            </datalist>

            <input type="text" name="time" placeholder="example(4pm to 8pm) add time">

            <button class="btn" name="submit">submit</button>
            
        </form>
    </div>


    <?php
    include 'fotter.php';

    ?>
    
</body>
</html>