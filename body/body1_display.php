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
                     <th>No.</th>
                     <th  class="text-center">Order ID</th>
                     <th  class="text-center">Name</th>
                     <th  class="text-center">Type</th>
                     <th  class="text-center">Show</th>
                     <th  class="text-center">Edit</th>
                </tr>
					</thead>     

          <tbody>
                <?php
                
                include 'connectdb.php';

                if($userlevel == "admin")
                {
                  $sql = "SELECT * FROM a_san_order";
                }
                else{
                  $sql = "SELECT
                  a_san_order.orderid,
                  a_san_order.fileupload1,
                  a_san_order.d_update,
                  a_san_order.diameter,
                  a_san_order.fristname,
                  a_san_order.lastname,
                  a_san_order.type,
                  a_san_order.userrecord,
                  a_user.userid,
                  a_user.fristname,
                  a_user.lastname
                  FROM
                  a_san_order
                  INNER JOIN a_user ON a_san_order.userrecord = a_user.userid WHERE a_user.userid = '$userid';
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
                      <td class="text-center mycapitalize"><?php echo $row["type"]; ?></td>
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