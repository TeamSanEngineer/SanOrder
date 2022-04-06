<?php
    $userid = $userlevel = $fristname = $lastname =  "";
    $diameter= $diameter2 = $flength = $length = $quality = $description = $tel = $denti = 0;
    $sandatatype = "";
    $numofteeth = false;
   
       
    if (isset($_SESSION["UserID"]))
    { 
      $userid =  $_SESSION["UserID"];
    }

 

    $sql = "SELECT * FROM a_san_order WHERE orderid = '".$_GET['id']."' AND type = '".$_GET['type']."' ";

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
          $sanhome = "bite.png";
          $numofteeth = true;
        }
        elseif($sandatatype == "part" ){
          $sanimg = "part.png";
          $sanhome = "part.jpg";
          $numofteeth = true;
        }
        elseif($sandatatype == "reamer" ){
          $sanimg = "reamer.png";
          $numofteeth = true;
        }
        elseif($sandatatype == "cutter" ) {
          $sanimg = "cutter.png";
          $sanhome = "cutter.jpg";
          $numofteeth = true;
        }
        elseif($sandatatype == "insert" ){
          $sanimg = "insert.png";
          $sanhome = "insert.jpg";
          $numofteeth = true;
        }
        elseif($sandatatype == "other" ){
          $sanimg = "other.png";
          $sanhome = "other.jpg";
          $numofteeth = true;
        }
    } 
    else{
      http_response_code(404);
      include('my_404.php'); 
      die();
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
             <img src="images/home/<?php echo $sanhome  ?>" class="rounded rounded img-fluid border border-dark" >
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

                      // $imgcurrent = "";
                   if ($result->num_rows > 0) {
                        $x = 1 ;
                  while($rowimg = $result->fetch_assoc()) {
                        // $new = array_push($phpArray, $rowimg["getimg"]);
                      
                      if($row['imgid'] == $rowimg["imgid"]){
                        // $imgcurrent = $rowimg["getimg"];
                        ?> 
                        
                       <a class="list-group-item list-group-item-action text-center active"  >
                        <img src="images/mattype/<?php echo $rowimg["name"]; ?>" class="rounded"   >
                       </a>
                      
                  <?php }else{ ?>
                        
                          <a class="list-group-item list-group-item-action text-center disabled"   >
                            <img src="images/mattype/<?php echo $rowimg["name"]; ?>" class="rounded"   >
                          </a>
                      <?php 
                          }
                        $x++;
                        }
                  }
                  ?>
         </div>
            
         <?php 
            $sql = "SELECT * FROM a_measure WHERE imgid = '".$row['imgid']."' AND subid = '".$row['subid']."' ";
            $resultsubimg = mysqli_query($con, $sql);
        
            if(mysqli_num_rows($resultsubimg) == 1)
            {
                $rowsubimg = mysqli_fetch_assoc($resultsubimg);
                $diameterhead = $rowsubimg['diameterhead'] ;
                $diameterbase = $rowsubimg['diameterbase'] ;
                $radius       = $rowsubimg['radius'] ;
                $thread       = $rowsubimg['thread'] ;
                $clength      = $rowsubimg['clength'] ;
                $length       = $rowsubimg['length'] ;
                $lengthead    = $rowsubimg['lengthead'] ;
                $flength      = $rowsubimg['flength'] ;
                $angle        = $rowsubimg['angle'] ;
            }
            mysqli_close($con);
         ?>
         
          <div  id="imgdraw" class="text-center">
                  <br>
                  <img src="images/datatype/<?php echo $rowsubimg['namemeasure'];  ?>" class="rounded img-fluid border border-dark" >
          </div>
          <br>
          <hr>
        <div class="form-group row">
            <label  class="col-sm-12 col-md-12 col-lg-2 col-form-label ">Measure:</label> 
        </div>

          <div class="form-group row mx-md-n5">
            <label class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright mb-3 diameterhead">d1:</label>
            <div class="col-sm-12 col-md-12 col-lg-3 input-group mb-3 diameterhead">
              <input readonly type="text"  class="form-control" id="txtdiameterhead"  name="txtdiameterhead"  value="<?php echo $row['diameterhead']; ?>"   >
              <div class="input-group-append ">
                <span class="input-group-text">mm.</span>
              </div>
            </div>
            
            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright mb-3 diameterbase">D1:</label>
            <div class="col-sm-12 col-md-12 col-lg-3 input-group mb-3 diameterbase">
              <input readonly type="text"  class="form-control" id="txtdiameterbase"  name="txtdiameterbase" value="<?php echo $row['diameterbase']; ?>"  >
              <div class="input-group-append">
                <span class="input-group-text" >mm.</span>
              </div>
            </div>

            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright mb-3 clength">C.L.:</label>
            <div class="col-sm-12 col-md-12 col-lg-3 input-group mb-3 clength">
              <input readonly type="text"  class="form-control" id="txtclength" name="txtclength"  value="<?php echo $row['clength']; ?>" >
              <div class="input-group-append">
                <span class="input-group-text" >mm.</span>
              </div>
            </div>     

            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright mb-3 flength">F.L.:</label>
            <div class="col-sm-12 col-md-12 col-lg-3 input-group mb-3 flength">
              <input readonly type="text"  class="form-control" id="txtflength" name="txtflength" value="<?php echo $row['flength']; ?>"  >
              <div class="input-group-append">
                <span class="input-group-text">mm.</span>
              </div>
            </div>     
            
            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright mb-3 length">L:</label>
            <div class="col-sm-12 col-md-12 col-lg-3 input-group mb-3 length">
              <input readonly type="text"  class="form-control" id="txtlength" name="txtlength" value="<?php echo $row['length']; ?>" >
              <div class="input-group-append">
                <span class="input-group-text" >mm.</span>
              </div>
            </div>

            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright mb-3 lengthead">L1:</label>
            <div class="col-sm-12 col-md-12 col-lg-3 input-group mb-3 lengthead">
              <input readonly type="text"  class="form-control" id="txtlengthead" name="txtlengthead" value="<?php echo $row['lengthhead']; ?>" >
              <div class="input-group-append">
                <span class="input-group-text" >mm.</span>
              </div>
            </div>

            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright mb-3 radius">R1:</label>
            <div class="col-sm-12 col-md-12 col-lg-3 input-group mb-3 radius">
              <input readonly type="text"  class="form-control" id="txtradius" name="txtradius"  value="<?php echo $row['radius']; ?>"  >
              <div class="input-group-append">
                <span class="input-group-text" >mm.</span>
              </div>
            </div>
            
            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright mb-3 thread" >Tr:</label>
            <div class="col-sm-12 col-md-12 col-lg-3 input-group mb-3 thread">
              <input readonly type="text"  class="form-control" id="txtthread" name="txtthread" value="<?php echo $row['thread']; ?>" >
              <div class="input-group-append">
                <span class="input-group-text" >mm.</span>
              </div>
            </div>

            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright mb-3 angle">Angle:</label>
            <div class="col-sm-12 col-md-12 col-lg-3 input-group mb-3 angle">
              <input readonly type="text"  class="form-control" id="txtangle" name="txtangle" value="<?php echo $row['angle']; ?>" >
              <div class="input-group-append">
                <span class="input-group-text" >°</span>
              </div>
            </div>
        </div>
          <br>

          <p>D1 --> min-max (0-100)  </p>
          <hr>
        <div class="form-group row">
            <label  class="col-sm-12 col-md-12 col-lg-2 col-form-label ">คุณสมบัติ:</label> 
        </div>
        <div class="form-group row">
             <label class="col-sm-12 col-md-12 col-lg-2 col-form-label labelright">HELIX:</label>
            <div class="col-sm-12 col-md-12 col-lg-3">
            <input  readonly type="text"  class="form-control" id="slchelix"  name="slchelix" value="<?php echo $row['helix']; ?>"  >
            </div>

            <label  class="col-sm-12 col-md-12 col-lg-2 col-form-label labelright">Tool Material:</label>
            <div class="col-sm-12 col-md-12 col-lg-3">
            <input  readonly type="text"  class="form-control" id="slcmaterial"  name="slcmaterial" value="<?php echo  $row['toolmaterial'];  ?>"  >
            </div>
        </div>

        <div class="form-group row">
            <label  class="col-sm-12 col-md-12 col-lg-2 col-form-label labelright">Tool Material:</label>
              <div class="col-sm-12 col-md-12 col-lg-3">
              <input  readonly type="text"  class="form-control" id="slcmaterial"  name="slcmaterial" value="<?php echo  $row['toolmaterial'];  ?>"  >
            </div>
            <label  class="col-sm-12 col-md-12 col-lg-2 col-form-label labelright">Coating Type:</label>
              <div class="col-sm-12 col-md-12 col-lg-3">
              <input  readonly type="text"  class="form-control" id="slccoating"  name="slccoating" value="<?php echo $row['coating']; ?>"  >
            </div>
        </div>
          
          <div class="form-group row">
              <?php if ($numofteeth == true) { ?>
                <label  class="col-sm-12 col-md-12 col-lg-2 col-form-label labelright">Number of Teeth:</label>
                <div class="col-sm-12 col-md-12 col-lg-1">
                  <input readonly type="text"  class="form-control" id="numofteeth" name="numofteeth"  min="1"  value="<?php echo $row['numteeth'];  ?>" >
                </div>
              <?php } ?>
          </div>

          <div class="form-group row justify-content-end">
             <label  class="col-sm-12 col-md-12 col-lg-2 col-form-label labelright">Work Material:</label>
            <div class="col-sm-12 col-md-12 col-lg-3">
            <input  readonly type="text"  class="form-control" id="txtworkmaterial"  name="txtworkmaterial" value="<?php echo $row['workmaterial']; ?>"  >
            </div>

            <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label">Machine:</label>
                <div class="col-sm-12 col-md-12 col-lg-2">
                  <input  readonly type="text" tye="text" class="form-control" id="txtmachine" name="txtmachine" value="<?php echo $row['machine']; ?>" >
              </div>

              <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label">QUANTITY:</label>
                <div class="col-sm-12 col-md-12 col-lg-2">
                  <input  readonly type="text" tye="text" class="form-control" id="txtqua" name="txtqua" value="<?php echo $row['quality']; ?>" >
              </div>
            </div>

          <div class="form-group row">
            <label  class="col-sm-12 col-md-12 col-lg-2 col-form-label ">ลักษณะการใช้งาน:</label> 
          </div>

        <div class="form-group row align-items-center">
            <div class="col-sm-12 col-md-12 col-lg-3 padt">
              <div class="form-check mb-2 ">
                <input class="form-check-input" type="checkbox" id="chkusagedrill" disabled>
                <label class="form-check-label" for="chkusagedrill">
                  เจาะ ความลึกเจาะ:
                </label>
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3">
                <input  type="text"   class="form-control" id="txtusagedrill" name="txtusagedrill" readonly value="<?php echo $row['usdrilltxt']; ?>">
            </div>

            <div class="col-sm-12 col-md-12 col-lg-1 "></div>
            <div class="col-sm-12 col-md-12 col-lg-2">
               <p class="newline"><p>
              <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" name="chkusagebreak" id="chkusagebreak" disabled>
                <label class="form-check-label" for="chkusagebreak">
                  ทะลุ
                </label>
              </div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-2">
               <p class="newline"><p>
              <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" name="chkusagebreak" id="chkusagentbreak" disabled>
                <label class="form-check-label" for="chkusagentbreak">
                  ไม่ทะลุ
                </label>
              </div>
            </div>
          </div>

          <div class="form-group row align-items-center">
            <div class="col-sm-12 col-md-12 col-lg-3 padt">
              <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="chkusagebite" disabled>
                <label class="form-check-label" for="chkusagebite">
                  กัด ความลึกกัดด้านข้าง:
                </label>
              </div>
            </div>         
            <div class="col-sm-12 col-md-12 col-lg-3">
                <input  type="text"   class="form-control" id="txtusagebite" name="txtusagebite" readonly value="<?php echo $row['usbitetxt']; ?>">
            </div>

            <div class="col-sm-12 col-md-12 col-lg-1 "></div>
            <div class="col-sm-12 col-md-12 col-lg-2">
               <p class="newline"><p>
              <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="chkusagescoop" disabled>
                <label class="form-check-label" for="chkusagescoop">
                   คว้าน ความลึกคว้าน:
                </label>
              </div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-3">
                <input  type="text"   class="form-control" id="txtusagescoop" name="txtusagescoop" readonly value="<?php echo $row['usscooptxt']; ?>">
            </div>
          </div>


          <div class="form-group row align-items-center">
            <div class="col-sm-12 col-md-12 col-lg-3 padt">
              <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="chkusagelathe" disabled>
                <label class="form-check-label" for="chkusagelathe">
                  กลึง ความลึกกลึง:
                </label>
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3">
                <input  type="text"   class="form-control" id="txtusagelathe" name="txtusagelathe" readonly value="<?php echo $row['uslathetxt']; ?>">
            </div>
            <div class="col-sm-12 col-md-12 col-lg-1 "></div>
            <div class="col-sm-12 col-md-12 col-lg-2">
               <p class="newline"><p>
              <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="chkusageother" disabled>
                <label class="form-check-label" for="chkusageother">
                   อื่นๆ:
                </label>
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3">
                <input  type="text"   class="form-control" id="txtusageother" name="txtusageother" value="<?php echo $row['usothertxt']; ?>" readonly>
            </div>
          </div>

          <!-- <br> -->
          <div class="form-group row">
            <label  class="col-sm-12 col-md-12 col-lg-2 col-form-label">ลักษณะการจ่ายหล่อเย็น:</label>
              <div class="col-sm-12 col-md-12 col-lg-2">
              <input readonly type="text"  class="form-control" id="txtcoolant" name="txtcoolant" value="<?php echo $row['coolant']; ?>"  >
            </div>
          </div>



          <div class="form-group row">
            <label class="col-form-label">Drawing Attach File 1:</label>
            <div class="col-sm-12 col-md-12 col-lg-5">
              <div class="input-group">
                <span  id="txtfupload1" class="form-control ronly"><?php echo $row['fileupload1'];?></span>
                <span class="input-group-btn">
                  <?php if($row['fileupload1'] != "") {?>
                        <button id="btndownload1" type="button" class="btn btn-primary" onclick="document.getElementById('linkdownload1').click()"><i class="fa fa-download"></i>Download</button>
                        <a id="linkdownload1" href="doc/<?php echo $row['fileupload1']; ?>" download hidden></a>
                    <?php } ?>
                </span>
              </div>
            </div>
          </div>


          <div class="form-group row">
            <label class="col-form-label">Drawing Attach File 2:</label>
            <div class="col-sm-12 col-md-12 col-lg-5">
              <div class="input-group">
                <span  id="txtfupload2" class="form-control ronly"><?php echo $row['fileupload2']; ?></span>
                <span class="input-group-btn">
                  <?php if($row['fileupload2'] != "") {?>
                      <button id="btndownload2" type="button" class="btn btn-primary" onclick="document.getElementById('linkdownload2').click()"><i class="fa fa-download"></i>Download</button>
                      <a id="linkdownload2" href="doc/<?php echo $row['fileupload2']; ?>" download hidden></a>
                  <?php } ?>
                </span>
              </div>
            </div>
          </div>


          <div class="form-group row">
            <label class="col-form-label">Drawing Attach File 3:</label>
            <div class="col-sm-12 col-md-12 col-lg-5">
              <div class="input-group">
                <span  id="txtfupload3" class="form-control ronly"><?php echo $row['fileupload3']; ?></span>
                <span class="input-group-btn">
                  <?php if($row['fileupload3'] != "") {?>
                      <button id="btndownload3" type="button" class="btn btn-primary" onclick="document.getElementById('linkdownload3').click()"><i class="fa fa-download"></i>Download</button>
                      <a id="linkdownload3" href="doc/<?php echo $row['fileupload3']; ?>" download hidden></a>
                  <?php } ?>
                </span>
              </div>
            </div>
          </div>




        <div class="form-group">
          <label for="description">More Description</label>
          <textarea readonly class="form-control rounded-0" id="txtdes" name="txtdes" rows="5" > <?php echo $row['description']; ?></textarea>
        </div>

        <br>
        <div class="form-group row">
              <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">ชื่อ:</label>
                <div class="col-sm-12 col-md-12 col-lg-3">
                  <input readonly type="text"  class="form-control" id="txtfname" name="txtfname" value="<?php echo $row['fristname']; ?>"  >
                </div>

                <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">นามสกุล:</label>
                <div class="col-sm-12 col-md-12 col-lg-3">
                  <input readonly type="text"  class="form-control" id="txtlname" name="txtlname" value="<?php echo $row['lastname']; ?>" >
                </div>

               
         </div> 

         <div class="form-group row">
              <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">ชื่อบริษัท</label>
                <div class="col-sm-12 col-md-12 col-lg-3">
                  <input readonly type="text"  class="form-control" id="txtcompanyname" name="txtcompanyname" value="<?php echo $row['companyname']; ?>"  >
                </div>

                <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">ที่อยู่</label>
                <div class="col-sm-12 col-md-12 col-lg-3">
                  <input readonly type="text"  class="form-control" id="txtaddress" name="txtaddress" value="<?php echo $row['address']; ?>"  >
                </div>

                <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">ถนน</label>
                <div class="col-sm-12 col-md-12 col-lg-3">
                  <input readonly type="text"  class="form-control" id="txtroad" name="txtroad"  value="<?php echo $row['road'];?>"  >
                </div>
         </div> 

         <div class="form-group row">
              <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">จังหวัด</label>
                <div class="col-sm-12 col-md-12 col-lg-3">
                  <input readonly type="text"  class="form-control" id="txtprovinces" name="txtprovinces" value="<?php echo $row['province'];?>"   >
                </div>

                <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">อำเภอ</label>
                <div class="col-sm-12 col-md-12 col-lg-3">
                  <input readonly type="text"  class="form-control" id="txtamphures" name="txtamphures" value="<?php echo $row['amphur'];?>" >
                </div>

                <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">ตำบล</label>
                <div class="col-sm-12 col-md-12 col-lg-3">
                  <input readonly type="text"  class="form-control" id="txtdistricts" name="txtdistricts" value="<?php echo $row['tambon'];?>"  >
                </div>
         </div> 

         
         <div class="form-group row">
              <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">รหัสไปรษณีย์</label>
                <div class="col-sm-12 col-md-12 col-lg-3">
                  <input readonly type="text"  class="form-control" id="txtzipcode" name="txtzipcode" value="<?php echo $row['postcode'];?>"   >
                </div>

                <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">อีเมล</label>
                <div class="col-sm-12 col-md-12 col-lg-3">
                  <input readonly type="text"  class="form-control" id="txtemail" name="txtemail" value="<?php echo $row['email'];?>"  >
                </div>

                <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright">เบอร์โทร:</label>
                <div class="col-sm-12 col-md-12 col-lg-3">
                  <input readonly type="text"  class="form-control" id="txtphone" name="txtphone" value="<?php echo $row['tel'];?>"  >
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

                <div class="col-sm-12 col-md-12 col-lg-2">
                  <p class="newline"><p>
                  <button type="button" class="btn btn-danger " id="txtback" onclick="window.location='displayorder.php';" >Back Show</button>
                </div> 
        </div> 

        <!-- END -->
      </div>
      
</section>
</form>