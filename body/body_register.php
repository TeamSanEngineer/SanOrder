<?php
    $sql_provinces = "SELECT * FROM a_provinces ORDER BY name_th ASC";
    $query = mysqli_query($con, $sql_provinces);
?>

<form  id="form1" name="form1" method="post" >
<table border="0" align="center" cellpadding="5" cellspacing="5">
    <tbody>
        <tr>
            <td align="right" ><span id="spanUsername" style="color: red">ชื่อ Login</span></td>
            <td><input type="text" name="txtUsername" id="txtUsername"  minlength="4" pattern="[A-Za-z0-9]+"  value="" maxlength="13" require ></td>
        </tr>
        <tr>
            <td align="right" ><span id="spanPassword" style="color: red">Password Login</span></td>
            <td><input type="password" name="txtPassword" id="txtPassword"   minlength="8" value=""  pattern="[A-Za-z0-9]+" maxlength="13" require>
            </td>
        </tr>
        <tr>
            <td align="right" ><span id="spanRePassword" style="color: red">Re Password Login</span></td>
            <td><input type="password" name="txtRePassword" id="txtRePassword"   minlength="8" max="200"  pattern="[A-Za-z0-9]+"  value="" maxlength="13" require>
            </td>
        </tr>
        <tr>
          <td colspan="2" align="right" style="text-align: center">
              <button type="button" id="checkusername" class="btn btn-primary btn-sm">ตรวจสอบ</button>
		  </td>
        </tr>
        <!-- <tr>
            <td align="right">เลขบัตรประชาชน&nbsp;</td>
            <td><input type="text" name="txtcid" id="txtcid" pattern="[0-9]{13}" value="" maxlength="13" require>
                <span class="error"></span>
            </td>
        </tr> -->
        <tr>
            <td align="right">คำนำหน้า&nbsp;</td>
            <td><input name="txtprefix" type="text"  id="txtprefix" value="" size="20" require></td>
        </tr>
        <tr>
            <td align="right">ชื่อ&nbsp;</td>
            <td><input type="text" name="txtfristname" id="txtfristname" value="" require></td>
        </tr>
        <tr>
            <td align="right">สกุล</td>
            <td><input type="text" name="txtlastname" id="txtlastname" value="" require></td>
        </tr>
        <tr>
            <td align="right">เพศ</td>
            <td>
                <select name="txtgender" id="txtgender" require>
                    <option value=""></option>
                    <option value="ชาย">ชาย</option>
                    <option value="หญิง">หญิง</option>
                </select>
            </td>
        </tr>
        <tr>
            <td align="right">อายุ</td>
            <td><input name="txtage" type="number" require id="txtage" max="100" min="0" step="1">
                ปี</td>
        </tr>
        <tr>
            <td align="right">ชื่อบริษัท</td>
            <td><input name="txtcompanyname" type="text" id="txtcompanyname" value="" size="40" require></td>
        </tr>
        <tr>
            <td align="right"> ตำแหน่ง</td>
            <td><input name="txtposition" type="text" id="txtposition" value="" size="40" require></td>
        </tr>
        <tr>
            <td align="right">ที่อยู่</td>
            <td><input name="txtaddress" type="text"  id="txtaddress" value="" require></td>
        </tr>
        <tr>
            <td align="right">ถนน</td>
            <td><input name="txtroad" type="text" id="txtroad" value="" size="40" require></td>
        </tr>
        <tr>
            <td align="right">จังหวัด</td>
            <td><select class="form-control" name="Ref_prov_id" id="provinces" require>
                    <option value="" selected disabled>-กรุณาเลือกจังหวัด-</option>
                    <?php foreach ($query as $value) { ?>
                    <option value="<?=$value['id']?>"><?=$value['name_th']?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td align="right">อำเภอ/เขต</td>
            <td><select class="form-control" name="Ref_dist_id" id="amphures" require>
                    <option value="" selected disabled></option>
                </select>
            </td>
        </tr>
        <tr>
            <td align="right">ตำบล</td>
            <td>
                <select class="form-control" name="Ref_subdist_id" id="districts" require>
                     <option value="" selected disabled></option>
                </select>
            </td>
        </tr>
        <tr>
            <td align="right">รหัสไปรษณีย์</td>
            <td><input type="text" name="zip_code" id="zip_code" class="form-control" require></td>
        </tr>
        <tr>
            <td align="right">อีเมล</td>
            <td><input name="txtemail" type="email"  id="txtemail" value="" size="40" require></td>
        </tr>
        <tr>
            <td align="right">เบอร์โทร</td>
            <td><input type="text" name="txtphone" id="txtphone" value="" pattern= "[0-9]+"  required></td>
        </tr>
    </tbody>
</table>
<br>
<div  align="center">
        <button type="submit" id="registersubmit" class="btn btn-primary btn-sm">Save</button>
                <a href="" class="btn btn-primary btn-sm" role="button"> Clear </a>
</div>
<br>
</form>
<?php include('src/script_register.php');?>

