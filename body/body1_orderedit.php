<?php
    $userid = $userlevel = $fristname = $lastname =  "";
    $diameter= $diameter2 = $clength = $length = $quality = $description = $tel = $denti = 0;
 
       
    $sql = "SELECT *FROM a_san_order WHERE orderid = '".$_GET['id']."' AND type = '".$_GET['type']."' ";

    $SelectResult = mysqli_query($con, $sql);
    if(mysqli_num_rows($SelectResult) == 1)
    {
      $row = mysqli_fetch_assoc($SelectResult);
      $sandatatype = $row['type'];
      if($sandatatype == "drill") {
        $sanimg = "drill.png";
        $sanhome = "drill.jpg";
      }
      elseif($sandatatype == "endmill" ){
        $sanimg = "endmill.png";
        $sanhome = "endmill.jpg";
        $numofteeth = true;
      }
      elseif($sandatatype == "bite" ){
        $sanimg = "bite.png";
        $numofteeth = true;
      }
      elseif($sandatatype == "part" ){
        $sanimg = "part.png";
        $numofteeth = true;
      }
      elseif($sandatatype == "reamer" ){
        $sanimg = "reamer.png";
        $numofteeth = true;
      }
      elseif($sandatatype == "cutter" ) {
        $sanimg = "cutter.png";
        $numofteeth = true;
      }
      elseif($sandatatype == "insert" ){
        $sanimg = "insert.png";
        $numofteeth = true;
      }
      elseif($sandatatype == "other" ){
        $sanimg = "other.png";
        $numofteeth = true;
      }
    } 
    else{
      http_response_code(404);
      include('my_404.php'); 
      die();
    }
    // mysqli_close($con);
  
    
    if (isset($_SESSION["UserID"]))
    { 
      $userid =  $_SESSION["UserID"];
    }

    
    if ($_SESSION["Level"] != 'admin'){     
      if( $row['userrecord'] != $userid )
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
                    <div class="text-center">
                      <img src="images/home/<?php echo $sanhome  ?>" class="rounded" >
                    </div>

                  <div class="d-flex justify-content-center" >
                    <p>
                      <h2>
                          <?php 
                            if($sandatatype == "other")
                            {
                              echo "Special Cutting Tool";
                            }else{
                              echo strtoupper($sandatatype);
                            }
                          ?>
                    </h2>
                    </p>
                  </div>

       
          <div id="listsubtype" class="list-group list-group-horizontal text-nowrap overflow-auto">
                  <?php 
                      $phpArray = array();
                      $sql = "SELECT * FROM a_image WHERE type = '".$_GET['type']."' ORDER BY `order` ASC;";
                      $result = mysqli_query($con, $sql);

                      $imgcurrent = "";
                   if ($result->num_rows > 0) {
                        $x = 1 ;
                  while($rowimg = $result->fetch_assoc()) {
                        $new = array_push($phpArray, $rowimg["getimg"]);
                      if($row['imageorder'] == $rowimg["order"]){
                        $imgcurrent = $rowimg["getimg"];
                        ?> 

                       <a class="list-group-item list-group-item-action text-center active" data-toggle="list" onClick="imagedraw(<?php echo $rowimg["order"];?>)" >
                        <img src="images/mattype/<?php echo $rowimg["name"]; ?>" class="rounded"   >
                       </a>
                      
                  <?php }else{ ?>
                        
                          <a class="list-group-item list-group-item-action text-center " data-toggle="list" onClick="imagedraw(<?php echo $rowimg["order"];?>)" >
                            <img src="images/mattype/<?php echo $rowimg["name"]; ?>" class="rounded"   >
                          </a>
                      <?php 
                          }
                        $x++;
                        }
                  }
                  mysqli_close($con);
                  ?>
          </div>
                  
          <div  id="imgdraw" class="text-center">
                  <br>
                  <img src="images/datatype/<?php echo $imgcurrent;  ?>" class="rounded img-fluid border border-dark" >
          </div>
          <br>

          <div class="form-group row">
            <label class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">D1:</label>
            <div class="col-sm-12 col-md-12 col-lg-4 input-group">
              <input type="number" min="0" max="100"   class="form-control" id="txtdiameter"  name="txtdiameter" value="<?php echo  $row['diameter']; ?>"  >
              <div class="input-group-append">
                <span class="input-group-text" >mm.</span>
              </div>
              <label class="col-form-label padlabelL" >min-max (0-100) </label>
            </div>
          
            <label class="col-sm-12 col-md-12 col-lg-2 col-form-label labelright">HELIX:</label>
            <div class="col-sm-12 col-md-12 col-lg-3">
              <select id="slchelix" name="slchelix" class="form-select form-control" >
              <option value="" hidden selected>Open this select menu</option>
                <option value="10°">10°</option>
                <option value="15°">15°</option>
                <option value="20°">20°</option>
                <option value="25°">25°</option>
                <option value="30°">30°</option>
                <option value="35°">35°</option>
                <option value="45°">45°</option>
                <option value="60°">60°</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">D2:</label>
            <div class="col-sm-12 col-md-12 col-lg-4 input-group">
              <input type="number"  class="form-control" id="txtdiameter2" min="0" max="100" name="txtdiameter2" value="<?php echo  $row['diameter2']; ?>"  >
              <div class="input-group-append">
                <span class="input-group-text" >mm.</span>
              </div>
              <label class="col-form-label padlabelL" >min-max (0-100) </label>
            </div>
            <label  class="col-sm-12 col-md-12 col-lg-2 col-form-label labelright">MATERIAL:</label>
            <div class="col-sm-12 col-md-12 col-lg-3">
              <select id="slctoolmaterial" name="slctoolmaterial" class="form-select form-control" >
                <option value="" hidden selected>Select menu</option>
                <option value="Carbide">Carbide</option>
                <option value="HSS">HSS</option>
                <option value="PCD">PCD</option>
                <option value="CBN">CBN</option>
                <option value="Other">Other</option>
              </select>
              <input type="text"  class="form-control" id="txttoolmaterial" name="txttoolmaterial" style="display:none;" value="<?php echo $row['destoolmaterial']; ?>" >
            </div>
          </div>

          <div class="form-group row">
            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">FL:</label>

            <div class="col-sm-12 col-md-12 col-lg-4 input-group">
              <input type="number"  class="form-control" id="txtfl" name="txtfl"  min="0" max="160" value="<?php echo  $row['flength']; ?>">
              <div class="input-group-append">
                <span class="input-group-text" >mm.</span>
              </div>
              <label class="col-form-label padlabelL" >min-max (0-160) </label>
            </div>              
            <label  class="col-sm-12 col-md-12 col-lg-2 col-form-label labelright">COATING:</label>
            <div class="col-sm-12 col-md-12 col-lg-3">
              <select id="slccoating" name="slccoating" class="form-select form-control" >
              <option value="" hidden selected>Select menu</option>
                <option value="TIN">TIN</option>
                <option value="TICN">TICN</option>
                <option value="TIALN">TIALN</option>
                <option value="CrN">CrN</option>
                <option value="DLC">DLC</option>
                <option value="ACX">ACX</option>
                <option value="AlCrN">AlCrN</option>
                <option value="Latuma">Latuma</option>
                <option value="Other">Other</option>
              </select>
              <input type="text"  class="form-control" id="txtcoating" name="txtcoating" style="display:none;" value="<?php echo $row['descoating']; ?>"  >
            </div>
          </div>
          
          <div class="form-group row">
            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">L:</label>
            <div class="col-sm-12 col-md-12 col-lg-4 input-group">
              <input type="number"  class="form-control" id="txtlength" name="txtlength" min="0" max="300"  value="<?php echo  $row['length']; ?>">
              <div class="input-group-append">
                <span class="input-group-text" >mm.</span>
              </div>
              <label class="col-form-label padlabelLG" >min-max (0-300) </label>
            </div>
           
            <label  class="col-sm-12 col-md-12 col-lg-2 col-form-label labelright">Coating Color:</label>
            <div class="col-sm-12 col-md-12 col-lg-3">
                  <input  type="text"  class="form-control" id="txtcoatingcolor" name="txtcoatingcolor" value="<?php echo $row['coatingcolor']; ?>"   >
            </div>
    
            
          </div>
        
        

          <br>

      
          <!-- <br> -->
          <div class="form-group row">
            <?php if ($numofteeth == true) { ?>
              <label  class="col-sm-12 col-md-12 col-lg-2 col-form-label labelright">Number of Teeth:</label>
              <div class="col-sm-12 col-md-12 col-lg-1">
                <input type="number"  class="form-control" id="numofteeth" name="numofteeth"  min="1" max="8" value="<?php echo $row['numteeth'];  ?>" >
              </div>
              <div class="col-sm-12 col-md-12 col-lg-9">
                  <div class="form-group row">
                      <div class="col-sm-12 col-md-12 col-lg-2">
                        <img id="imageId1" class="img-thumbnail" src="images/40x40.png">
                      </div>
                      <div class="col-sm-12 col-md-12 col-lg-2">
                        <img id="imageId2" class="img-thumbnail" src="images/40x40.png">
                      </div>
                      <div class="col-sm-12 col-md-12 col-lg-2">
                        <img id="imageId3"  class="img-thumbnail" src="images/40x40.png">
                      </div>
                      <div class="col-sm-12 col-md-12 col-lg-2">
                        <img id="imageId4" class="img-thumbnail"  src="images/40x40.png">
                      </div>
                      <div class="col-sm-12 col-md-12 col-lg-2">
                        <img id="imageId5" class="img-thumbnail"  src="images/40x40.png">
                      </div>
                      <div class="col-sm-12 col-md-12 col-lg-2">
                        <img id="imageId6" class="img-thumbnail" src="images/40x40.png">
                      </div>
                  </div>
              </div>
            <?php } ?>
          
          </div>

        


          <div class="form-group row justify-content-end">

          <label  class="col-sm-12 col-md-12 col-lg-2 col-form-label labelright">Work Material:</label>
            <div class="col-sm-12 col-md-12 col-lg-3">
            <input   type="text"  class="form-control" id="txtworkmaterial"  name="txtworkmaterial" value="<?php echo  $row['workmaterial']; ?>"  >
            </div>

            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label">Machine:</label>
              <div class="col-sm-12 col-md-12 col-lg-3">
                <select name="slcmachine" id="slcmachine" class="form-select form-control" require>
                  <option value="" hidden selected>Open this select menu</option>
                  <option value="NC Lathe">Nc Lathe</option>
                  <option value="Machinning Cuter">Machinning Cuter</option>
                  <option value="CNC Lathe">CNC Lathe</option>
                  <option value="Other">Other</option>
                </select>
                <input type="text"  class="form-control" id="txtmachine" name="txtmachine"  style="display:none;" value="<?php echo $row['desmachine']; ?>" > 
              </div>

            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label">QUANTITY:</label>
              <div class="col-sm-12 col-md-12 col-lg-2">
                <input type="number" class="form-control" id="txtqua" name="txtqua" value=<?php echo $row['quality']; ?>  >
            </div>
          </div>
          
          <div class="form-group row">
            <label  class="col-sm-12 col-md-12 col-lg-2 col-form-label ">ลักษณะการใช้งาน:</label> 
          </div>

          <div class="form-group row align-items-center">
            <div class="col-sm-12 col-md-12 col-lg-3 padt">
              <div class="form-check mb-2 ">
                <input class="form-check-input" type="checkbox" id="chkusagedrill" >
                <label class="form-check-label" for="chkusagedrill">
                  เจาะ ความลึกเจาะ:
                </label>
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3">
                <input  type="text"   class="form-control" id="txtusagedrill" name="txtusagedrill"  value="<?php echo $row['usdrilltxt']; ?>">
            </div>

            <div class="col-sm-12 col-md-12 col-lg-1 "></div>
            <div class="col-sm-12 col-md-12 col-lg-2">
               <p class="newline"><p>
              <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" name="chkusagebreak" id="chkusagebreak" >
                <label class="form-check-label" for="chkusagebreak">
                  ทะลุ
                </label>
              </div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-2">
               <p class="newline"><p>
              <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" name="chkusagebreak" id="chkusagentbreak" >
                <label class="form-check-label" for="chkusagentbreak">
                  ไม่ทะลุ
                </label>
              </div>
            </div>
          </div>

          <div class="form-group row align-items-center">
            <div class="col-sm-12 col-md-12 col-lg-3 padt">
              <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="chkusagebite" >
                <label class="form-check-label" for="chkusagebite">
                  กัด ความลึกกัดด้านข้าง:
                </label>
              </div>
            </div>         
            <div class="col-sm-12 col-md-12 col-lg-3">
                <input  type="text"   class="form-control" id="txtusagebite" name="txtusagebite"  value="<?php echo $row['usbitetxt']; ?>">
            </div>

            <div class="col-sm-12 col-md-12 col-lg-1 "></div>
            <div class="col-sm-12 col-md-12 col-lg-2">
               <p class="newline"><p>
              <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="chkusagescoop" >
                <label class="form-check-label" for="chkusagescoop">
                   คว้าน ความลึกคว้าน:
                </label>
              </div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-3">
                <input  type="text"   class="form-control" id="txtusagescoop" name="txtusagescoop"  value="<?php echo $row['usscooptxt']; ?>">
            </div>
          </div>


          <div class="form-group row align-items-center">
            <div class="col-sm-12 col-md-12 col-lg-3 padt">
              <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="chkusagelathe" >
                <label class="form-check-label" for="chkusagelathe">
                  กลึง ความลึกกลึง:
                </label>
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3">
                <input  type="text"   class="form-control" id="txtusagelathe" name="txtusagelathe"  value="<?php echo $row['uslathetxt']; ?>">
            </div>
            <div class="col-sm-12 col-md-12 col-lg-1 "></div>
            <div class="col-sm-12 col-md-12 col-lg-2">
               <p class="newline"><p>
              <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="chkusageother" >
                <label class="form-check-label" for="chkusageother">
                   อื่นๆ:
                </label>
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3">
                <input  type="text"   class="form-control" id="txtusageother" name="txtusageother" value="<?php echo $row['usothertxt']; ?>" >
            </div>
          </div>

          <br>

          <div class="form-group row">
            <label class="col-form-label">Drawing Attach File 1:</label>
            <div class="col-sm-12 col-md-12 col-lg-5">
              <div class="input-group">
                <span   id="txtfupload1" class="form-control"><?php echo $row['fileupload1']; ?></span>
                <span class="input-group-btn">
                  <span class="btn btn-primary" onclick="$(this).parent().find('input[type=file]').click();">Browse</span>
                  <input  name="fupload1" id="fupload1" accept=".jpg,.png,.doc,.docx,application/pdf,.sldprt ,.sldasm ,.slddrw ,.slddrt" style="display: none;" type="file">
                </span>
              </div>
            </div>
          </div>


          <div class="form-group row">
            <label class="col-form-label">Drawing Attach File 2:</label>
            <div class="col-sm-12 col-md-12 col-lg-5">
              <div class="input-group">
                <span  id="txtfupload2" class="form-control"><?php echo $row['fileupload2']; ?></span>
                <span class="input-group-btn">
                  <span class="btn btn-primary" onclick="$(this).parent().find('input[type=file]').click();">Browse</span>
                  <input  name="fupload2" id="fupload2" accept=".jpg,.png,.doc,.docx,application/pdf,.sldprt ,.sldasm ,.slddrw ,.slddrt" style="display: none;" type="file">
                </span>
              </div>
            </div>
          </div>


          <div class="form-group row">
            <label class="col-form-label">Drawing Attach File 3:</label>
            <div class="col-sm-12 col-md-12 col-lg-5">
              <div class="input-group">
                <span  id="txtfupload3" class="form-control"><?php echo $row['fileupload3']; ?></span>
                <span class="input-group-btn">
                  <span class="btn btn-primary" onclick="$(this).parent().find('input[type=file]').click();">Browse</span>
                  <input  name="fupload3" id="fupload3" accept=".jpg,.png,.doc,.docx,application/pdf,.sldprt ,.sldasm ,.slddrw ,.slddrt" style="display: none;" type="file" >
                </span>
              </div>
            </div>
          </div>




        <div class="form-group">
          <label for="description">More Description</label>
          <textarea class="form-control rounded-0" id="txtdes" name="txtdes" rows="5"  ><?php echo $row['description']; ?></textarea>
        </div>

        <br>
        <div class="form-group row">
              <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">ชื่อ:</label>
                <div class="col-sm-12 col-md-12 col-lg-3">
                  <input type="text"  class="form-control" id="txtfname" name="txtfname" value="<?php echo $row['fristname']; ?>"  >
                </div>

                <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">นามสกุล:</label>
                <div class="col-sm-12 col-md-12 col-lg-3">
                  <input type="text"  class="form-control" id="txtlname" name="txtlname" value="<?php echo $row['lastname']; ?>" >
                </div>

               
         </div> 

         <div class="form-group row">
              <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">ชื่อบริษัท</label>
                <div class="col-sm-12 col-md-12 col-lg-3">
                  <input type="text"  class="form-control" id="txtcompanyname" name="txtcompanyname" value="<?php echo $row['companyname']; ?>"  >
                </div>

                <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">ที่อยู่</label>
                <div class="col-sm-12 col-md-12 col-lg-3">
                  <input type="text"  class="form-control" id="txtaddress" name="txtaddress" value="<?php echo $row['address']; ?>"  >
                </div>

                <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">ถนน</label>
                <div class="col-sm-12 col-md-12 col-lg-3">
                  <input type="text"  class="form-control" id="txtroad" name="txtroad"  value="<?php echo $row['road'];?>"  >
                </div>
         </div> 

         <div class="form-group row">
              <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">จังหวัด</label>
                <div class="col-sm-12 col-md-12 col-lg-3">
                  <input type="text"  class="form-control" id="txtprovinces" name="txtprovinces" value="<?php echo $row['province'];?>"   >
                </div>

                <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">อำเภอ</label>
                <div class="col-sm-12 col-md-12 col-lg-3">
                  <input type="text"  class="form-control" id="txtamphures" name="txtamphures" value="<?php echo $row['amphur'];?>" >
                </div>

                <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">ตำบล</label>
                <div class="col-sm-12 col-md-12 col-lg-3">
                  <input type="text"  class="form-control" id="txtdistricts" name="txtdistricts" value="<?php echo $row['tambon'];?>"  >
                </div>
         </div> 

         
         <div class="form-group row">
              <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">รหัสไปรษณีย์</label>
                <div class="col-sm-12 col-md-12 col-lg-3">
                  <input type="text"  class="form-control" id="txtzipcode" name="txtzipcode" value="<?php echo $row['postcode'];?>"   >
                </div>

                <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">อีเมล</label>
                <div class="col-sm-12 col-md-12 col-lg-3">
                  <input type="text"  class="form-control" id="txtemail" name="txtemail" value="<?php echo $row['email'];?>"  >
                </div>

                <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">เบอร์โทร:</label>
                <div class="col-sm-12 col-md-12 col-lg-3">
                  <input type="text"  class="form-control" id="txtphone" name="txtphone" value="<?php echo $row['tel'];?>"  >
                </div>
         </div> 


        <hr>

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