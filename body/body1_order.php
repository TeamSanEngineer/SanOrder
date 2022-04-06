<?php
  
   
    $numofteeth = false;
    if($_GET['type'] == "drill") {
      $sanimg = "drill.png";
      $sanhome = "drill.jpg";
    }
    elseif($_GET['type'] == "endmill" ){
      $sanimg = "endmill.png";
      $sanhome = "endmill.jpg";
      $numofteeth = true;
    }
    elseif($_GET['type'] == "bite" ){
      $sanimg = "bite.png";
      $sanhome = "bite.png";
      $numofteeth = true;
    }
    elseif($_GET['type'] == "part" ){
      $sanimg = "part.png";
      $sanhome = "part.jpg";
      $numofteeth = true;
    }
    elseif($_GET['type'] == "reamer" ){
      $sanimg = "reamer.png";
      $numofteeth = true;
    }
    elseif($_GET['type'] == "cutter" ) {
      $sanimg = "cutter.png";
      $sanhome = "cutter.jpg";
      $numofteeth = true;
    }
    elseif($_GET['type'] == "insert" ){
      $sanimg = "insert.png";
      $sanhome = "insert.jpg";
      $numofteeth = true;
    }
    elseif($_GET['type'] == "other" ){
      $sanimg = "other.png";
      $sanhome = "other.jpg";
      $numofteeth = true;
    }
    else{
        http_response_code(404);
        include('my_404.php'); 
        die();
    }
    $userid = $userlevel = $fristname = $lastname = "";
    if (isset($_SESSION["UserID"]))
    { 
      $userid =  $_SESSION["UserID"];
      $fristname = $_SESSION["Fristname"];
      $lastname = $_SESSION["Lastname"];
      
      $queryuser = "SELECT * FROM a_user WHERE userid = '".$_SESSION["UserID"]."' ";
      $resultuser = mysqli_query($con,$queryuser);
      $row = mysqli_fetch_array($resultuser);
    }
    
    

  
    
   
?>
<div class="loading">Loading&#8230;</div>
<form  id="form1" name="form1" method="post" >
<section>
      <div class="container">
          <div class="text-center">
             <img src="images/home/<?php echo $sanhome  ?>" class="rounded img-fluid border border-dark" >
          </div>

          
         <div class="d-flex justify-content-center" >
          <p>
            <h2>
                 <?php 
                  if($_GET['type'] == "other")
                  {
                    echo "Special Cutting Tool";
                  }else{
                     echo strtoupper($_GET['type']);
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
                   if ($result->num_rows > 0) {
                        $x = 1 ;
                  while($rowimg = $result->fetch_assoc()) {
                  ?> 
                      
                      <figure class="list-group-item list-group-item-action text-center "  data-toggle="list" onClick="imagedraw('<?php echo $rowimg["imgid"];?>')">
                              <img src="images/mattype/<?php echo $rowimg["name"]; ?>" alt="x" >
                              <figcaption><?php echo $rowimg["description"]; ?></figcaption>
                          </figure>
                      <?php 
                        $x++;
                        }
                  }
                  mysqli_close($con);
                  ?>
        </div>
       
        <br>
          <div  id="imgdraw" class="row">
          </div>

        
        <br>
        <hr>
        <div class="form-group row">
            <label  class="col-sm-12 col-md-12 col-lg-2 col-form-label ">Measure:</label> 
        </div>

        <div class="form-group row mx-md-n5">
            <label class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright mb-3 diameterhead">d1:</label>
            <div class="col-sm-12 col-md-12 col-lg-3 input-group mb-3 diameterhead">
              <input type="number" min="0" max="100"   class="form-control" id="txtdiameterhead"  name="txtdiameterhead"  >
              <div class="input-group-append ">
                <span class="input-group-text">mm.</span>
              </div>
            </div>
            
            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright mb-3 diameterbase">D1:</label>
            <div class="col-sm-12 col-md-12 col-lg-3 input-group mb-3 diameterbase">
              <input type="number"  class="form-control" id="txtdiameterbase" min="0" max="100" name="txtdiameterbase"  >
              <div class="input-group-append">
                <span class="input-group-text" >mm.</span>
              </div>
            </div>

            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright mb-3 clength">C.L.:</label>
            <div class="col-sm-12 col-md-12 col-lg-3 input-group mb-3 clength">
              <input type="number"  class="form-control" id="txtclength" name="txtclength"  min="0" max="160" >
              <div class="input-group-append">
                <span class="input-group-text" >mm.</span>
              </div>
            </div>     

            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright mb-3 flength">F.L.:</label>
            <div class="col-sm-12 col-md-12 col-lg-3 input-group mb-3 flength">
              <input type="number"  class="form-control" id="txtflength" name="txtflength"  min="0" max="160" >
              <div class="input-group-append">
                <span class="input-group-text">mm.</span>
              </div>
            </div>     
            
            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright mb-3 length">L:</label>
            <div class="col-sm-12 col-md-12 col-lg-3 input-group mb-3 length">
              <input type="number"  class="form-control" id="txtlength" name="txtlength" min="0" max="300" >
              <div class="input-group-append">
                <span class="input-group-text" >mm.</span>
              </div>
            </div>

            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright mb-3 lengthead">L1:</label>
            <div class="col-sm-12 col-md-12 col-lg-3 input-group mb-3 lengthead">
              <input type="number"  class="form-control" id="txtlengthead" name="txtlengthead" min="0" max="300" >
              <div class="input-group-append">
                <span class="input-group-text" >mm.</span>
              </div>
            </div>

            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright mb-3 radius">R1:</label>
            <div class="col-sm-12 col-md-12 col-lg-3 input-group mb-3 radius">
              <input type="number"  class="form-control" id="txtradius" name="txtradius" min="0" max="300" >
              <div class="input-group-append">
                <span class="input-group-text" >mm.</span>
              </div>
            </div>
            
            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright mb-3 thread" >Tr:</label>
            <div class="col-sm-12 col-md-12 col-lg-3 input-group mb-3 thread">
              <input type="number"  class="form-control" id="txtthread" name="txtthread" min="0" max="300" >
              <div class="input-group-append">
                <span class="input-group-text" >mm.</span>
              </div>
            </div>

            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright mb-3 angle">Angle:</label>
            <div class="col-sm-12 col-md-12 col-lg-3 input-group mb-3 angle">
              <input type="number"  class="form-control" id="txtangle" name="txtangle" min="0" max="60" >
              <div class="input-group-append">
                <span class="input-group-text" >°</span>
              </div>
            </div>
        </div>
          
          <p>D1 --> min-max (0-100)  </p>
          <hr>
        <div class="form-group row">
            <label  class="col-sm-12 col-md-12 col-lg-2 col-form-label ">คุณสมบัติ:</label> 
        </div>
        <div class="form-group row">
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
            <?php if ($numofteeth == true) { ?>
              <label  class="col-sm-12 col-md-12 col-lg-2 col-form-label labelright pt-3">Number of Teeth:</label>
              <div class="col-sm-12 col-md-12 col-lg-1 pt-2">
                <input type="number"  class="form-control" id="numofteeth" name="numofteeth"  min="1" max="8"  >
              </div>
              <!-- <br class="newline"> -->
              <div class="col-sm-12 col-md-12 col-lg-9">
                  <div class="form-group row">
                      <div class="col-sm-12 col-md-12 col-lg-2 mb-3">
                        <img id="imageId1" class="img-thumbnail mb-3" src="images/40x40.png">
                      </div>
                      <div class="col-sm-12 col-md-12 col-lg-2 mb-3">
                        <img id="imageId2" class="img-thumbnail" src="images/40x40.png">
                      </div>
                      <div class="col-sm-12 col-md-12 col-lg-2 mb-3">
                        <img id="imageId3"  class="img-thumbnail" src="images/40x40.png">
                      </div>
                      <div class="col-sm-12 col-md-12 col-lg-2 mb-3">
                        <img id="imageId4" class="img-thumbnail"  src="images/40x40.png">
                      </div>
                      <div class="col-sm-12 col-md-12 col-lg-2 mb-3">
                        <img id="imageId5" class="img-thumbnail"  src="images/40x40.png">
                      </div>
                      <div class="col-sm-12 col-md-12 col-lg-2 mb-3">
                        <img id="imageId6" class="img-thumbnail" src="images/40x40.png">
                      </div>
                  </div>
              </div>
            <?php } ?>
          
          </div>

          <div class="form-group row justify-content-end">
               <label  class="col-sm-12 col-md-12 col-lg-2 col-form-label labelright">Work Material:</label>
            <div class="col-sm-12 col-md-12 col-lg-3">
              <input type="text"  class="form-control" id="txtworkmaterial" name="txtworkmaterial"  >
            </div>
            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label">Machine:</label>
              <div class="col-sm-12 col-md-12 col-lg-3">
              <select name="slcmachine" id="slcmachine" class="form-select form-control" >
                <option value="" hidden selected>Select menu</option>
                <option value="NC Lathe">NC Lathe</option>
                <option value="Machinning Center">Machinning Center</option>
                <option value="CNC Lathe">CNC Lathe</option>
                <option value="Other">Other</option>
              </select>
              <input type="text"  class="form-control" id="txtmachine" name="txtmachine"  style="display:none;">
            </div>

            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label">QUANTITY:</label>
              <div class="col-sm-12 col-md-12 col-lg-2">
                <input  type="number"  min="1"  class="form-control" id="txtqua" name="txtqua" value="1" >
            </div>
          </div>

      

          <!-- <br> -->
          <hr>
          <div class="form-group row">
            <label  class="col-sm-12 col-md-12 col-lg-2 col-form-label ">ลักษณะการใช้งาน:</label> 
          </div>

        <div class="form-group row align-items-center">
            <div class="col-sm-12 col-md-12 col-lg-3 padt">
              <div class="form-check mb-3 ">
                <input class="form-check-input" type="checkbox" id="chkusagedrill" >
                <label class="form-check-label" for="chkusagedrill">
                  เจาะ ความลึกเจาะ:
                </label>
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3">
                <input  type="text"   class="form-control" id="txtusagedrill" name="txtusagedrill" readonly>
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
                <input class="form-check-input" type="checkbox" name="chkusagebreak" id="chkusagentbreak" value="false">
                <label class="form-check-label" for="chkusagentbreak">
                  ไม่ทะลุ
                </label>
              </div>
            </div>
          </div>

          <div class="form-group row align-items-center">
            <div class="col-sm-12 col-md-12 col-lg-3 padt">
              <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="chkusagebite">
                <label class="form-check-label" for="chkusagebite">
                  กัด ความลึกกัดด้านข้าง:
                </label>
              </div>
            </div>         
            <div class="col-sm-12 col-md-12 col-lg-3">
                <input  type="text"   class="form-control" id="txtusagebite" name="txtusagebite" readonly>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-1 "></div>
            <div class="col-sm-12 col-md-12 col-lg-2">
               <p class="newline"><p>
              <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="chkusagescoop">
                <label class="form-check-label" for="chkusagescoop">
                   คว้าน ความลึกคว้าน:
                </label>
              </div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-3">
                <input  type="text"   class="form-control" id="txtusagescoop" name="txtusagescoop" readonly>
            </div>
          </div>


          <div class="form-group row align-items-center">
            <div class="col-sm-12 col-md-12 col-lg-3 padt">
              <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="chkusagelathe">
                <label class="form-check-label" for="chkusagelathe">
                  กลึง ความลึกกลึง:
                </label>
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3">
                <input  type="text"   class="form-control" id="txtusagelathe" name="txtusagelathe" readonly>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-1 "></div>
            <div class="col-sm-12 col-md-12 col-lg-2">
               <p class="newline"><p>
              <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="chkusageother">
                <label class="form-check-label" for="chkusageother">
                   อื่นๆ:
                </label>
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3">
                <input  type="text"   class="form-control" id="txtusageother" name="txtusageother" readonly>
            </div>
          </div>

          <!-- <br> -->
          <div class="form-group row">
            <label  class="col-sm-12 col-md-12 col-lg-2 col-form-label">ลักษณะการจ่ายหล่อเย็น:</label>
              <div class="col-sm-12 col-md-12 col-lg-2">
                <select name="slccoolant" id="slccoolant" class="form-select form-control" >
                  <option value="เจาะแห้ง"  selected>เจาะแห้ง</option>
                  <option value="จ่ายภายนอก">จ่ายภายนอก</option>
                  <option value="จ่ายภายใน">จ่ายภายใน</option>
                </select>
            </div>
          </div>


          <hr>
          <div class="form-group row">
            <label class="col-form-label">Drawing Attach File 1:</label>
            <div class="col-sm-12 col-md-12 col-lg-5">
              <div class="input-group">
                <span  id="txtfupload1" class="form-control"></span>
                <span class="input-group-btn">
                  <span class="btn btn-primary" onclick="$(this).parent().find('input[type=file]').click();">Browse</span>
                  <input  name="fupload1" id="fupload1"  accept=".jpg,.png,.doc,.docx,application/pdf,.sldprt ,.sldasm ,.slddrw ,.slddrt" style="display: none;" type="file">
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
                  <input name="fupload2" id="fupload2"  accept=".jpg,.png,.doc,.docx,application/pdf,.sldprt ,.sldasm ,.slddrw ,.slddrt" style="display: none;" type="file">
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
                  <input name="fupload3" id="fupload3"  accept=".jpg,.png,.doc,.docx,application/pdf,.sldprt ,.sldasm ,.slddrw ,.slddrt" style="display: none;" type="file">
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
              <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">ชื่อ:</label>
                <div class="col-sm-12 col-md-12 col-lg-3">
                  <input type="text"  class="form-control" id="txtfname" name="txtfname" value="<?php echo $fristname; ?>"  >
                </div>

                <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">นามสกุล:</label>
                <div class="col-sm-12 col-md-12 col-lg-3">
                  <input type="text"  class="form-control" id="txtlname" name="txtlname" value="<?php echo $lastname; ?>" >
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
                  <input type="text"  class="form-control" id="txtphone" name="txtphone" value="<?php echo $row['phone'];?>"  >
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
                  <button type="button" class="btn btn-danger " id="txtback" onclick="window.location='index.php';" >Back Home</button>
                </div> 
        </div> 

        <!-- END -->
      </div>
      
</section>
</form>