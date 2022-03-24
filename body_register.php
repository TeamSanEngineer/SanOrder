<?php
    $sql_provinces = "SELECT * FROM provinces ORDER BY name_th ASC";
    $query = mysqli_query($con, $sql_provinces);
?>

<form  id="form1" name="form1" method="post" >
<table border="0" align="center" cellpadding="5" cellspacing="5">
    <tbody>
        <tr>
            <td align="right" ><span id="spanUsername" style="color: red">ชื่อ Login</span></td>
            <td><input type="text" name="txtUsername" id="txtUsername"  minlength="4" pattern="[A-Za-z0-9]+"  value="" maxlength="13" required ></td>
        </tr>
        <tr>
            <td align="right" ><span id="spanPassword" style="color: red">Password Login</span></td>
            <td><input type="password" name="txtPassword" id="txtPassword"   minlength="8" value=""  pattern="[A-Za-z0-9]+" maxlength="13" required>
            </td>
        </tr>
        <tr>
            <td align="right" ><span id="spanRePassword" style="color: red">Re Password Login</span></td>
            <td><input type="password" name="txtRePassword" id="txtRePassword"   minlength="8" max="200"  pattern="[A-Za-z0-9]+"  value="" maxlength="13" required>
            </td>
        </tr>
        <tr>
          <td colspan="2" align="right" style="text-align: center">
              <button type="button" id="checkusername" class="btn btn-primary btn-sm">ตรวจสอบ</button>
			  <!-- <a href="" class="btn btn-danger btn-sm" role="button" onClick="checkusername();" > ตรวจสอบ </a>  -->
		  </td>
        </tr>
        <tr>
            <td align="right">เลขบัตรประชาชน&nbsp;</td>
            <td><input type="text" name="txtcid" id="txtcid" pattern="[0-9]{13}" value="" maxlength="13" required>
                <span class="error"></span>
            </td>
        </tr>
        <tr>
            <td align="right">คำนำหน้า&nbsp;</td>
            <td><input name="txtprefix" type="text"  id="txtprefix" value="" size="20" required></td>
        </tr>
        <tr>
            <td align="right">ชื่อ&nbsp;</td>
            <td><input type="text" name="txtfristname" id="txtfristname" value="" required></td>
        </tr>
        <tr>
            <td align="right">สกุล</td>
            <td><input type="text" name="txtlastname" id="txtlastname" value="" required></td>
        </tr>
        <tr>
            <td align="right">เพศ</td>
            <td>
                <select name="txtgender" id="txtgender" required>
                    <option value=""></option>
                    <option value="ชาย">ชาย</option>
                    <option value="หญิง">หญิง</option>
                </select>
            </td>
        </tr>
        <tr>
            <td align="right">อายุ</td>
            <td><input name="txtage" type="number" required id="txtage" max="100" min="18" step="1">
                ปี</td>
        </tr>
        <tr>
            <td align="right">ชื่อหน่วยงาน</td>
            <td><input name="txtorganizationname" type="text" id="txtorganizationname" value="" size="40"></td>
        </tr>
        <tr>
            <td align="right"> ตำแหน่ง</td>
            <td><input name="txtposition" type="text" id="txtposition" value="" size="40"></td>
        </tr>
        <tr>
            <td align="right">ที่อยู่</td>
            <td><input name="txtaddress" type="text"  id="txtaddress" value="" required></td>
        </tr>
        <tr>
            <td align="right">ถนน</td>
            <td><input name="txtroad" type="text" id="txtroad" value="" size="40"></td>
        </tr>
        <tr>
            <td align="right">จังหวัด</td>
            <td><select class="form-control" name="Ref_prov_id" id="provinces" required>
                    <option value="" selected disabled>-กรุณาเลือกจังหวัด-</option>
                    <?php foreach ($query as $value) { ?>
                    <option value="<?=$value['id']?>"><?=$value['name_th']?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td align="right">อำเภอ/เขต</td>
            <td><select class="form-control" name="Ref_dist_id" id="amphures" required>
                    <option value="" selected disabled></option>
                </select>
            </td>
        </tr>
        <tr>
            <td align="right">ตำบล</td>
            <td>
                <select class="form-control" name="Ref_subdist_id" id="districts" required>
                     <option value="" selected disabled></option>
                </select>
            </td>
        </tr>
        <tr>
            <td align="right">รหัสไปรษณีย์</td>
            <td><input type="text" name="zip_code" id="zip_code" class="form-control"></td>
        </tr>
        <tr>
            <td align="right">อีเมล</td>
            <td><input name="txtemail" type="email" required id="txtemail" value="" size="40"></td>
        </tr>
        <tr>
            <td align="right">เบอร์โทร</td>
            <td><input type="text" name="txtphone" id="txtphone" value="" required></td>
        </tr>
    </tbody>
</table>
<br>
<div  align="center">
<!-- <a href="ready.php" class="btn btn-primary btn-sm" role="button"> Save </a>&nbsp;&nbsp; -->
        <button type="submit" id="registersubmit" class="btn btn-primary btn-sm">Save</button>
                <a href="" class="btn btn-primary btn-sm" role="button"> Clear </a>
</div>
<br>
</form>
<?php include('script_register.php');?>

