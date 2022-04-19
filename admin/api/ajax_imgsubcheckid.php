<?php
include "../../connectdb.php";
$response = array();
$success = true;
$reason = "";
try {

    $sql="SELECT * FROM a_image WHERE imgid LIKE '".$_POST['imgtype']."%' ";
    $result = mysqli_query($con, $sql);
    foreach( $result as $value ) {
        $data[ $value['imgid']]  = $value['disable'];
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
    'dataimgid' => $data,
    'reason'  => $reason 

);
    echo json_encode($response);
    exit;
?>