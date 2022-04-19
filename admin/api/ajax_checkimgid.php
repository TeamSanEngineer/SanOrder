<?php
include "../../connectdb.php";
$response = array();
$success = true;
$reason = "";
$orderid = "";
try {

    $sql="SELECT MAX(imgid) as imgid FROM a_image WHERE imgid LIKE '".$_POST['imgtype']."%' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) == 1)
    {
        $row = mysqli_fetch_assoc($result);
    }
	$lastid = $row['imgid'];

	if($lastid== null){
	    $newlastid = $_POST['imgtype']."001" ;
        $orderid = "0";
	}else{

        preg_match('/[^\d]+/', $lastid, $textMatch);
        preg_match('/\d+/', $lastid, $numMatch);
        
        $text = $textMatch[0];
        $num = $numMatch[0];


        $newlastid = $textMatch[0].str_pad( $numMatch[0]+1, 3, '0', STR_PAD_LEFT);
        $orderid = (int)$numMatch[0];

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
    'lastid' => "Last ID ".$lastid,
    'orderid' => $orderid,
    'newlastid' => $newlastid,
    // 'arrid' => $arrid[0],   
    // 'text' => $text,   
    // 'num' => $num,   
    'reason'  => $reason 

);
    echo json_encode($response);
    exit;
?>