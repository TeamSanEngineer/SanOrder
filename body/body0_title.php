<nav  class="navbar navbar-expand-lg navbar-dark bg-black">
  <!-- <a class="navbar-brand"  style="color:white" >San Engineering</a> -->
  <a  class="navbar-brand mb-0 h1"  style="color:white" >San Engineering</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown">
      <span class="navbar-toggler-icon"></span>
  </button>
  <div id="navbarNavDropdown" class="navbar-collapse collapse">
      <ul class="navbar-nav mr-auto">
          <!-- <li style="color:white" >Home</li> -->
          <li class="nav-item active">
            <a class="nav-link" href="/sanorder">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" style="color:white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Product
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color:white" href="displayorder.php">Details </a>
          </li>
      </ul>


      <ul class="navbar-nav">
            <?php  if( !isset($_SESSION["UserID"]) ){ ?>
            <li class="nav-item">
                <a class="nav-link" style="color:white" href="register.php">สมัครมาชิก</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color:white" href="login.php">เข้าสู่ระบบ</a>
            </li>
            <?php  } else{?>
            <li class="nav-item">
            <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg" width="40" height="40" class="rounded-circle">
            </li>
            <li class="nav-item"><a class="nav-link"  style="color:white"><?php echo  $_SESSION["Fristname"]." ".$_SESSION["Lastname"]; ?></a></li>
              <li class="dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown">
                      
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">                      
                    <?php  if( $_SESSION["Level"] == 'admin'  ) { ?>
                    <a class="dropdown-item"  href="../academy/superadmin/index.php" >สำหรับผู้ดูแลระบบ</a>
                    <!-- <a class="dropdown-item"  href="https://mypcu-data.net/academy/inputadmin/index.php" >สำหรับผู้ดูแลระบบ</a>  -->
                    <hr> 
                    <?php }?>
                     <a class="dropdown-item"  href="../academy/editregister.php" >แก้ไขข้อมูล</a>
                    <!-- <a class="dropdown-item"  href="https://mypcu-data.net/academy/editregister.php" >แก้ไขข้อมูล</a>   -->
                    <hr> 
                    <a class="dropdown-item" href="../sanorder/logout.php">Log out</a>
                    <!-- <a class="dropdown-item" href="https://mypcu-data.net/academy/logout.php">Log out</a> -->
                    </div>
                </li>
            <?php }?>
        </ul>

  </div>
</nav>


<section>
    <div  style="background: url(images/blue-002.png) no-repeat center center fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">
      <div class="container">

        <div class="row">
          <div class="col-12" align="center">
            <h1><img src="images/logo-1.png"  alt=""/></h1>
            <h1 class="fontcow">ยินดีต้อนรับสู่ SAN</h1>
            <p class="fontcow">รับผลิต,ออกแบบ,ลับคมเครื่องมือตัด(Cutting Tools)ทุกชนิดที่ใช้ในงานอุตสาหกรรม</p>           
          </div>
        </div>
                   
                      
        
      </div>

      <nav aria-label="breadcrumb">
  <ol id="getbreadcrumb" class="breadcrumb">
    <!-- <li class="breadcrumb-item"><a href="">Home</a></li> -->
    <!-- <li class="breadcrumb-item active" aria-current="page">Products</li> -->
    <!-- <li class="breadcrumb-item active" aria-current="page">Data</li> -->
  </ol>
</nav>
    </div>
</section>
<br>

<div id="demo"></div>

<script>
 
//  console.log( $(location).attr('href'));

 const parts = [{"text": 'Home', "link": '/'}];

 const here = location.href.split('/').slice(3);
    // console.log(here)
  if(here[1]=="" || here[1]=="index.php"  )
  {
    $( "#getbreadcrumb" ).append( '<li class="breadcrumb-item mycapitalize active" aria-current="page">Home</li>');
  }
  else{
    for (let i = 0; i < here.length; i++) {
      const part = here[i];
      // console.log(i)
      // console.log(part)
        var text = decodeURIComponent(part).split('.')[0];
        // console.log(text)
        if(i==0){
          text = "Home";
      }
        const link = '/' + here.slice(0, i + 1).join('/');
        // console.log(link)
        // parts.push({"text": text, "link": link});
        // console.log(parts)
        
        if (i === here.length - 1) {
          // console.log("last"+text+"  "+i)
        }
        $( "#getbreadcrumb" ).append('<li class="breadcrumb-item mycapitalize"><a href="'+link+'">'+text+'</a></li>');

    }    
  }
                      
</script>
