<?php
include("../connectdb.php");
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
	$d_update=date('Y-m-d H:i:s', strtotime('+543 year'));

	$sql = "UPDATE a_san_order SET  
	diameterbase = '".$_POST['txtdiameterbase']."',
	diameterhead  = '".$_POST['txtdiameterhead']."',
	clength = '".$_POST['txtclength']."',
	flength = '".$_POST['txtflength']."',
	lengthead = '".$_POST['txtlengthead']."',
	radiushead = '".$_POST['txtradiushead']."',
	thread = '".$_POST['txtthread']."',
	angle = '".$_POST['txtangle']."',
	radius = '".$_POST['txtradius']."',
	length = '".$_POST['txtlength']."',
	helix = '".$_POST['slchelix']."',	
	numteeth = '".$_POST['numofteeth']."',

	toolmaterial = '".$_POST['slctoolmaterial']."',	
	destoolmaterial  = '".$_POST['txttoolmaterial']."',	
	coating = '".$_POST['slccoating']."',
	descoating  = '".$_POST['txtcoating']."',	
	coatingcolor  = '".$_POST['txtcoatingcolor']."',	
	workmaterial  = '".$_POST['txtworkmaterial']."',	
	machine  = '".$_POST['slcmachine']."',	
	desmachine  = '".$_POST['txtmachine']."',	
	quality = '".$_POST['txtquality']."',

	usdrillchk  = '".$_POST['usdrillchk']."',
	usdrilltxt  = '".$_POST['txtusagedrill']."',
	usbrkchk  = '".$_POST['usbrkchk']."',
	usbrkntchk = '".$_POST['usbrkntchk']."',
	usbitechk = '".$_POST['usbitechk']."',
	usbitetxt = '".$_POST['txtusagebite']."',
	usscoopchk = '".$_POST['usscoopchk']."',
	usscooptxt = '".$_POST['txtusagescoop']."',
	uslathechk = '".$_POST['uslathechk']."',
	uslathetxt = '".$_POST['txtusagelathe']."',
	usotherchk = '".$_POST['usotherchk']."',
	usothertxt = '".$_POST['txtusageother']."',
	coolant = '".$_POST['slccoolant']."',


	diameterhead2 = '".$_POST['txtdiameterhead2']."',	
	diameterbase2  = '".$_POST['txtdiameterbase2']."',	
	lengthead2 = '".$_POST['txtlengthead2']."',
	radiushead2  = '".$_POST['txtradiushead2']."',	
	anglestep  = '".$_POST['txtanglestep']."',

	description = '".$_POST['txtdes']."',
	fileupload1 = '".$fileupload1."',
	fileupload2 = '".$fileupload2."',
	fileupload3 = '".$fileupload3."',



    d_update =   '$d_update'
    WHERE   orderid = '".$_POST['orderid']."'  ";

	if (mysqli_query($con, $sql)) 
	{	
		move_uploaded_file($_FILES["fupload1"]["tmp_name"],"../doc/".$_FILES["fupload1"]["name"]);
        move_uploaded_file($_FILES["fupload2"]["tmp_name"],"../doc/".$_FILES["fupload2"]["name"]);
        move_uploaded_file($_FILES["fupload3"]["tmp_name"],"../doc/".$_FILES["fupload3"]["name"]);  	
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
	 'success' => $success,
	'userid'  => $_POST['userid'],
    'orderid' => $_POST['orderid'],
    // 'txtdiameter' => $_POST['txtdiameter'],
	// 'txtdiameter2' => $_POST['txtdiameter2'],
	// 'txtfl' => $_POST['txtfl'],
	// 'txtlength' => $_POST['txtlength'],
	// 'txtqua' => $_POST['txtqua'],
	// 'txtdes' => $_POST['txtdes'],
	// 'slchelix' => $_POST['slchelix'],
	// 'slcmaterial' => $_POST['slcmaterial'],
	// 'slccoating' => $_POST['slccoating'],
	// 'txtfname' => $_POST['txtfname'],
	// 'txtlname' => $_POST['txtlname'],
	// 'txtphone' => $_POST['txtphone'],

	// 'f1' => $_FILES["fupload1"]["name"],
	// 'f2' => $_FILES["fupload2"]["name"],
	// 'f3' => $_FILES["fupload3"]["name"],
	// 'f4' =>$_FILES["fupload1"]["tmp_name"],"doc/".$_FILES["fupload1"]["name"],

	// 'f1txt' =>  $fileupload1,
	// 'f2txt' =>  $fileupload2,
	// 'f3txt' =>  $fileupload3,
	
	// 't1' => $_POST['txtf1'],
	// 't2' => $_POST['txtf2'],
	// 't3' => $_POST['txtf3'],

	// 'chkfile1' =>  $_POST['chkfile1'],
	// 'chkfile2' =>  $_POST['chkfile2'],
	// 'chkfile3' =>   $_POST['chkfile3'],
    'reason' => $reason
);

echo json_encode($response);
exit();
?>