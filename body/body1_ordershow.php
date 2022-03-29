<?php
    $userid = $userlevel = $fristname = $lastname =  "";
    $diameter= $diameter2 = $flength = $length = $quality = $description = $tel = $denti = 0;
    $sandatatype = "";
    $numofteeth = false;
   
       
    if (isset($_SESSION["UserID"]))
    { 
      $userid =  $_SESSION["UserID"];
    }

 

    $sql = "SELECT
    orderid,
    diameter,
    fristname,
    lastname,
    diameter2,
    flength,
    length,
    helix,
    toolmaterial,
    coating,
    quality,
    description,
    tel,
    workmaterial,
    machine,
    fileupload1,
    fileupload2,
    fileupload3,
    type,
    numteeth,
    userrecord
    FROM
    a_san_order
    WHERE orderid = '".$_GET['id']."' AND type = '".$_GET['type']."' ";

    $SelectResult = mysqli_query($con, $sql);

    if(mysqli_num_rows($SelectResult) == 1)
    {
        $row = mysqli_fetch_assoc($SelectResult);
        $fristname =   $row['fristname'];
        $lastname =   $row['lastname'];
        $diameter =  $row ['diameter'];
        $diameter2 =  $row ['diameter2'];
        $flength =  $row ['flength'];
        $length =  $row ['length'];
        $helix =  $row ['helix'];
        $material =  $row ['toolmaterial'];
        $coating =  $row ['coating'];
        $quality =  $row ['quality'];
        $description =  $row ['description'];
        $tel =  $row ['tel'];
        $workmaterial =  $row ['workmaterial'];
        $machine = $row['machine'];
        $fupload1 = $row['fileupload1'];
        $fupload2 = $row['fileupload2'];
        $fupload3 = $row['fileupload3'];
        $sandatatype = $row['type'];
        $numteeth = $row['numteeth']; 
        $userrecord =  $row['userrecord']; 

        if( $sandatatype == "drill")
        {
          $sandatatype = $_GET['type'];
          $sanimg = "drill.png";
        }
        elseif( $sandatatype == "reamer" )
        {
          $sandatatype = $_GET['type'];
          $sanimg = "reamer.png";
          $numofteeth = true;
        }

    } 
    else{
      http_response_code(404);
      include('my_404.php'); 
      die();
    }

    mysqli_close($con);

    if ($_SESSION["Level"] != 'admin'){     
        if( $userrecord != $userid )
        {
          http_response_code(404);
          include('notyou.php'); 
          die();
        }
    }
    

  
?>

<div class="loading">Loading&#8230;</div>
<form  id="form1" name="form1" method="post" >
<section>
      <div class="container">
        <div class="d-flex justify-content-center" >
          <p><h2><?php echo strtoupper($sandatatype)  ?></h2></p>
        </div>
          <div class="text-center">
             <img src="images/datatype/<?php echo $sanimg  ?>" class="rounded" >
          </div>
         
          <div class="form-group row">
            <label class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">D1:</label>
            <div class="col-sm-12 col-md-12 col-lg-3">
              <input  readonly type="text"  class="form-control" id="txtdiameter"  name="txtdiameter"  value="<?php echo  $diameter ?>" >
            </div>
           

            <label class="col-sm-12 col-md-12 col-lg-2 col-form-label labelright">HELIX:</label>
            <div class="col-sm-12 col-md-12 col-lg-3">
            <input  readonly type="text"  class="form-control" id="slchelix"  name="slchelix" value="<?php echo  $helix ?>"  >
            </div>
          </div>

          <div class="form-group row">
            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">D2:</label>
            <div class="col-sm-12 col-md-12 col-lg-3">
              <input  readonly type="text"  class="form-control" id="txtdiameter2" min="0" max="100" name="txtdiameter2" value="<?php echo  $diameter2 ?>" >
            </div>
         
            <label  class="col-sm-12 col-md-12 col-lg-2 col-form-label labelright">Tool Material:</label>
            <div class="col-sm-12 col-md-12 col-lg-3">
            <input  readonly type="text"  class="form-control" id="slcmaterial"  name="slcmaterial" value="<?php echo  $material ?>"  >
            </div>
          </div>

          <div class="form-group row">
            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">FL:</label>
            <div class="col-sm-12 col-md-12 col-lg-3">
              <input  readonly type="text"  class="form-control" id="txtfl" name="txtfl"  value="<?php echo  $flength ?>" >
            </div>
            
       

            <label  class="col-sm-12 col-md-12 col-lg-2 col-form-label labelright">Coating Type:</label>
            <div class="col-sm-12 col-md-12 col-lg-3">
            <input  readonly type="text"  class="form-control" id="slccoating"  name="slccoating" value="<?php echo $coating; ?>"  >
            </div>
          </div>
          
          <div class="form-group row">
            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">L:</label>
            <div class="col-sm-12 col-md-12 col-lg-3">
              <input  readonly type="text"  class="form-control" id="txtlength" name="txtlength" value="<?php echo  $length ?>" >
            </div>

            <label  class="col-sm-12 col-md-12 col-lg-2 col-form-label labelright">Work Material:</label>
            <div class="col-sm-12 col-md-12 col-lg-3">
            <input  readonly type="text"  class="form-control" id="txtworkmaterial"  name="txtworkmaterial" value="<?php echo $workmaterial; ?>"  >
            </div>
          </div>
          
    
    
        

          <br>
          
          <div class="form-group row justify-content-end">

          <?php if ($numofteeth == true) { ?>
            <label  class="col-sm-12 col-md-12 col-lg-2 col-form-label labelright">Number of Teeth:</label>
            <div class="col-sm-12 col-md-12 col-lg-3">
              <input readonly type="number"  class="form-control" id="numofteeth" name="numofteeth"  min="1"  value="<?php echo $numteeth; ?>" >
            </div>
          <?php } ?>

          <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label">Machine:</label>
              <div class="col-sm-12 col-md-12 col-lg-2">
                <input  readonly type="text" tye="text" class="form-control" id="txtmachine" name="txtmachine" value="<?php echo $machine; ?>" >
            </div>

            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label">QUANTITY:</label>
              <div class="col-sm-12 col-md-12 col-lg-2">
                <input  readonly type="text" tye="text" class="form-control" id="txtqua" name="txtqua" value="<?php echo $quality; ?>" >
            </div>
          </div>


          <br>

          <div class="form-group row">
            <label class="col-form-label">Drawing Attach File 1:</label>
            <div class="col-sm-12 col-md-12 col-lg-5">
              <div class="input-group">
                <span  id="txtfupload1" class="form-control ronly"><?php echo $fupload1; ?></span>
                <span class="input-group-btn">
                  <?php if($fupload1 != "") {?>
                        <button id="btndownload1" type="button" class="btn btn-primary" onclick="document.getElementById('linkdownload1').click()"><i class="fa fa-download"></i>Download</button>
                        <a id="linkdownload1" href="doc/<?php echo $fupload1; ?>" download hidden></a>
                    <?php } ?>
                </span>
              </div>
            </div>
          </div>


          <div class="form-group row">
            <label class="col-form-label">Drawing Attach File 2:</label>
            <div class="col-sm-12 col-md-12 col-lg-5">
              <div class="input-group">
                <span  id="txtfupload2" class="form-control ronly"><?php echo $fupload2; ?></span>
                <span class="input-group-btn">
                  <?php if($fupload2 != "") {?>
                      <button id="btndownload2" type="button" class="btn btn-primary" onclick="document.getElementById('linkdownload2').click()"><i class="fa fa-download"></i>Download</button>
                      <a id="linkdownload2" href="doc/<?php echo $fupload2; ?>" download hidden></a>
                  <?php } ?>
                </span>
              </div>
            </div>
          </div>


          <div class="form-group row">
            <label class="col-form-label">Drawing Attach File 3:</label>
            <div class="col-sm-12 col-md-12 col-lg-5">
              <div class="input-group">
                <span  id="txtfupload3" class="form-control ronly"><?php echo $fupload3; ?></span>
                <span class="input-group-btn">
                  <?php if($fupload3 != "") {?>
                      <button id="btndownload3" type="button" class="btn btn-primary" onclick="document.getElementById('linkdownload3').click()"><i class="fa fa-download"></i>Download</button>
                      <a id="linkdownload3" href="doc/<?php echo $fupload3; ?>" download hidden></a>
                  <?php } ?>
                </span>
              </div>
            </div>
          </div>




        <div class="form-group">
          <label for="description">More Description</label>
          <textarea readonly class="form-control rounded-0" id="txtdes" name="txtdes" rows="5" > <?php echo $description; ?></textarea>
        </div>

        <br>
        <div class="form-group row">
              <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">Fristname:</label>
                <div class="col-sm-12 col-md-12 col-lg-3">
                  <input  readonly type="text"  class="form-control" id="txtfname" name="txtfname" value="<?php echo $row['fristname']; ?>"  >
                </div>

                <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">Lastname:</label>
                <div class="col-sm-12 col-md-12 col-lg-3">
                  <input  readonly type="text"  class="form-control" id="txtlname" name="txtlname" value="<?php echo $row['lastname']; ?>" >
                </div>

                <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">Tel:</label>
                <div class="col-sm-12 col-md-12 col-lg-3">
                  <input  readonly type="text"  class="form-control" id="txtcontact" name="txtcontact" required >
                </div>
        </div> 

        <br>

          <div class="form-group row">
                <div class="col-sm-12 col-md-12 col-lg-2">
                  <p class="newline"><p>
                  <button type="button" class="btn btn-primary " id="txtconfirm">Confirm</button>
                </div> 

                <div class="col-sm-12 col-md-12 col-lg-2">
                  <p class="newline"><p>
                  <button type="button" class="btn btn-danger " id="txtback" onclick="window.location='index.php';" >Back</button>
                </div> 
        </div> 

        <!-- END -->
      </div>
      
</section>
</form>