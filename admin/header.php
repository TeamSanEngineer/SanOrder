<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SAN </title>
    <!-- Bootstrap -->
    <script src="../js/jquery-3.5.1.js"></script> 

    <link rel="stylesheet" href="../css/bootstrap-4.3.1.css">
    <script src="../js/bootstrap-4.3.1.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/moment.min.js"></script>
    <script src="../js/font-awesome.js"></script>
    <script src="../js/sweetalert2.js"></script>
    <script src="../js/aes.js"></script>
    
    

    <link href="../css/bootstrap-slider.min.css" rel="stylesheet"> 
    <script src="../js/bootstrap-slider.min.js"></script>

    <link rel="stylesheet" type="text/css" href="../css/jquery.dataTables-1.11.3.min.css">
    <link rel="stylesheet" type="text/css" href="../css/buttons.dataTables-2.0.1.min.css">

    <script type="text/javascript" language="javascript" src="../js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="../js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="../js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript" src="../js/buttons.print.min.js"></script>
    <script type="text/javascript" language="javascript" src="../js/jszip.min.js"></script>
    
    <!-- <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> -->
    <!-- <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script> -->
    <!-- <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> -->
    <!-- <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script> -->
    <!-- <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> -->
    <!-- <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script> -->
    <!-- <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link href="../css/loader.css" rel="stylesheet"> 
    <link href="../css/sweetalert2.css" rel="stylesheet"> 
    <link href="../css/mypcu.css" rel="stylesheet">  
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit">  
</head>

<style>
  .bg-black
  {
    background-color:black;
  }
  body{
    color:#666;
  }
.error{
  color:#F00;
}
.error.true{
  color:#6bc900;  
}
input:read-only {
  background-color: #ccc;
}
.ronly
{
  background-color: #e9ecef;
}
.footer {
  left: 0;
  bottom: 0;
  width: 100%;
  color: white;
  text-align: center;
  background :black;
  color:white ;
  border: 10px solid black ;
  padding: 10px;
}

.fontcow{
  color: white;
}

.labelright {
  text-align: right;
}

.newline{
  display: none;
}

.labelleft {
  text-align: left;
  }
  
.mobile-break { display: none; }

@media only screen and (max-width: 930px) {
  .newline {
    display: block;
  }
  
  .labelright {
  text-align: left;
  }

  .mobile-break { display: block; }

  /* .labelleft {
  text-align: left;
  } */
}


.imgtransparent
{
opacity:1.0; /* ค่าความจาง */
filter:alpha(opacity=100); /* สำหรับ IE8 ขึ้นไป */
}
.imgtransparent:hover
{
opacity:0.4; /* ค่าความจาง */
filter:alpha(opacity=40); /* สำหรับ IE8 ขึ้นไป */
}

.slider.slider-horizontal {
    width: 175px !important;
}




div.dataTables_wrapper {
        width: 1150px;
        margin: 0 auto;
    }

@media only screen and (max-width: 600px) {
  div.dataTables_wrapper {
        width: 300px;
        margin: 0 auto;
    }
}

.pl {
  padding-right: 45px !important;
}

.mycapitalize
{
    text-transform:capitalize;
}
.error-template {padding: 40px 15px;text-align: center;}
.error-actions {margin-top:15px;margin-bottom:15px;}
.error-actions .btn { margin-right:10px; }


.checkbox-1x {
    transform: scale(1.5);
    -webkit-transform: scale(1.5);
}
.checkbox-2x {
    transform: scale(2);
    -webkit-transform: scale(2);
}

input[type=checkbox]
{
  /* Double-sized Checkboxes */
  -ms-transform: scale(2); /* IE */
  -moz-transform: scale(2); /* FF */
  -webkit-transform: scale(2); /* Safari and Chrome */
  -o-transform: scale(2); /* Opera */
  transform: scale(2);
  padding: 25px;
}

@media (min-width: 979px) {
	.padt
    {
      padding-left: 75px  !important;
    }
    .padlabelL{
      padding-left: 10px  !important;
    }
    .padlabelLG{
      padding-left: 5px  !important;
    }
}

.imgtransparent :hover {
		/* background: #FFFF00; */
		opacity: 0.9;
  /*opacity: 0.3;*/
	/*filter: contrast(160%);*/
}

.footer-dark {
  padding:50px 0;
  color:#f0f9ff;
  background-color:#282d32;
}

.footer-dark h3 {
  margin-top:0;
  margin-bottom:12px;
  font-weight:bold;
  font-size:16px;
}

.footer-dark ul {
  padding:0;
  list-style:none;
  line-height:1.6;
  font-size:14px;
  margin-bottom:0;
}

.footer-dark ul a {
  color:inherit;
  text-decoration:none;
  opacity:0.6;
}

.footer-dark ul a:hover {
  opacity:0.8;
}

@media (max-width:767px) {
  .footer-dark .item:not(.social) {
    text-align:center;
    padding-bottom:20px;
  }
}

.footer-dark .item.text {
  margin-bottom:36px;
}

@media (max-width:767px) {
  .footer-dark .item.text {
    margin-bottom:0;
  }
}

.footer-dark .item.text p {
  opacity:0.6;
  margin-bottom:0;
}

.footer-dark .item.social {
  text-align:center;
}

@media (max-width:991px) {
  .footer-dark .item.social {
    text-align:center;
    margin-top:20px;
  }
}

.footer-dark .item.social > a {
  font-size:20px;
  width:36px;
  height:36px;
  line-height:36px;
  display:inline-block;
  text-align:center;
  border-radius:50%;
  box-shadow:0 0 0 1px rgba(255,255,255,0.4);
  margin:0 8px;
  color:#fff;
  opacity:0.75;
}

.footer-dark .item.social > a:hover {
  opacity:0.9;
}

.footer-dark .copyright {
  text-align:center;
  padding-top:24px;
  opacity:0.3;
  font-size:13px;
  margin-bottom:0;
}

.dropdown-submenu {
  position: relative;
}

.dropdown-submenu a::after {
  transform: rotate(-90deg);
  position: absolute;
  right: 6px;
  top: .8em;
}

.dropdown-submenu .dropdown-menu {
  top: 0;
  left: 100%;
  margin-left: .1rem;
  margin-right: .1rem;
}

.list-group .active {
  background-color: #e9ecef ;
  border-color: #e9ecef;
  color:black;
}

.card-block {
    min-height: 300px;
}

.gethidden{
  /* display: none; */
}

</style>