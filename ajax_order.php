<?php
include("connectdb.php");
$response =  array();
$success = true;
$reason = "";

try {
	$query= "SELECT MAX(rowid) as lastid FROM san_order";
	$result = mysqli_query($con,$query);
	$objResult = mysqli_fetch_array($result);

	$lastid = $objResult['lastid'];

	if($lastid==''){
	$lastid=1;
	}else{
	$lastid = ($lastid + 1);
	}

	$orderid = "san-" . str_pad( $lastid, 4, '0', STR_PAD_LEFT);
	$d_frist=date('Y-m-d H:i:s', strtotime('+543 year'));

	$sql = "INSERT INTO `san_order`(`orderid`,`diameter`,`diameter2`,`flength`,`length`,`helix`,`toolmaterial`,`coating`,`workmaterial`,`machine`,
	`quality`,`description`,`denti`,`d_frist`,`userrecord`,`fristname`,`lastname`,`tel`,`fileupload1`,`fileupload2`,`fileupload3`) 
	VALUES ('$orderid','".$_POST['txtdiameter']."','".$_POST['txtdiameter2']."'
	,'".$_POST['txtfl']."','".$_POST['txtlength']."','".$_POST['slchelix']."','".$_POST['slctoolmaterial']."','".$_POST['slccoating']."','".$_POST['txtworkmaterial']."','".$_POST['slcmachine']."',
	'".$_POST['txtqua']."','".$_POST['txtdes']."','".$_POST['txtden']."','$d_frist','".$_POST['userid']."','".$_POST['txtfname']."'
    ,'".$_POST['txtlname']."','".$_POST['txtcontact']."','".$_FILES["fupload1"]["name"]."','".$_FILES["fupload2"]["name"]."','".$_FILES["fupload3"]["name"]."')";

	if (mysqli_query($con, $sql))
	 {
        move_uploaded_file($_FILES["fupload1"]["tmp_name"],"doc/".$_FILES["fupload1"]["name"]);
        move_uploaded_file($_FILES["fupload2"]["tmp_name"],"doc/".$_FILES["fupload2"]["name"]);
        move_uploaded_file($_FILES["fupload3"]["tmp_name"],"doc/".$_FILES["fupload3"]["name"]);  	
		$reason = "Data added successfully !";
	} 
	else
	 {
		$success = false;
		$reason = "Error occured ! ";
	}


	mysqli_close($con);

} catch (Exception $ex) 
{   
    $reason = $ex->getMessage();
}

$response = array(

	'userid'  => $_POST['userid'],
    'orderid' => $orderid,
    'success' => $success,
    'txtdiameter' => $_POST['txtdiameter'],
	'txtdiameter2' => $_POST['txtdiameter2'],
	'txtcl' => $_POST['txtcl'],
	'txtlength' => $_POST['txtlength'],
	'txtqua' => $_POST['txtqua'],
	'txtdes' => $_POST['txtdes'],

	'selhelix' => $_POST['selhelix'],
	'slctoolmaterial' => $_POST['slctoolmaterial'],
	'slccoating' => $_POST['slccoating'],

	'txtfname' => $_POST['txtfname'],
	'txtlname' => $_POST['txtlname'],
	'txtcontact' => $_POST['txtcontact'],

    'f1' => $_FILES["fupload1"]["name"],
    'f2' => $_FILES["fupload2"]["name"],
    'f3' => $_FILES["fupload3"]["name"],
    'f4' =>$_FILES["fupload1"]["tmp_name"],"doc/".$_FILES["fupload1"]["name"],
    'reason' => $reason
);

echo json_encode($response);
exit();
?>