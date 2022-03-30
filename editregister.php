<?php session_start();?>
<?php require_once 'connectdb.php';?>

<!DOCTYPE html>
<html lang="en">
<?php include 'header.php';?>
<body>
<?php 
   $Username = $Fristname = $Lastname = "";
   if (!isset($_SESSION["UserID"]))
   {
     Header("Location: login.php");
     exit;
   }
   else{
       $Username = $_SESSION["UserID"];
       $Fristname = $_SESSION["Fristname"];
       $Lastname = $_SESSION["Lastname"];
      
   }
?>
<?php include 'body/body0_title.php';?> 
<div class="loading">Loading&#8230;</div>
<div style="height:50px ;">
 <center><a class="btn-dark btn-lg" href="index.php">Home</a></center>
</div> 

<section>
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <h1></h1>
            <p>เข้าสู่ระบบแก้ไขสมาชิก</p>
			  <!-----<a class="btn-dark btn-lg" href="index.php">Home</a>  --->
          </div>
        </div>
      </div>
</section>  


<div class="container" style="width: 650px;">
  <h2></h2>
  <div class="card">
    <div class="card-body" align="center">สมาชิก <?php  echo  $_SESSION["Fristname"]." ".$_SESSION["Lastname"]; ?> </div> 
    <?php include 'body/body_editregister.php';?>  
  </div>
</div>

</br>
</br>
<?php include 'footer.php';?>
<?php include('src/script_editregister.php');?>
</body>
</html>
