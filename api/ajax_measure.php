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

    $sql = "SELECT * FROM a_nteeth WHERE numofteethid = '".$row['numofteethid']."'  ";
    $imgresult = mysqli_query($con, $sql);
    foreach( $imgresult as $value ) {
        $data[ $value['value']]  = $value['numofteethname'];
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
    'radiushead' => $row['radiushead'] === 'true' ? true: false,		
    'helix' => $row['helix'] === 'true' ? true: false,		

    'diameterhead2' => $row['diameterhead2']  === 'true' ? true: false, 	
    'diameterbase2' => $row['diameterbase2']  === 'true' ? true: false,	
    'lengthead2' => $row['lengthead2']  === 'true' ? true: false, 	
    'radiushead2' => $row['radiushead2']  === 'true' ? true: false,	
    'anglestep' => $row['anglestep']  === 'true' ? true: false,	


    'numofteeth' => $row['numofteethchk'] === 'true' ? true: false,		
    'numofteethid' => $row['numofteethid'],
    'numofteethname' => $data,
    'reason' => $reason
);





echo json_encode($response);
exit();
?>


