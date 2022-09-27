
<?php

$con=mysqli_connect("localhost","root","","hospital");
session_start();

if(isset($_POST['send'])){
    $name=$_POST['name'];
    $age=$_POST['age'];
    $complaints=$_POST['complaints'];
    $onexam=$_POST['onexam'];
    $investigation=$_POST['investigation'];
    $diagnose=$_POST['diagnose'];


    $select="SELECT * FROM `patient` where name='$name' age='$age' complaints='$complaints'";
$select_query=mysqli_query($con,$select);

$row = mysqli_fetch_array($select_query);

if(Is_array($row)){

    $_SESSION['name'] = $row['name'];
    $_SESSION['age'] = $row['age'];
    $_SESSION['complaints'] = $row['complaints'];
    $_SESSION['investigation'] = $row['investigation'];
    $_SESSION['diagnose'] = $row['diagnose'];
    
   
  // header('location:patient.php');
}


    

    $quer="INSERT INTO `patient` (name,age,complaints,onexam,investigation,diagnose) values('$name','$age','$complaints','$onexam','$investigation','$diagnose')";

    $insert=mysqli_query($con,$quer);

    if($insert){
        header('location:prescription.php');
    }else{
        echo"send failed";

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
        <form action="" method="POST">
            <h1>patient info</h1>
            <input type="text" name="name" placeholder="patient name">
            <input type="text" name="age" placeholder="age">
            <input type="text" name="designation" placeholder="date"> <br>
            
            
            <label for="">cheif complaints:</label>
            <select name="complaints" id="">
                
                <option value="sat">acne</option>
                <option value="sun">acne valgaries</option>
                <option value="tue">escabix</option>
                <option value="wed">vitiliga</option>
            </select>

            
            <label for="">on examination:</label>
            <select name="onexam" id="">
                
                <option value="bp">bp</option>
                <option value="cp">cp</option>
                <option value="kp">kp</option>
                <option value="lp">lp</option>
            </select>
            <label for="">investigation:</label>
            <select name="investigation" id="">
                
                <option value="cbct">cbc</option>
                <option value="rbs">rbs</option>
                <option value="es">serum critinine</option>
                <option value="lp">lp</option>
            </select>


            <label for="">diagnose:</label>
            <select name="diagnose" id="">
                
                <option value="sat">kps</option>
                <option value="sun">nbs</option>
                <option value="tue">serum </option>
                <option value="wed">lp</option>
            </select>

    

            


<button name="send" value="<?php echo $row['id'] ; ?>">submit</button>
            

        </form>
        
    </div>
    
</body>
</html>