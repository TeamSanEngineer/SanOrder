<!----------index----------->
<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<!-- <?php
$useradmin = "";
if (!$_SESSION["UserID"])
{
  Header("Location: ../login.php");
  exit;
}else{
  $useradmin = $_SESSION["UserID"];
}

if($_SESSION["Level"] <> 'admin' )
{
  Header("Location: ../index.php");
  exit;
}
?> -->
<?php include "../connectdb.php"; ?>
<?php include 'header.php';?>    
<body>
<?php include 'body/body0_title_admin.php';?>    
<?php include 'body/body1_imgheader.php';?>    
<?php include 'src/script_imgheader.php';?>
<?php include 'footer.php';?>




</body>
</html>

