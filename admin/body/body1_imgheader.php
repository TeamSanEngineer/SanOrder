<div class="loading">Loading&#8230;</div>
<form  id="form1" name="form1" method="post" >
<section>
      <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12  col-md-6 col-lg-3 col-xs-3 ">
                            <figure class="figure">
                            <!-- <a href="menuimg.php"> -->
                                <img  src="../images/home/cutter.jpg"class="figure-img img-fluid rounded border border-dark imgtransparent" alt="Drill">
                            <!-- </a> -->
                                <figcaption class="figure-caption text-center"><h6>
                                    <a >เพิ่ม Image Header</a>
                                </h6>
                            </figcaption>
                            </figure>
                </div>
                <!-- <div class="col-sm-12  col-md-6 col-lg-3 col-xs-3 ">
                    <figure class="figure">
                        <img  src="../images/home/cutter.jpg"class="figure-img img-fluid rounded border border-dark imgtransparent" alt="Drill">
                        <figcaption class="figure-caption text-center"><h6>
                            <a>เพิ่ม Image Header SubImage</a>
                        </h6>
                    </figcaption>
                    </figure>
                </div> -->
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
                      <input readonly type="text" class="form-control" id="imgid" name="imgid" >
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12  col-md-6 col-lg-2 col-xs-2 col-form-label">IMG TYPEBASE</label>
                <div class="col-sm-12  col-md-6 col-lg-4 col-xs-4">
                      <input readonly type="text" class="form-control" id="imgtypebase" name="imgtypebase" >
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12  col-md-6 col-lg-2 col-xs-2 col-form-label">IMG Order</label>
                <div class="col-sm-12  col-md-6 col-lg-4 col-xs-4">
                      <input readonly type="text" class="form-control" id="imgorder" name="imgorder">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12  col-md-6 col-lg-2 col-xs-2 col-form-label">IMG Subtype</label>
                <div class="col-sm-12  col-md-6 col-lg-4 col-xs-4">
                      <input readonly type="text" class="form-control" id="imgsubtype" name="imgsubtype">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12  col-md-6 col-lg-2 col-xs-2 col-form-label">IMG Description</label>
                <div class="col-sm-12  col-md-6 col-lg-4 col-xs-4">
                      <input readonly type="text" class="form-control" id="imgdescription" name="imgdescription">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12  col-md-6 col-lg-2 col-xs-2 col-form-label">IMG Disable Massure</label>
                <div class="col-sm-12  col-md-6 col-lg-4 col-xs-4">
                      <!-- <input readonly type="text" class="form-control" id="imgdisable" name="imgdisable"> -->
                    <select disabled id="imgdisable" name="imgdisable" class="form-select form-control" >
                        <option value="" hidden selected>Open this select menu</option>
                        <option value="false">False</option>
                        <option value="true">True</option>
                        <!-- <option value="false">False</option> -->
                    </select>
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