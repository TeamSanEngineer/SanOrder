<?php
    include("../connectdb.php");
    $response =  array();
    $success = true;
    $reason = "";
    $name =  array();
    try {
    	$reason = "lol";
        $sql = "SELECT
        a_image.imgid,
        a_measure.imgid,
        a_measure.namemeasure,
        a_measure.subid
        FROM
        a_measure
        INNER JOIN a_image ON a_image.imgid = '".$_POST['idimg']."' AND a_measure.imgid = '".$_POST['idimg']."' ";
         $result = mysqli_query($con, $sql);
         foreach( $result as $value ) {
            $name[ $value['subid']]  = $value['namemeasure'];
         }

    } catch (Exception $ex) 
    {   
    	$success = false;
        $reason = $ex->getMessage();
    }

    $response = array(
        'success' => $success,
        'name' => $name,
        'subid' => $_POST['idimg'],
        'reason' => $reason
    );

    echo json_encode($response);
    exit();
?>


