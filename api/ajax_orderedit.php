<?php
include("connectdb.php");
$response =  array();
$success = true;
$reason = "";
$chkfile1 =  $_POST['chkfile1'];
$chkfile2 =  $_POST['chkfile2'];
$chkfile3 =  $_POST['chkfile3'];
$fileupload1 = "";
$fileupload2 = "";
$fileupload3 = "";
if($chkfile1 == "0")
{
	$fileupload1 = $_POST['txtf1'];
}
else
{
	$fileupload1 = $_FILES["fupload1"]["name"];
}
if($chkfile2 == "0")
{
	$fileupload2 = $_POST['txtf2'];
}
else
{
	$fileupload2 = $_FILES["fupload2"]["name"];
}
if($chkfile3 == "0")
{
	$fileupload3 = $_POST['txtf3'];
}
else
{
	$fileupload3 = $_FILES["fupload3"]["name"];
}
try {
	// $d_update=date('Y-m-d H:i:s', strtotime('+543 year'));

	// $sql = "UPDATE san_order SET  
	// diameter = '".$_POST['txtdiameter']."',
	// diameter2  = '".$_POST['txtdiamete2']."',
	// clength = '".$_POST['txtcl']."',
	// length = '".$_POST['txtlength']."',
	// helix = '".$_POST['slchelix']."',
	// material = '".$_POST['slcmaterial']."',
	// coating = '".$_POST['slccoating']."',
	// quality = '".$_POST['txtqua']."',
	// description = '".$_POST['txtdes']."',
	// denti =  '".$_POST['txtden']."',
	// fileupload1 = '".$fileupload1."',
	// fileupload2 = '".$fileupload2."',
	// fileupload3 = '".$fileupload3."',



    // d_update =   '$d_update'
    // WHERE   orderid = '".$_POST['orderid']."'  ";

	// if (mysqli_query($con, $sql)) 
	// {	
	// 	move_uploaded_file($_FILES["fupload1"]["tmp_name"],"doc/".$_FILES["fupload1"]["name"]);
    //     move_uploaded_file($_FILES["fupload2"]["tmp_name"],"doc/".$_FILES["fupload2"]["name"]);
    //     move_uploaded_file($_FILES["fupload3"]["tmp_name"],"doc/".$_FILES["fupload3"]["name"]);  	
	// 	$reason = "Data update successfully !";
	// }
	// else
	// {
	// 	$success = false;
	// 	$reason = "Error";
	// }
	// mysqli_close($con);

} catch (Exception $ex) 
{   
    $reason = $ex->getMessage();
}

$response = array(
	 'success' => $success,
	'userid'  => $_POST['userid'],
    'orderid' => $_POST['orderid'],
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

	'f1txt' =>  $fileupload1,
	'f2txt' =>  $fileupload2,
	'f3txt' =>  $fileupload3,
	
	't1' => $_POST['txtf1'],
	't2' => $_POST['txtf2'],
	't3' => $_POST['txtf3'],

	'chkfile1' =>  $_POST['chkfile1'],
	'chkfile2' =>  $_POST['chkfile2'],
	'chkfile3' =>   $_POST['chkfile3'],
    'reason' => $reason
);

echo json_encode($response);
exit();
?>