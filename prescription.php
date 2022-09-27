
<?php

error_reporting(0);
session_start();

include 'config.php';



$id=$_GET['idno'];

$select="SELECT * FROM `addchember` WHERE id='$id'";
$query=mysqli_query($con,$select);
$row=mysqli_fetch_assoc($query);

 
if(!isset($_SESSION['name']) && !isset($_SESSION['descrive']) && !isset($_SESSION['designation']) && !isset($_SESSION['work'])){
    header('location:login_form.php');
 }

//  if(!isset($_SESSION['name']) && !isset($_SESSION['age']) && !isset($_SESSION['complaints']) &&
//   !isset($_SESSION['onexam']) && !isset($_SESSION['investigation']) && !isset($_SESSION['diagnose'])){
//     header('location:login_form.php');
//  }
 

// session_start();
// if(isset($_POST['add'])){
//     $complaints=$_POST['complaints'];
//     $insert="INSERT INTO `patient` (complaints) values('$complaints')";
//     $insertq=mysqli_query($con,$insert);
//     if($insertq){
//         echo "success";
//     }
// }






?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pre.css">
    <link rel="stylesheet" href="css/all.min.css"  />
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Document</title>
</head>
<body>
    <div class="container">
        <a href="home.php"><i class="fa-solid fa-arrow-left"></i></a>

        <div class="content">

 


            <div class="card1">


                <h1><?php echo $_SESSION['name']; ?> </h1>
                <p><?php echo $_SESSION['descrive']; ?></p>
                <h2><?php echo $_SESSION['designation']; ?></h2>
                <p><?php echo $_SESSION['work']; ?></p>

   


            </div>
  
            <div class="card2">
                <h1>time</h1>
                <p><?php echo $row['day'];  ?></p>
                
                <p><?php echo $row['time'];  ?></p>
            </div>
            <div class="card3">
                <h1><?php echo $row['chember_name'] ;?></h1>
                <h2><?php echo $row['location'] ;?></h2>
                <p><?php echo $row['location_details']; ?>
                    <p>mobile: <span><?php echo $row['phn'] ;?></span>
           </p>
                </p>
                
            </div>



        </div>
       



        <!--patient name-->
        

      
      


       <div class="patient">

        <div class="about-patient">
            <h3>patient  name: <input class="name" type="text"></h3>
        </div>
        <div class="about-patient">
            <h3>age: <input class="age" type="text"></h3>
        </div>
        <div class="about-patient">
            <h3>date: <span id="time"></span></h3>
        </div>


       </div>

       <!--patient complaints-->

       <!-- <?php

//        $id=$_GET['id'];

// $select= "SELECT *FROM patient where id=$id";
//  $query=mysqli_query($con,$select);

//  $row=mysqli_fetch_assoc($query)

 ?> -->


<div class="patient-info">


<div class="complain-list">

<div class="complain">
   

    <h3>chief complaints</h3>
    <form  method="POST" autocomplete="on">
    <input list="browsers" class="browsers" id="input" name="complaints"  onfocus="this.value=''" autocomplete="name"  >
    
    


    <ul id="ul">
        
        
        </ul>
        <input type="submit"  class="btn" name="add" value="save">
        </form>
    <button id="add"  class="btn">add</button>

<!-- <?php
$select="SELECT complaints FROM `patient` ";
$query=mysqli_query($con,$select);
$row=mysqli_fetch_assoc($query);



?> -->
   
   
    
    <datalist id="browsers">
    <option value="Acne">
    <option value="Acne Valgaries">
    <option value="Escabix">
          <option  value="Fever" >
          <option value="Dengue">
          <option value="Diabetes">
          <option value="Malaria" >
          <option value="Maigrain" >
          <option value="Vitiliga">
        </datalist> 
        
   </div>
   

   <div class="complain">
    <h3>on examination</h3>
    <input list="examination" class="browsers" id="input1" name="inputbtn" onfocus="this.value=''"  > <input type="submit" id="add1" class="btn" name="inputbtn" value="add">


    <ul id="ul1">
        
        
    </ul>


        <datalist id="examination">
         <option value="BP">
          <!-- <option value="dengue">
          <option value="diabetes">
          <option value="malaria">
          <option value="maigrain"> -->
        </datalist>

   </div>
   <div class="complain">
    <h3>investigation</h3>
    <input list="investigation" class="browsers"  id="input2" name="inputbtn" onfocus="this.value=''" autocomplete="on" >  <input type="submit" id="add2" class="btn" name="inputbtn" value="add">

    <ul id="ul2">
        
        
        </ul>

        <datalist id="investigation">
          <option value="CBS">
          <option value="RBS">
          <option value="Serum Creatinine">
          <!-- <option value="malaria">
          <option value="maigrain"> -->
            
        </datalist>
   </div>

   <div class="complain">
    <h3>next appoinment</h3>
    <input list="diagnosis" class="browsers" id="input3" name="inputbtn" onfocus="this.value=''" ><input type="submit" id="add3" class="btn" name="inputbtn" value="add">

    <ul id="ul3">
        
        
        </ul>
        
</div>

<button onclick="window.print()" class="btn" id="prinn">print</button>




</div>


<br><br><br>


<div class="flex">

<span class="rx" >rx</span>

<div class="medicine_group">
    <form action="">
<input class="medicine_input" type="text" list="medicine" id="medi" name="inputbtn" onfocus="this.value=''" >

   <input class="medicine_input" type="text" list="when" id="medi2" name="inputbtn" onfocus="this.value=''" >
   
   <input class="medicine_input" type="text" list="food" id="medi3" name="inputbtn" onfocus="this.value=''" >
   <input class="medicine_input" type="text"  id="medi4" name="inputbtn">

   <input type="submit"  class="btn"  value="save medicine"  >


   </form>


   <input type="submit" id="medicinebtn" class="btn" name="inputbtn" value="add medicine"  >
   
   

</div>

<div class="table">
    <table>
        <tbody id="tbody">

        </tbody>
    </table>
</div>
      


<datalist id="when">
          <option value="1+0+0">
           <option value="0+1+0">
          <option value="10+0+1">
          <option value="1+0+1">           
          <option value="1+1+0">
          <option value="0+1+1">
          <option value="1+1+1">
        </datalist>


        <datalist id="food">
          <option value="খাবারের আগে">
           <option value="খাবারের পরে">
          <!-- <option value="diabetes">
          <option value="malaria">
          <option value="maigrain"> -->
        </datalist>

        <datalist id="medicine">
          <option value="tab. azimex 500mg">
           <option value="tab. azin 500mg">
          <option value="tab. azicin 500mg">
          <option value="tab.zibec 500mg">           
          <option value="cap. doxicap 100mg">
          <option value="tab. giane 35">
          <option value="cap. primacap 500mg">
          <option value="tab. tridosil 500mg">
           <option value="tab. romycine 500mg">
          <option value="tab. azicin 500mg">
          <option value="tab. zithrin 500mg">           
          <option value="tab .zimex 500mg">
          <option value="tab. azithrocin 500mg">
          <option value="tab. az 500mg">
          <option value="cap eprim 500mg">
           <option value="cap primavera 500mg">
          <option value="tab. methox 2.5mg">
          <option value="tab. methotrax 2.5mg">           
          <option value="tab. folita 5mg">
          <option value="cap soritac 10mg">
          <option value="cap soritac 25mg">
          <option value="tab. xalcort 6mg">
          <option value="tab. deflacort 6mg">
        </datalist>





   
</div>


     
 




    </div>

  
       
<!--rules-->
<p style="page-break-before:avoid;"></p>
<div class="rules">
<dl>
       <dt>উপদেশঃ</dt>
       <dd>* কানে তুলা দিয়ে গোসল করবেন / করাবেন।</dd>
       <dd>* কটন বার দিয়ে দৈনিক ৩বার কান / নাক পরিস্কার করবেন।</dd>
       <dd>* অপরিস্কার কোন জিনিস দিয়ে কান চুল্কাবেন না।</dd>
       <br>
         
       <dt>নিষেধঃ</dt>
       <dd>* খাদ্যঃ গরুর মাংস, ডিম, চিংড়ি মাছ, ইলিশ মাছ, বেগুন, কচু, হাসের মাংস, পুঁই শাক, আনারস।</dd>
       <dd>* কাপড়ঃ টেট্রন,পলেস্টার, উলেন, লিলেন ও সিল্কের কাপড়। পারফিউম কাপড় কাঁচা সাবান। </dd>
       <dd>* ঔষধঃ কোট্রইমক্সাজল, ডিসপিরিন, ইনডোমেথাসিন, ডক্সিসাইক্লিন, সিপ্রোফক্সাসিন, ডাইক্লোফেনাক, সোডিয়াম, <br> ইটোরিকক্সিব, ন্যাপ্রোক্সেম সোডিয়াম, টেট্রসাইক্লিন, আইবুপ্রফেন জাতীয় ঔষধ খাবেন না।</dd>
       </dl>
       <p>রেজিস্ট্রার ডাক্তারের পরামর্শ অনুযায়ী ঔষধ খাবেন।</p>

       <p class="f" style="margin: 0 auto; text-align:center; opacity:5;">https://www.ositsltd.com/</p>

</div>



    </div>
    
    

    
    <script>
        setInterval(mytime,1000);
        function mytime(){
            var d=new Date();
            document.getElementById("time").innerHTML= d.toDateString();
        }

       
    </script>

    <script src="pres.js"></script>
    
</body>
</html>