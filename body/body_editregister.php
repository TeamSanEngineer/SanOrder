<?php
    $sql_provinces = "SELECT * FROM a_provinces ORDER BY name_th ASC";
    $query = mysqli_query($con, $sql_provinces);

    $queryuser = "SELECT * FROM a_user WHERE userid = '".$_SESSION["UserID"]."' ";
    $resultuser = mysqli_query($con,$queryuser);
    $row = mysqli_fetch_array($resultuser);
?>

<form  id="form1" name="form1" method="post" >
<table border="0" align="center" cellpadding="5" cellspacing="5">
    <tbody>
      
        <!-- <tr>
            <td align="right">เลขบัตรประชาชน&nbsp;</td>
            <td><input type="text" name="txtcid" id="txtcid" pattern="[0-9]{13}" value="<?php echo $row['cid'];?>" maxlength="13"  required>
                <span class="error"></span>
            </td>
        </tr> -->
        <tr>
            <td align="right">คำนำหน้า&nbsp;</td>
            <td><input name="txtprefix" type="text"  id="txtprefix" value="<?php echo $row['prefix'];?>" size="20"  required></td>
        </tr>
        <tr>
            <td align="right">ชื่อ&nbsp;</td>
            <td><input type="text" name="txtfristname" id="txtfristname" value="<?php echo $row['fristname'];?>"  required></td>
        </tr>
        <tr>
            <td align="right">สกุล</td>
            <td><input type="text" name="txtlastname" id="txtlastname" value="<?php echo $row['lastname'];?>"  required></td>
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
            <td><input name="txtage" type="number" value="<?php echo $row['age'];?>" required id="txtage" max="100" min="18" step="1">
                ปี</td>
        </tr>
        <tr>
            <td align="right">ชื่อบริษัท</td>
            <td><input name="txtcompanyname" type="text" id="txtcompanyname" value="<?php echo $row['companyname'];?>" size="40"></td>
        </tr>
        <tr>
            <td align="right"> ตำแหน่ง</td>
            <td><input name="txtposition" type="text" id="txtposition" value="<?php echo $row['position'];?>" size="40"></td>
        </tr>
        <tr>
            <td align="right">ที่อยู่</td>
            <td><input name="txtaddress" type="text"  id="txtaddress" value="<?php echo $row['address'];?>" required></td>
        </tr>
        <tr>
            <td align="right">ถนน</td>
            <td><input name="txtroad" type="text" id="txtroad"  value="<?php echo $row['road'];?>" size="40"></td>
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
            <td><input name="txtemail" type="email" required id="txtemail" value="<?php echo $row['email'];?>" size="40"></td>
        </tr>
        <tr>
            <td align="right">เบอร์โทร</td>
            <td><input type="text" name="txtphone" id="txtphone"value="<?php echo $row['phone'];?>" required></td>
        </tr>
    </tbody>
</table>
<br>
<div  align="center">
<!-- <a href="ready.php" class="btn btn-primary btn-sm" role="button"> Save </a>&nbsp;&nbsp; -->
                <button type="submit" id="registersubmit" class="btn btn-primary btn-sm">EDIT</button>
                <a href="" class="btn btn-primary btn-sm" role="button"> Clear </a>
</div>
<br>
</form>


