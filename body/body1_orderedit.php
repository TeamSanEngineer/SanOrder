<?php
    $userid = $userlevel = $fristname = $lastname =  "";
    $diameter= $diameter2 = $clength = $length = $quality = $description = $tel = $denti = 0;
 
       
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
    numteeth
    FROM
    san_order
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
  
    
    if (isset($_SESSION["UserID"]))
    { 
      $userid =  $_SESSION["UserID"];
      // $fristname = $_SESSION["Fristname"];
      // $lastname = $_SESSION["Lastname"];
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
              <input type="number" min="1" max="100" step="1"   class="form-control" id="txtdiameter"  name="txtdiameter"  >
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4">
              <span class="p-2">0 </span>
               <input id="sld1" type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="<?php echo  $diameter ?>"/>
              <span class="p-2">100</span>
              <p>
                <span id="sld1CurrentSliderValLabel">Current Slider Value: <span id="sld1SliderVal">0</span></span>
              </p>
            </div>
            <label class="col-sm-12 col-md-12 col-lg-1 col-form-label">HELIX:</label>
            <div class="col-sm-12 col-md-12 col-lg-3">
              <select id="slchelix" name="slchelix" class="form-select form-control" >
              <option value="" hidden selected>Open this select menu</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="25">25</option>
                <option value="30">30</option>
                <option value="35">35</option>
                <option value="45">45</option>
                <option value="60">60</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">D2:</label>
            <div class="col-sm-12 col-md-12 col-lg-3">
              <input type="number"  class="form-control" id="txtdiameter2" min="1" max="100" name="txtdiameter2"  >
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3">
              <span class="p-2">0 </span>
               <input id="sld2" type="text" data-slider-min="0" data-slider-max="100" data-slider-step="10" data-slider-value="<?php echo  $diameter2 ?>"/>
              <span class="p-2">100</span>
              <p>
                <span id="sld2CurrentSliderValLabel">Current Slider Value: <span id="sld2SliderVal">0</span></span>
              </p>
            </div>
            <label  class="col-sm-12 col-md-12 col-lg-2 col-form-label labelright">MATERIAL:</label>
            <div class="col-sm-12 col-md-12 col-lg-3">
              <select id="slcmaterial" name="slcmaterial" class="form-select form-control" >
                <option value="" hidden selected>Open this select menu</option>
                <option value="Carbide">Carbide</option>
                <option value="HSS">HSS</option>
                <option value="PCD">PCD</option>
                <option value="CBN">CBN</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">FL:</label>
            <div class="col-sm-12 col-md-12 col-lg-3">
              <input type="number"  class="form-control" id="txtfl" name="txtfl"  min="1" max="100" >
            </div>
            
            <div class="col-sm-12 col-md-12 col-lg-3">
              <span class="p-2">0 </span>
               <input id="sld3" type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="<?php echo $flength; ?>"/>
              <span class="p-2">100</span>
              <p>
                <span id="sld3CurrentSliderValLabel">Current Slider Value: <span id="sld3SliderVal">0</span></span>
              </p>
            </div>

            <label  class="col-sm-12 col-md-12 col-lg-2 col-form-label labelright">COATING:</label>
            <div class="col-sm-12 col-md-12 col-lg-3">
              <select id="slccoating" name="slccoating" class="form-select form-control" >
                <option value="" hidden selected>Open this select menu</option>
                <option value="TIN">TIN</option>
                <option value="TICN">TICN</option>
                <option value="TIALN">TIALN</option>
                <option value="CrN">CrN</option>
                <option value="DLC">DLC</option>
                <option value="ACX">ACX</option>
                <option value="AlCrN">AlCrN</option>
                <option value="Latuma">Latuma</option>
              </select>
            </div>
          </div>
          
          <div class="form-group row">
            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">L:</label>
            <div class="col-sm-12 col-md-12 col-lg-3">
              <input type="number"  class="form-control" id="txtlength" name="txtlength" min="1" max="100" >
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3">
              <span class="p-2">0 </span>
               <input id="sld4" type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="<?php echo $length; ?>"/>
              <span class="p-2">100</span>
              <p>
                <span id="sld4CurrentSliderValLabel">Current Slider Value: <span id="sld4SliderVal">0</span></span>
              </p>
            </div>

             <label  class="col-sm-12 col-md-12 col-lg-2 col-form-label labelright">Work Material:</label>
            <div class="col-sm-12 col-md-12 col-lg-3">
            <input   type="text"  class="form-control" id="txtworkmaterial"  name="txtworkmaterial" value="<?php echo $workmaterial; ?>"  >
            </div>
          </div>
          
    
        

          <br>

      
          <!-- <br> -->
          
          <div class="form-group row justify-content-end">

          
          <?php if ($numofteeth == true) { ?>
            <label  class="col-sm-12 col-md-12 col-lg-2 col-form-label labelright">Number of Teeth:</label>
            <div class="col-sm-12 col-md-12 col-lg-3">
              <input type="number"  class="form-control" id="numofteeth" name="numofteeth"  min="1" require   value="<?php echo $numteeth; ?>" >
            </div>
          <?php } ?>

      

            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label">Machine:</label>
              <div class="col-sm-12 col-md-12 col-lg-3">
                <select name="slcmachine" id="slcmachine" class="form-select form-control" require>
                  <option value="" hidden selected>Open this select menu</option>
                  <option value="NC Lathe">Nc Lathe</option>
                  <option value="Machinning Cuter">Machinning Cuter</option>
                  <option value="CNC Lathe">CNC Lathe</option>
                  <option value="Other">Other</option>
                </select>
              </div>

            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label">QUANTITY:</label>
              <div class="col-sm-12 col-md-12 col-lg-2">
                <input type="number" class="form-control" id="txtqua" name="txtqua" value=<?php echo $quality; ?>  >
            </div>
          </div>


          <br>

          <div class="form-group row">
            <label class="col-form-label">Drawing Attach File 1:</label>
            <div class="col-sm-12 col-md-12 col-lg-5">
              <div class="input-group">
                <span   id="txtfupload1" class="form-control"><?php echo $fupload1; ?></span>
                <span class="input-group-btn">
                  <span class="btn btn-primary" onclick="$(this).parent().find('input[type=file]').click();">Browse</span>
                  <input  name="fupload1" id="fupload1" accept=".doc,.docx,application/pdf,.csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,image/png, image/jpeg" style="display: none;" type="file">
                </span>
              </div>
            </div>
          </div>


          <div class="form-group row">
            <label class="col-form-label">Drawing Attach File 2:</label>
            <div class="col-sm-12 col-md-12 col-lg-5">
              <div class="input-group">
                <span  id="txtfupload2" class="form-control"><?php echo $fupload2; ?></span>
                <span class="input-group-btn">
                  <span class="btn btn-primary" onclick="$(this).parent().find('input[type=file]').click();">Browse</span>
                  <input  name="fupload2" id="fupload2" accept=".doc,.docx,application/pdf,.csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,image/png, image/jpeg" style="display: none;" type="file">
                </span>
              </div>
            </div>
          </div>


          <div class="form-group row">
            <label class="col-form-label">Drawing Attach File 3:</label>
            <div class="col-sm-12 col-md-12 col-lg-5">
              <div class="input-group">
                <span  id="txtfupload3" class="form-control"><?php echo $fupload3; ?></span>
                <span class="input-group-btn">
                  <span class="btn btn-primary" onclick="$(this).parent().find('input[type=file]').click();">Browse</span>
                  <input  name="fupload3" id="fupload3" accept=".doc,.docx,application/pdf,.csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,image/png, image/jpeg" style="display: none;" type="file" >
                </span>
              </div>
            </div>
          </div>




        <div class="form-group">
          <label for="description">More Description</label>
          <textarea class="form-control rounded-0" id="txtdes" name="txtdes" rows="5"  ><?php echo $description; ?></textarea>
        </div>

        <br>
        <div class="form-group row">
              <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">Fristname:</label>
                <div class="col-sm-12 col-md-12 col-lg-3">
                  <input type="text"  class="form-control" id="txtfname" name="txtfname" value="<?php echo $row['fristname']; ?>"  >
                </div>

                <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">Lastname:</label>
                <div class="col-sm-12 col-md-12 col-lg-3">
                  <input type="text"  class="form-control" id="txtlname" name="txtlname" value="<?php echo $row['lastname']; ?>" >
                </div>

                <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">Tel:</label>
                <div class="col-sm-12 col-md-12 col-lg-3">
                  <input type="text"  class="form-control" id="txtcontact" name="txtcontact" value="<?php echo $tel ; ?>"   >
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