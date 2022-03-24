<?php
include("connectdb.php");
$response =  array();
$success = true;
$reason = "";

try {
	
	$d_update=date('Y-m-d H:i:s', strtotime('+543 year'));

	$sql = "UPDATE san_order SET  
	diameter = '".$_POST['txtdiameter']."',
	diameter2  = '".$_POST['txtdiamete2']."',
	clength = '".$_POST['txtcl']."',
	length = '".$_POST['txtlength']."',
	helix = '".$_POST['slchelix']."',
	material = '".$_POST['slcmaterial']."',
	coating = '".$_POST['slccoating']."',
	quality = '".$_POST['txtqua']."',
	description = '".$_POST['txtdes']."',

	fileupload1 = '".$_FILES["fupload1"]["name"]."',
	fileupload2 = '".$_FILES["fupload2"]["name"]."',
	fileupload3 = '".$_FILES["fupload3"]["name"]."',



    d_update =   '$d_update'
    WHERE   orderid = '".$_POST['orderid']."'  ";

	if (mysqli_query($con, $sql)) 
	{
		$reason = "Data update successfully !";
	}
	else
	{
		$success = false;
		$reason = "Error";
	}
	mysqli_close($con);

} catch (Exception $ex) 
{   
    $reason = $ex->getMessage();
}

$response = array(

	'userid'  => $_POST['userid'],
    'orderid' => $_POST['orderid'],
    'success' => $success,
    'txtdiameter' => $_POST['txtdiameter'],
	'txtdiameter2' => $_POST['txtdiameter2'],
	'txtcl' => $_POST['txtcl'],
	'txtlength' => $_POST['txtlength'],
	'txtqua' => $_POST['txtqua'],
	'txtdes' => $_POST['txtdes'],

	'slchelix' => $_POST['slchelix'],
	'slcmaterial' => $_POST['slcmaterial'],
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