<?php
include("../connectdb.php");
$response =  array();
$success = true;
$reason = "";
$name =  array();
try {
   
    $sql = "SELECT * FROM a_measure WHERE imgid = '".$_POST['idimg']."' AND subid = '".$_POST['subid']."' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) == 1)
    {
        $row = mysqli_fetch_assoc($result);
    }
    mysqli_close($con);
} catch (Exception $ex) 
{   
    $success = false;
    $reason = $ex->getMessage();
}

$response = array(
    'success' => $success,
    'diameterhead' => $row['diameterhead']  === 'true' ? true: false, 	
    'diameterbase' => $row['diameterbase']  === 'true' ? true: false,	
    'radius' => $row['radius'] === 'true' ? true: false,   	
    'thread' => $row['thread'] === 'true' ? true: false,	 	
    'clength' => $row['clength'] === 'true' ? true: false, 	
    'length' => $row['length'] === 'true' ? true: false,		
    'lengthead' => $row['lengthead'] === 'true' ? true: false,	
    'flength' => $row['flength'] === 'true' ? true: false,		
    'angle' => $row['angle'] === 'true' ? true: false,		
    // 'subid' => $_POST['idimg'],
    'reason' => $reason
);





echo json_encode($response);
exit();
?>


