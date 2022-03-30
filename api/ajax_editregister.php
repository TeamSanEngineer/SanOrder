<?php
 
include '../connectdb.php';
$response = array();
$success = false;
$reason = "";
try {
    $up_date=date('Y-m-d H:i:s', strtotime('+543 year'));
    $sql = "UPDATE a_user SET  
    up_date='$up_date',
    prefix = '".$_POST['txtprefix']."',
    fristname =  '".$_POST['txtfristname']."',
    lastname = '".$_POST['txtlastname']."',
    gender = '".$_POST['txtgender']."',
    age =  '".$_POST['txtage']."',
    companyname = '".$_POST['txtcompanyname']."',
    position = '".$_POST['txtposition']."',
    address  = '".$_POST['txtaddress']."',
    road  = '".$_POST['txtroad']."',
    tambon  = '".$_POST['districts_text']."',
    amphur =	'".$_POST['amphures_text']."',  
    province = '".$_POST['provinces_text']."',  
    tambon_id  = '".$_POST['districts_id']."',
    amphur_id =	'".$_POST['amphures_id']."',  
    province_id = '".$_POST['provinces_id']."',  
    postcode = '".$_POST['zip_code']."',
    phone = '".$_POST['txtphone']."',
    email =   '".$_POST['txtemail']."'
    WHERE userid='".$_POST['userid']."' ";
    if (mysqli_query($con, $sql)) 
    {

        $success = true;
        $reason = "บันทึกสำเร็จ";

        session_start();
        $_SESSION["Fristname"] = $_POST['txtfristname'];
        $_SESSION["Lastname"] = $_POST['txtlastname'];
    }
    else
    {
        $reason = "ERROR!";
    }
}
catch(Exception $ex)
{
    $success = false;
    $reason  = 'Caught exception: ' .  $ex->getMessage();
}   




    $response = array(
        'userid'  =>  $_POST['userid'],
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