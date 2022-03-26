<?php
  
    $userid = $userlevel = $fristname = $lastname = "";
 
    if (isset($_SESSION["UserID"]))
    { 
      $userid =  $_SESSION["UserID"];
      $fristname = $_SESSION["Fristname"];
      $lastname = $_SESSION["Lastname"];
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
             <img src="images/drill.png" class="rounded" >
          </div>

          <!-- <div class="form-group row pl">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
              <label class="form-check-label" for="inlineRadio1">Drill</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
              <label class="form-check-label" for="inlineRadio2">Reamer</label>
            </div>
          </div> -->
        <br>
          <!-- <input id="numberBox" type="number" min="0" max="100" step="10"  value="0"  /> -->
          <div class="form-group row">
            <label class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">D1:</label>
            <div class="col-sm-12 col-md-12 col-lg-3">
              <input type="number" min="0" max="100" step="1"   class="form-control" id="txtdiameter"  name="txtdiameter"  >
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3">
              <span class="p-2">0 </span>
               <input id="sld1" type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="0"/>
              <span class="p-2">100</span>
              <p>
                <span id="sld1CurrentSliderValLabel">Current Slider Value: <span id="sld1SliderVal">0</span></span>
              </p>
            </div>
            <label class="col-sm-12 col-md-12 col-lg-2 col-form-label labelright">Helix:</label>
            <div class="col-sm-12 col-md-12 col-lg-3">
              <select name="slchelix" class="form-select form-control" >
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
              <input type="number"  class="form-control" id="txtdiameter2" min="0" max="100" name="txtdiameter2"  >
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3">
              <span class="p-2">0 </span>
               <input id="sld2" type="text" data-slider-min="0" data-slider-max="100" data-slider-step="10" data-slider-value="0"/>
              <span class="p-2">100</span>
              <p>
                <span id="sld2CurrentSliderValLabel">Current Slider Value: <span id="sld2SliderVal">0</span></span>
              </p>
            </div>
            <label  class="col-sm-12 col-md-12 col-lg-2 col-form-label labelright">Tool Material:</label>
            <div class="col-sm-12 col-md-12 col-lg-3">
              <select name="slctoolmaterial" class="form-select form-control" >
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
              <input type="number"  class="form-control" id="txtfl" name="txtfl"  min="0" max="100" >
            </div>
            
            <div class="col-sm-12 col-md-12 col-lg-3">
              <span class="p-2">0 </span>
               <input id="sld3" type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="0"/>
              <span class="p-2">100</span>
              <p>
                <span id="sld3CurrentSliderValLabel">Current Slider Value: <span id="sld3SliderVal">0</span></span>
              </p>
            </div>

            <label  class="col-sm-12 col-md-12 col-lg-2 col-form-label labelright">Coating Type:</label>
            <div class="col-sm-12 col-md-12 col-lg-3">
              <select name="slccoating" class="form-select form-control" >
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
              <input type="number"  class="form-control" id="txtlength" name="txtlength" min="0" max="100" >
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3">
              <span class="p-2">0 </span>
               <input id="sld4" type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="0"/>
              <span class="p-2">100</span>
              <p>
                <span id="sld4CurrentSliderValLabel">Current Slider Value: <span id="sld4SliderVal">0</span></span>
              </p>
            </div>

            <label  class="col-sm-12 col-md-12 col-lg-2 col-form-label labelright">Work Material:</label>
            <div class="col-sm-12 col-md-12 col-lg-3">
              <input type="text"  class="form-control" id="txtworkmtl" name="txtworkmaterial" >
            </div>
          </div>
          

          <div class="form-group row justify-content-end">
            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label">Machine:</label>
              <div class="col-sm-12 col-md-12 col-lg-3">

              <select name="slcmachine" class="form-select form-control" >
                <option value="" hidden selected>Open this select menu</option>
                <option value="NC Lathe">Nc Lathe</option>
                <option value="Machinning Cuter">Machinning Cuter</option>
                <option value="CNC Lathe">CNC Lathe</option>
                <option value="Other">CrN</option>
              </select>

            </div>

            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label">QUANTITY:</label>
              <div class="col-sm-12 col-md-12 col-lg-3">
                <input  type="number" class="form-control" id="txtqua" name="txtqua" >
            </div>
          </div>


          <br>

          <div class="form-group row">
            <label class="col-form-label">Drawing Attach File 1:</label>
            <div class="col-sm-12 col-md-12 col-lg-5">
              <div class="input-group">
                <span  id="txtfupload1" class="form-control"></span>
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
                <span  id="txtfupload2" class="form-control"></span>
                <span class="input-group-btn">
                  <span class="btn btn-primary" onclick="$(this).parent().find('input[type=file]').click();">Browse</span>
                  <input name="fupload2" id="fupload2" accept=".doc,.docx,application/pdf,.csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,image/png, image/jpeg" style="display: none;" type="file">
                </span>
              </div>
            </div>
          </div>


          <div class="form-group row">
            <label class="col-form-label">Drawing Attach File 3:</label>
            <div class="col-sm-12 col-md-12 col-lg-5">
              <div class="input-group">
                <span  id="txtfupload3" class="form-control"></span>
                <span class="input-group-btn">
                  <span class="btn btn-primary" onclick="$(this).parent().find('input[type=file]').click();">Browse</span>
                  <input name="fupload3" id="fupload3" accept=".doc,.docx,application/pdf,.csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,image/png, image/jpeg" style="display: none;" type="file">
                </span>
              </div>
            </div>
          </div>




        <div class="form-group">
          <label for="description">More Description</label>
          <textarea class="form-control rounded-0" id="txtdes" name="txtdes" rows="5"></textarea>
        </div>

        <br>
        <div class="form-group row">
              <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">Fristname:</label>
                <div class="col-sm-12 col-md-12 col-lg-3">
                  <input type="text"  class="form-control" id="txtfname" name="txtfname" value="<?php echo $fristname; ?>"  >
                </div>

                <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">Lastname:</label>
                <div class="col-sm-12 col-md-12 col-lg-3">
                  <input type="text"  class="form-control" id="txtlname" name="txtlname" value="<?php echo $lastname; ?>" >
                </div>

                <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">Tel:</label>
                <div class="col-sm-12 col-md-12 col-lg-3">
                  <input type="text"  class="form-control" id="txtcontact" name="txtcontact" required >
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