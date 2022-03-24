<?php
    $userid = $userlevel = $fristname = $lastname =  "";
    $diameter= $diameter2 = $clength = $length = $quality = $description = $tel = $denti = 0;
 
       
    $sql = "SELECT
    orderid,
    diameter,
    fristname,
    lastname,
    diameter2,
    clength,
    length,
    helix,
    material,
    coating,
    quality,
    description,
    tel,
    denti,
    fileupload1,
    fileupload2,
    fileupload3
    FROM
    san_order
    WHERE orderid = '".$_GET['id']."' ";

    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) == 1)
    {
        $row = mysqli_fetch_array($result);
        $fristname =   $row['fristname'];
        $lastname =   $row['lastname'];
        $diameter =  $row ['diameter'];
        $diameter2 =  $row ['diameter2'];
        $clength =  $row ['clength'];
        $length =  $row ['length'];
        $helix =  $row ['helix'];
        $material =  $row ['material'];
        $coating =  $row ['coating'];
        $quality =  $row ['quality'];
        $description =  $row ['description'];
        $tel =  $row ['tel'];
        $denti =  $row ['denti'];
        $fupload1 = $row['fileupload1'];
        $fupload2 = $row['fileupload2'];
        $fupload3 = $row['fileupload3'];
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
          <button type="button" class="btn btn-secondary " id="txtback" onclick="window.location='index.php';" >HOME</button>
        </div>
          <div class="text-center">
             <img src="images/material.png" class="rounded" >
          </div>
          <!-- <input id="numberBox" type="number" min="0" max="100" step="10"  value="0"  /> -->
          <div class="form-group row">
            <label class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">D1:</label>
            <div class="col-sm-12 col-md-12 col-lg-3">
              <input type="number" min="0" max="100" step="1"   class="form-control" id="txtdiameter"  name="txtdiameter"  >
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
                <option value="" hidden >Open this select menu</option>
                <option value="30">30</option>
                <option value="60">60</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">D2:</label>
            <div class="col-sm-12 col-md-12 col-lg-3">
              <input type="number"  class="form-control" id="txtdiameter2" min="0" max="100" name="txtdiameter2"  >
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4">
              <span class="p-2">0 </span>
               <input id="sld2" type="text" data-slider-min="0" data-slider-max="100" data-slider-step="10" data-slider-value="<?php echo  $diameter2 ?>"/>
              <span class="p-2">100</span>
              <p>
                <span id="sld2CurrentSliderValLabel">Current Slider Value: <span id="sld2SliderVal">0</span></span>
              </p>
            </div>
            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label">MATERIAL:</label>
            <div class="col-sm-12 col-md-12 col-lg-3">
              <select id="slcmaterial" name="slcmaterial" class="form-select form-control" >
                <option value="" hidden >Open this select menu</option>
                <option value="Iron">Iron</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">CL:</label>
            <div class="col-sm-12 col-md-12 col-lg-3">
              <input type="number"  class="form-control" id="txtcl" name="txtcl"  min="0" max="100" >
            </div>
            
            <div class="col-sm-12 col-md-12 col-lg-4">
              <span class="p-2">0 </span>
               <input id="sld3" type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="<?php echo $clength; ?>"/>
              <span class="p-2">100</span>
              <p>
                <span id="sld3CurrentSliderValLabel">Current Slider Value: <span id="sld3SliderVal">0</span></span>
              </p>
            </div>

            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label">COATING:</label>
            <div class="col-sm-12 col-md-12 col-lg-3">
              <select id="slccoating" name="slccoating" class="form-select form-control" >
                <option value="" hidden >Open this select menu</option>
                <option value="Low">Low</option>
                <option value="High ">High </option>
              </select>
            </div>
          </div>
          
          <div class="form-group row">
            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">L:</label>
            <div class="col-sm-12 col-md-12 col-lg-3">
              <input type="number"  class="form-control" id="txtlength" name="txtlength" min="0" max="100" >
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4">
              <span class="p-2">0 </span>
               <input id="sld4" type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="<?php echo $length; ?>"/>
              <span class="p-2">100</span>
              <p>
                <span id="sld4CurrentSliderValLabel">Current Slider Value: <span id="sld4SliderVal">0</span></span>
              </p>
            </div>
          </div>
          
          <div class="form-group row">
            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">Denti:</label>
            <div class="col-sm-12 col-md-12 col-lg-3">
              <input type="text"  class="form-control" id="txtden" name="txtden" value="<?php echo $denti; ?>" >
            </div>
          </div>  
    
        

          <br>

          <!-- <div class="form-group row">
              <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">Denti:</label>
                <div class="col-sm-12 col-md-12 col-lg-3">
                  <input type="text"  class="form-control" id="txtden1" >
                </div>

                <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">Denti:</label>
                <div class="col-sm-12 col-md-12 col-lg-3">
                  <input type="text"  class="form-control " id="txtden2" >
                </div>

                <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">Denti:</label>
                <div class="col-sm-12 col-md-12 col-lg-3">
                  <input type="text"  class="form-control" id="txtden3" >
                </div>
          </div>   -->

          <!-- <br> -->
          
          <div class="form-group row justify-content-end">
            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label">QUANTITY:</label>
              <div class="col-sm-12 col-md-12 col-lg-3">
                <input type="text" tye="number" class="form-control" id="txtqua" name="txtqua" value="  <?php echo $quality; ?>" >
            </div>
          </div>


          <br>

          <div class="form-group row">
            <label class="col-form-label">Drawing Attach File 1:</label>
            <div class="col-sm-12 col-md-12 col-lg-5">
              <div class="input-group">
                <span  id="txtfupload1" class="form-control"><?php echo $fupload1; ?></span>
                <span class="input-group-btn">
                  <span class="btn btn-primary" onclick="$(this).parent().find('input[type=file]').click();">Browse</span>
                  <input  name="fupload1" id="fupload1" accept=".doc,.docx,application/pdf,.csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,image/png, image/jpeg" style="display: block;" type="file">
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
                  <input  name="fupload2" id="fupload2" accept=".doc,.docx,application/pdf,.csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,image/png, image/jpeg" style="display: block;" type="file">
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
                  <input  name="fupload3" id="fupload3" accept=".doc,.docx,application/pdf,.csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,image/png, image/jpeg" style="display: block;" type="file" >
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