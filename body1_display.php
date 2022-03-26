<?php  
$userid = "";
$userlevel = "";
 if (isset($_SESSION["UserID"]))
 { 
   $userid =  $_SESSION["UserID"];
 }

 if (isset($_SESSION["Level"]))
 { 
   $userlevel =  $_SESSION["Level"];
 }
 ?>
<form  id="form1" name="form1" method="post" >


<section>
      <div class="container">
        <div class="d-flex justify-content-center" >
          <button type="button" class="btn btn-secondary " id="txtback" onclick="window.location='index.php';" >HOME</button>
        </div>
        <div class="d-flex justify-content-center"  >
				<table id="example"  style="width:100%"  class="table display nowrap">
        <thead>
            <tr>
                     <th>ลำดับ</th>
                     <th  class="text-center">ชื่อรายการ</th>
                     <th  class="text-center">ชื่อ</th>
                     <th  class="text-center">แสดงข้อมูล</th>
                     <th  class="text-center">แก้ไข</th>
                </tr>
					</thead>     

          <tbody>
                <?php
                //
                include 'connectdb.php';

                if($userlevel == "admin")
                {
                  $sql = "SELECT * FROM san_order";
                }
                else{
                  $sql = "SELECT
                  san_order.orderid,
                  san_order.fileupload1,
                  san_order.d_update,
                  san_order.diameter,
                  san_order.fristname,
                  san_order.lastname,
                  `user`.userid,
                  `user`.fristname,
                  `user`.lastname,
                  san_order.userrecord
                  FROM
                  `user`
                  INNER JOIN san_order ON san_order.userrecord = `user`.userid WHERE `user`.userid = '$userid';
                  ";
                }

                $result = mysqli_query($con, $sql);

                if ($result->num_rows > 0) {
                  $x = 1 ;
                  while($row = $result->fetch_assoc()) {
                ?>
                <tr>
                      <td><?php echo  $x ; ?>  </td>
                      <td class="text-center id"><?php echo $row["orderid"]; ?></td>
                      <td class="text-center"><?php echo $row["fristname"]; ?></td>
                      <td class="text-center"></td>
                      <td class="text-center"></td>
                </tr>      

                <?php 
                  $x++;
                  }
                }
                ?>
                </tbody>
              </table>
        </div>
		
      </div>
</section>

    <section>
    
    <!-- Modal -->
    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">ต้องการที่พัก</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
        
          <form>
            <div class="form-group">
              <label><input type="checkbox" name="txthosteltake" id="txthosteltake"> ต้องการให้จองที่พักให้</label><br>
              <label><input type="checkbox" name="txthosteladvance"  id="txthosteladvance"> เข้าพักล่วงหน้า</label><br>
              <label><input type="checkbox" name="txtnothostel"  id="txtnothostel"> ไม่ต้องการที่พัก</label>
            </div>
          </form>


          </div>
          <div class="modal-footer">
            <button type="button" id="savemember" class="btn btn-primary">Save</button>
            <button type="button"  id="closemember" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div> -->
    
</form>