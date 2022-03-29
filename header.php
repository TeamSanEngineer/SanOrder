<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SAN </title>
    <!-- Bootstrap -->
    <script src="js/jquery-3.5.1.js"></script> 

    <link rel="stylesheet" href="css/bootstrap-4.3.1.css">
    <script src="js/bootstrap-4.3.1.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/font-awesome.js"></script>
    <script src="js/sweetalert2.js"></script>
    <script src="js/aes.js"></script>
    

    <link href="css/bootstrap-slider.min.css" rel="stylesheet"> 
    <script src="js/bootstrap-slider.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables-1.11.3.min.css">
    <link rel="stylesheet" type="text/css" href="css/buttons.dataTables-2.0.1.min.css">

    <script type="text/javascript" language="javascript" src="js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript" src="js/buttons.print.min.js"></script>
    <script type="text/javascript" language="javascript" src="js/jszip.min.js"></script>
    
    <!-- <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> -->
    <!-- <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script> -->
    <!-- <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> -->
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <!-- <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script> -->
    <!-- <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link href="css/loader.css" rel="stylesheet"> 
    <link href="css/sweetalert2.css" rel="stylesheet"> 
    <link href="css/mypcu.css" rel="stylesheet">  
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

@media only screen and (max-width: 930px) {
  .newline {
    display: block;
  }

  .labelright {
  text-align: left;
  }
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

</style>