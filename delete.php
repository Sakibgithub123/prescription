<?php
error_reporting(0);
include 'config.php';

$id=$_GET['idno'];


$delete="DELETE FROM `addchember` WHERE id='$id'";
$dlt=mysqli_query($con,$delete);

if($dlt){
    echo "<script>alert('are you sure?') </script>";
    header('location:home.php');
    
}


?>