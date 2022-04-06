<nav class="navbar navbar-expand-lg navbar-dark bg-black">
<a class="navbar-brand" href="#">San Engineering</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <!-- <a class="navbar-brand" href="#">San Engineering</a> -->
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li> -->
      <!-- <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li> -->
   <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle"  id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Products
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <!-- <li><a class="dropdown-item" href="#">Action</a></li> -->
          <!-- <li><a class="dropdown-item" href="#">Another action</a></li> -->
          <a class="dropdown-item" href="order.php?type=drill">Drill</a>
          <a class="dropdown-item" href="order.php?type=endmill">Endmill</a>
          <a class="dropdown-item" href="order.php?type=bite">Bite</a>
          <a class="dropdown-item" href="order.php?type=part">Part</a>
          <a class="dropdown-item" href="order.php?type=reamer">Reamer</a>
          <a class="dropdown-item" href="order.php?type=cutter">Cutter</a>
          <a class="dropdown-item" href="order.php?type=insert">Insert</a>
          <a class="dropdown-item" href="order.php?type=other">Other</a>
          <!-- <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Drill</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Submenu action</a></li>
              <li><a class="dropdown-item" href="#">Another submenu action</a></li>
            </ul>
          </li>

          <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Endmill</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Submenu action</a></li>
              <li><a class="dropdown-item" href="#">Another submenu action</a></li>
            </ul>
          </li>

          <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Bite</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Submenu action</a></li>
              <li><a class="dropdown-item" href="#">Another submenu action</a></li>
            </ul>
          </li>


          <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Part</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Submenu action</a></li>
              <li><a class="dropdown-item" href="#">Another submenu action</a></li>
            </ul>
          </li>

          <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Reamer</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Submenu action</a></li>
              <li><a class="dropdown-item" href="#">Another submenu action</a></li>
            </ul>
          </li>

          <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Cutter</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Submenu action</a></li>
              <li><a class="dropdown-item" href="#">Another submenu action</a></li>
            </ul>
          </li>

          <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Insert</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Submenu action</a></li>
              <li><a class="dropdown-item" href="#">Another submenu action</a></li>
            </ul>
          </li>

          <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Other</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Submenu action</a></li>
              <li><a class="dropdown-item" href="#">Another submenu action</a></li>
            </ul>
          </li> -->
        </ul>
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
                    <span class="dropdown-item"  >ผู้ดูแลระบบ</span>
                    <!-- <a class="dropdown-item"  href="https://mypcu-data.net/academy/inputadmin/index.php" >สำหรับผู้ดูแลระบบ</a>  -->
                    <hr> 
                    <?php }?>
                     <a class="dropdown-item"  href="../sanorder/editregister.php" >แก้ไขข้อมูล</a>
                    <!-- <a class="dropdown-item"  href="https://mypcu-data.net/academy/editregister.php" >แก้ไขข้อมูล</a>   -->
                    <hr> 
                    <a class="dropdown-item" href="../sanorder/logout.php">Log out</a>
                    <!-- <a class="dropdown-item" href="https://mypcu-data.net/academy/logout.php">Log out</a> -->
                    </div>
                </li>
            <?php }?>
        </ul>
    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->
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
 
 $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
  if (!$(this).next().hasClass('show')) {
    $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
  }
  var $subMenu = $(this).next(".dropdown-menu");
  $subMenu.toggleClass('show');


  $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
    $('.dropdown-submenu .show').removeClass("show");
  });


  return false;
});
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
