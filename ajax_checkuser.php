<?php
include("connectdb.php");
$response = array();
$success = false;
$reason = "";
try {

    $Username = $_POST['txtUsername'];
    $Password = $_POST['txtPassword'];
    $Password = $_POST['txtPassword'];
  


    $sql="SELECT * FROM user Where userid='".$Username."' ";
    // $result = mysqli_query($con,$sql);
    if (mysqli_query($con, $sql)) 
    {
        if(mysqli_num_rows(mysqli_query($con,$sql))>=1)
        {
            $success = false;
            $reason = "ตรวจสอบมีผู้ใช้งานอยู่แล้ว";
        }
        else
        {
            $success = true;
            $reason = "ตรวจสอบผ่าน";
        }
    }
    else
    {
        $success = false;
        $reason = "ERROR!";
    }
    mysqli_close($con);

}
catch(Exception $ex)
{
    $success = false;
    $reason  = 'Caught exception: ' .  $ex->getMessage();
}   
$response = array(


    'Username'  => $Username ,
    'Password'  => $Password ,
    'success' => $success,
    'reason'  =>    $reason 

);
    echo json_encode($response);
    exit;
?>