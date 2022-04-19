<?php
include "../../connectdb.php";
$response = array();
$success = true;
$reason = "";
try {

    $reason = "QA";
    // $sql="SELECT * FROM a_image WHERE imgid LIKE '".$_POST['imgtype']."%' ";
    $sql=" SELECT MAX(subid) as subid FROM a_measure WHERE imgid = '".$_POST['imgid']."' ";
    // $result = mysqli_query($con, $sql);
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) == 1)
    {
        $row = mysqli_fetch_assoc($result);
    }

    if($row['subid']== null){
	    $subid = "001" ;
	}else
    {
        $subid  = str_pad( $row['subid']+1, 3, '0', STR_PAD_LEFT);
    }

    mysqli_close($con);
}
catch(Exception $ex)
{
    $success = false;
    $reason  = 'Caught exception: ' .  $ex->getMessage();
}   
$response = array(
    'success' => $success,
    // 'dataimgid' => $data
    'subid' => $subid,
    'oldsubid' =>  $row['subid'],
    'reason'  => $reason 

);
    echo json_encode($response);
    exit;
?>