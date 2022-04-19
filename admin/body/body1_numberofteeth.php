<div class="loading">Loading&#8230;</div>
<form  id="form1" name="form1" method="post"  enctype='multipart/form-data' >
<section>
      <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12  col-md-6 col-lg-3 col-xs-3 ">
                            <figure class="figure">
                            <!-- <a href="menuimg.php"> -->
                                <img  src="../images/home/endmill.jpg"class="figure-img img-fluid rounded border border-dark imgtransparent" alt="Drill">
                            <!-- </a> -->
                                <figcaption class="figure-caption text-center"><h6>
                                    <a >เพิ่ม IMG Number of Teeth</a>
                                </h6>
                            </figcaption>
                            </figure>
                </div>
            </div>
            <!-- <br> -->
            <hr>
       
          <!-- HEADER -->
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-12  col-md-6 col-lg-2 col-xs-2 col-form-label">IMG TYPE</label>
                <div class="col-sm-12  col-md-6 col-lg-4 col-xs-4">
                <select id="imgtype" name="imgtype" class="form-select form-control" >
                    <option value="" hidden selected>Open this select menu</option>
                        <option value="drl">Drill</option>
                        <option value="enm">Endmill</option>
                        <option value="bit">Bite</option>
                        <option value="par">Part</option>
                        <option value="rea">Reamer</option>
                        <option value="cut">Cutter</option>
                        <option value="ins">Insert</option>
                        <!-- <option value="otr">Other</option> -->
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12  col-md-6 col-lg-2 col-xs-2 col-form-label">IMG ID</label>
                <div class="col-sm-12  col-md-6 col-lg-4 col-xs-4">
                      <select id="imgid" name="imgid" class="form-select form-control" >
                      </select> 
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12  col-md-6 col-lg-2 col-xs-2 col-form-label">IMG SUB ID</label>
                <div class="col-sm-12  col-md-6 col-lg-4 col-xs-4">
                      <input readonly type="text" class="form-control" id="imgsubid" name="imgsubid" >
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12  col-md-6 col-lg-2 col-xs-2 col-form-label">IMG Upload:</label>
                <div class="col-sm-12  col-md-6 col-lg-4 col-xs-4">
                <div class="input-group">
                    <span  id="txtfupload1" class="form-control"></span>
                    <span class="input-group-btn">
                    <span class="btn btn-primary" onclick="$(this).parent().find('input[type=file]').click();">Browse</span>
                    <input  name="fupload1" id="fupload1"  accept=".jpg,.png" style="display: none;"   type="file">
                    <button class="btn btn-primary" type="button" onclick='uploadrest(1)' >Reset</button>
                    </span>
                </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12  col-md-6 col-lg-6 col-xs-6 col-form-label">** IMG ID ที่ทำการ Disable Massure จะไม่แสดงออกมา</label>
            </div>
            <!-- <hr>
                <div class="form-group row" >
                    <label  class="col-sm-12 col-md-12 col-lg-2 col-form-label ">Preview IMG:</label> 
                </div>
              <img id="frame" src="#" alt="your image" width="500px" height="250px" /> -->
            <!-- <hr> -->

            <!-- <div id="measure">
                <div class="form-group row" >
                    <label  class="col-sm-12 col-md-12 col-lg-2 col-form-label ">Measure:</label> 
                </div>
                <div  class="form-group row mx-md-n5 gethidden" >
                    <label class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright mb-3 diameterhead">d1:</label>
                    <div class="col-sm-12 col-md-12 col-lg-3 input-group mb-3 diameterhead">
                    <select disabled id="slcdiameterhead" name="slcdiameterhead" class="form-select form-control" >
                        <option value="" hidden selected>Open this select menu</option>
                        <option value="true">true</option>
                        <option value="false">false</option>
                    </select>
                   
                    </div>

                    <label class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright mb-3 diameterhead2">d2:</label>
                    <div class="col-sm-12 col-md-12 col-lg-3 input-group mb-3 diameterhead2">
                    <select disabled id="slcdiameterhead2" name="slcdiameterhead2" class="form-select form-control" >
                        <option value="" hidden selected>Open this select menu</option>
                        <option value="true">true</option>
                        <option value="false">false</option>
                    </select>
                   
                    </div>
                    
                    <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright mb-3 diameterbase">D1:</label>
                    <div class="col-sm-12 col-md-12 col-lg-3 input-group mb-3 diameterbase">
                    <select disabled id="slcdiameterbase" name="slcdiameterbase" class="form-select form-control" >
                        <option value="" hidden selected>Open this select menu</option>
                        <option value="true">true</option>
                        <option value="false">false</option>
                    </select>
                   
                    </div>

                    <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright mb-3 diameterbase2">D2:</label>
                    <div class="col-sm-12 col-md-12 col-lg-3 input-group mb-3 diameterbase2">
                    <select disabled id="slcdiameterbase2" name="slcdiameterbase2" class="form-select form-control" >
                        <option value="" hidden selected>Open this select menu</option>
                        <option value="true">true</option>
                        <option value="false">false</option>
                    </select>
                   
                    </div>

                    <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright mb-3 clength">C.L.:</label>
                    <div class="col-sm-12 col-md-12 col-lg-3 input-group mb-3 clength">
                    <select disabled id="slcclength" name="slcclength" class="form-select form-control" >
                        <option value="" hidden selected>Open this select menu</option>
                        <option value="true">true</option>
                        <option value="false">false</option>
                    </select>
                   
                    </div>     

                    <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright mb-3 flength">F.L.:</label>
                    <div class="col-sm-12 col-md-12 col-lg-3 input-group mb-3 flength">
                    <select disabled id="slcflength" name="slcflength" class="form-select form-control" >
                        <option value="" hidden selected>Open this select menu</option>
                        <option value="true">true</option>
                        <option value="false">false</option>
                    </select>
                    
                    </div>     
                    
                    <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright mb-3 length">L:</label>
                    <div class="col-sm-12 col-md-12 col-lg-3 input-group mb-3 length">
                   <select disabled id="slclength" name="slclength" class="form-select form-control" >
                        <option value="" hidden selected>Open this select menu</option>
                        <option value="true">true</option>
                        <option value="false">false</option>
                    </select>
                   
                    </div>

                    <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright mb-3 lengthead">L1:</label>
                    <div class="col-sm-12 col-md-12 col-lg-3 input-group mb-3 lengthead">
                    <select disabled id="slclengthead" name="slclengthead" class="form-select form-control" >
                        <option value="" hidden selected>Open this select menu</option>
                        <option value="true">true</option>
                        <option value="false">false</option>
                    </select>
                   
                    </div>

                    
                    <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright mb-3 lengthead2">L2:</label>
                    <div class="col-sm-12 col-md-12 col-lg-3 input-group mb-3 lengthead2">
                    <select disabled id="slclengthead2" name="slclengthead2" class="form-select form-control" >
                        <option value="" hidden selected>Open this select menu</option>
                        <option value="true">true</option>
                        <option value="false">false</option>
                    </select>
                   
                    </div>
                    
                    <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright mb-3 radius">R:</label>
                    <div class="col-sm-12 col-md-12 col-lg-3 input-group mb-3 radius">
                    <select disabled id="slcradius" name="slcradius" class="form-select form-control" >
                        <option value="" hidden selected>Open this select menu</option>
                        <option value="true">true</option>
                        <option value="false">false</option>
                    </select>
                   
                    </div>

                    <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright mb-3 radiushead">R1:</label>
                    <div class="col-sm-12 col-md-12 col-lg-3 input-group mb-3 radiushead">
                    <select disabled id="slcradiushead" name="slcradiushead" class="form-select form-control" >
                        <option value="" hidden selected>Open this select menu</option>
                        <option value="true">true</option>
                        <option value="false">false</option>
                    </select>
                   
                    </div>

                    
                    <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright mb-3 radiushead2">R2:</label>
                    <div class="col-sm-12 col-md-12 col-lg-3 input-group mb-3 radiushead2">
                    <select disabled id="slcradiushead2" name="slcradiushead2" class="form-select form-control" >
                        <option value="" hidden selected>Open this select menu</option>
                        <option value="true">true</option>
                        <option value="false">false</option>
                    </select>
                   
                    </div>

                
                    
                    <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright mb-3 thread" >Tr:</label>
                    <div class="col-sm-12 col-md-12 col-lg-3 input-group mb-3 thread">
                    <select disabled id="slcthread" name="slcthread" class="form-select form-control" >
                        <option value="" hidden selected>Open this select menu</option>
                        <option value="true">true</option>
                        <option value="false">false</option>
                    </select>
                   
                    </div>

                    <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright mb-3 angle">Angle:</label>
                    <div class="col-sm-12 col-md-12 col-lg-3 input-group mb-3 angle">
                    <select disabled id="slcangle" name="slcangle" class="form-select form-control" >
                        <option value="" hidden selected>Open this select menu</option>
                        <option value="true">true</option>
                        <option value="false">false</option>
                    </select>
                   
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-4 "></div>

                    <label  class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright  anglestep">Angle Step:</label>
                    <div class="col-sm-12 col-md-12 col-lg-3 input-group anglestep">
                    <select disabled id="slcanglestep" name="slcanglestep" class="form-select form-control" >
                        <option value="" hidden selected>Open this select menu</option>
                        <option value="true">true</option>
                        <option value="false">false</option>
                    </select>
                    
                    </div>

                    <label class="col-sm-12 col-md-12 col-lg-1 col-form-label labelright  helix">HELIX:</label>
                    <div class="col-sm-12 col-md-12 col-lg-3  helix">
                    <select disabled id="slchelix" name="slchelix" class="form-select form-control" >
                        <option value="" hidden selected>Open this select menu</option>
                        <option value="true">true</option>
                        <option value="false">false</option>
                    </select>

                    </div>
                </div>
            </div>    -->

            <!-- <hr>

            <div class="form-group row">
              <label  class="col-sm-12 col-md-12 col-lg-2 col-form-label   numofteeth">Number of Teeth:</label>
              <div class="col-sm-12 col-md-12 col-lg-3  numofteeth">
                <select disabled id="slcnumofteeth" name="slcnumofteeth" class="form-select form-control" >
                        <option value="" hidden selected>Open this select menu</option>
                        <option value="true">true</option>
                        <option value="false">false</option>
                    </select>
              </div>
            </div>

            <div class="form-group row">
              <label  class="col-sm-12 col-md-12 col-lg-2 col-form-label  ">IMG Number of Teeth:</label>
              <div class="col-sm-12 col-md-12 col-lg-3  ">
                 <input readonly type="text" class="form-control" id="txtnumofteeth" name="txtnumofteeth" >
              </div>
            </div> -->

            <hr>
            <div class="form-group row">
                <div class="col-sm-12 col-md-12 col-lg-2">
                  <p class="newline"><p>
                  <button type="button" class="btn btn-primary " id="txtconfirm">Confirm</button>
                </div> 
                  
                <div class="col-sm-12 col-md-12 col-lg-2">
                  <p class="newline"><p>
                  <button type="button" class="btn btn-danger " id="txtrest">Reset</button>
                </div> 

                <div class="col-sm-12 col-md-12 col-lg-2">
                  <p class="newline"><p>
                  <button type="button" class="btn btn-info " id="txtback" onclick="window.location='../admin';" >Back Home</button>
                </div> 
            </div> 
      </div>
</section>
</form>