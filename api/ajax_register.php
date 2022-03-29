<?php
 
include '../connectdb.php';
$response = array();
$success = false;
$reason = "";
try {
    $sql="SELECT * FROM a_user Where userid='".$_POST['txtUsername']."' ";
    $result = mysqli_query($con,$sql);
    $hashed_password = password_hash($_POST['txtPassword'], PASSWORD_DEFAULT);
    if(mysqli_num_rows($result)>=1)
    {
        $reason = "มีผู้ใช้งานอยู่แล้ว";
    }
    else
    {
        $create_date=date('Y-m-d H:i:s', strtotime('+543 year'));
        $sql = "INSERT INTO `a_user`(`userid`,`password`,`prefix`,`fristname`,`lastname`,`gender`,`age`,`companyname`
        ,`address`,`road`,`tambon`,`amphur`,`province`,`postcode`,`phone`,`email`,`create_date`,`position`,`tambon_id`,`amphur_id`,`province_id`) 
        VALUES ('".$_POST['txtUsername']."','".$hashed_password."','".$_POST['txtprefix']."','".$_POST['txtfristname']."','".$_POST['txtlastname']."','".$_POST['txtgender']."','".$_POST['txtage']."','".$_POST['txtcompanyname']."'
        ,'".$_POST['txtaddress']."','".$_POST['txtroad']."','".$_POST['districts_text']."','".$_POST['amphures_text']."','".$_POST['provinces_text']."','".$_POST['zip_code']."'
        ,'". $_POST['txtphone']."','". $_POST['txtemail']."','$create_date','".$_POST['txtposition']."','".$_POST['districts_id']."','".$_POST['amphures_id']."','".$_POST['provinces_id']."')";
            if (mysqli_query($con, $sql)) 
            {
                $success = true;
                $reason = "ทำการบันทึก กำลังเข้าสู่หน้า login";
            }
            else
            {
                $reason = "ERROR!";
            }
    }
    mysqli_close($con);
}
catch(Exception $ex)
{
    $success = false;
    $reason  = 'Caught exception: ' .  $ex->getMessage();
}   

    $response = array(
        'Username' => $_POST['txtUsername'],
        'Password'  =>  $hashed_password,
        'cid'  =>  $_POST['txtcid'],
        'prefix'  =>  $_POST['txtprefix'],
        'fristname'  =>  $_POST['txtfristname'],
        'lastname'  =>  $_POST['txtlastname'],
        'gender'  =>  $_POST['txtgender'],
        'age'  =>  $_POST['txtage'],
        'organizationname'  =>  $_POST['txtorganizationname'],
        'address'  =>  $_POST['txtaddress'],
        'road'  =>  $_POST['txtroad'],
        'tambon'  =>  $_POST['districts_text'],
        'amphur'  =>  $_POST['amphures_text'],
        'province'  =>  $_POST['provinces_text'],
        'postcode'  =>  $_POST['zip_code'],
        'phone'  =>  $_POST['txtphone'],
        'email'  =>  $_POST['txtemail'],
        'position'  =>  $_POST['txtposition'],

        'provinces_id' => $_POST['provinces_id'],
        'amphures_id' => $_POST['amphures_id'],
        'districts_id' => $_POST['districts_id'],
        'success' => $success,
        'reason' => $reason
    );


   
    echo json_encode($response);
    exit();
?>