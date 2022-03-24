<!DOCTYPE html>
<html lang="en">
<?php include 'header.php';?>
<body>   
<?php include 'body0_title.php';?> 
<div style="height:50px ;">
 <center><a class="btn-dark btn-lg" href="index.php">Home</a></center>
</div> 
<section>
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <h1></h1>
            <p>เข้าสู่ระบบลงทะเบียน</p>
			  <!-----<a class="btn-dark btn-lg" href="index.php">Home</a>  --->
          </div>
        </div>
      </div>
</section>  
<div class="container" style="width: 650px;">
  <h2></h2>
  <div class="card">
    <div class="card-body" align="center">สำหรับสมาชิก</div>
    <form name="form1" method="post" action="checklogin.php">
      <?php include 'body_login.php';?>  
    </from>
  </div>
</div>

</br>
</br>
<?php include 'footer.php';?>
</body>
</html>