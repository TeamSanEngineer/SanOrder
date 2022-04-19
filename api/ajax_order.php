<?php
include("../connectdb.php");
$response =  array();
$success = true;
$reason = "";

try {
	$query= "SELECT MAX(rowid) as lastid FROM a_san_order";
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

	$sql = "INSERT INTO `a_san_order`(`orderid`,`diameterhead`,`diameterbase`,`flength`,`length`,`helix`,`toolmaterial`,`coating`,`workmaterial`,`machine`,
	`quality`,`description`,`d_frist`,`userrecord`,`fristname`,`lastname`,`tel`,`fileupload1`,`fileupload2`,`fileupload3`,`numteeth`,`status`,`type`,
	`companyname`,`address`,`road`,`tambon`,`amphur`,`province`,`postcode`,`email`,`destoolmaterial`,`descoating`,`desmachine`,`coolant`,`usdrillchk`,`usdrilltxt`,`usbrkchk`,`usbrkntchk`,`usbitechk`,`usbitetxt`,`usscoopchk`,
	`usscooptxt`,`uslathechk`,`uslathetxt`,`usotherchk`,`usothertxt`,`coatingcolor`,`imgid`,`subid`,`radius`,`thread`,`lengthead`,`angle`,`clength`,`radiushead`,`subtype`,`anglestep`,`diameterhead2`,`lengthead2`,`diameterbase2`,`radiushead2`) 





	VALUES ('$orderid','".$_POST['txtdiameterhead']."','".$_POST['txtdiameterbase']."'
	,'".$_POST['txtflength']."','".$_POST['txtlength']."','".$_POST['slchelix']."','".$_POST['slctoolmaterial']."','".$_POST['slccoating']."','".$_POST['txtworkmaterial']."','".$_POST['slcmachine']."',
	'".$_POST['txtquality']."','".$_POST['txtdes']."','$d_frist','".$_POST['userid']."','".$_POST['txtfname']."'
    ,'".$_POST['txtlname']."','".$_POST['txtphone']."','".$_FILES["fupload1"]["name"]."','".$_FILES["fupload2"]["name"]."','".$_FILES["fupload3"]["name"]."','".$_POST['numofteeth']."','pending','".$_POST['sandatatype']."'
	,'".$_POST['txtcompanyname']."','".$_POST['txtaddress']."','".$_POST['txtroad']."','".$_POST['txtdistricts']."','".$_POST['txtamphures']."','".$_POST['txtprovinces']."'
	,'".$_POST['txtzipcode']."','".$_POST['txtemail']."','".$_POST['txttoolmaterial']."','".$_POST['txtcoating']."','".$_POST['txtmachine']."','".$_POST['slccoolant']."'
	,'".$_POST['usdrillchk']."','".$_POST['txtusagedrill']."','".$_POST['usbrkchk']."','".$_POST['usbrkntchk']."'
	,'".$_POST['usbitechk']."','".$_POST['txtusagebite']."','".$_POST['usscoopchk']."','".$_POST['txtusagescoop']."'
	,'".$_POST['uslathechk']."','".$_POST['txtusagelathe']."','".$_POST['usotherchk']."','".$_POST['txtusageother']."'
	,'".$_POST['txtcoatingcolor']."','".$_POST['imgid']."','".$_POST['subid']."','".$_POST['txtradius']."'
	,'".$_POST['txtthread']."','".$_POST['txtlengthead']."','".$_POST['txtangle']."','".$_POST['txtclength']."'
	,'".$_POST['txtradiushead']."','".$_POST['subtype']."','".$_POST['txtanglestep']."','".$_POST['txtdiameterhead2']."'
	,'".$_POST['txtlengthead2']."','".$_POST['txtdiameterbase2']."','".$_POST['txtradiushead2']."')";

	if (mysqli_query($con, $sql))
	 {
        move_uploaded_file($_FILES["fupload1"]["tmp_name"],"../doc/".$_FILES["fupload1"]["name"]);
        move_uploaded_file($_FILES["fupload2"]["tmp_name"],"../doc/".$_FILES["fupload2"]["name"]);
        move_uploaded_file($_FILES["fupload3"]["tmp_name"],"../doc/".$_FILES["fupload3"]["name"]);  	
		$reason = "Data added successfully !";
	} 
	else
	 {
		$success = false;
		$reason = "Error occured ! ". $mysqli -> error  . mysqli_error($con);
		mysqli_rollback($con);
	}
	mysqli_close($con);

} catch (Exception $ex) 
{   
	$success = false;
    $reason = $ex->getMessage();
}

$response = array(

    'success' => $success,
	// ID
	'00imgid'  => $_POST['imgid'],
    '00subid' => $_POST['subid'],
	

	//IMG 
	'txtdiameterhead' => $_POST['txtdiameterhead'],
	'txtdiameterbase' => $_POST['txtdiameterbase'],
	//Measure
    'txtdiameterhead' => $_POST['txtdiameterhead'],
	'txtdiameterbase' => $_POST['txtdiameterbase'],
	'txtclength' => $_POST['txtclength'],
	'txtlength' => $_POST['txtlength'],
	'txtlengthead' => $_POST['txtlengthead'],
	'txtflength' => $_POST['txtflength'],
	'txtradius' => $_POST['txtradius'],
	'txtthread' => $_POST['txtthread'],
	'txtangle' => $_POST['txtangle'],
	'txtquality' => $_POST['txtquality'],

	'slchelix' => $_POST['slchelix'],
	'slctoolmaterial' => $_POST['slctoolmaterial'],
	'slccoating' => $_POST['slccoating'],
	'slcmachine' => $_POST['slcmachine'],
	
	'txtfname' => $_POST['txtfname'],
	'txtlname' => $_POST['txtlname'],
	'txtphone' => $_POST['txtphone'],


	'usdrillchk' => $_POST['usdrillchk'],
	'usbrk' => $_POST['usbrkchk'],
	'usbrknt' => $_POST['usbrkntchk'],
	'usbitechk' => $_POST['usbitechk'],
	'usscoop' => $_POST['usscoopchk'],
	'uslathe' => $_POST['uslathechk'],
	'usother' => $_POST['usotherchk'],
	

	'txtusagedrill' => $_POST['txtusagedrill'],
	'txtusagebite' => $_POST['txtusagebite'],
	'txtusagescoop' => $_POST['txtusagescoop'],
	'txtusagelathe' => $_POST['txtusagelathe'],
	'txtusageother' => $_POST['txtusageother'],

    'f1' => $_FILES["fupload1"]["name"],
    'f2' => $_FILES["fupload2"]["name"],
    'f3' => $_FILES["fupload3"]["name"],
    'f4' =>$_FILES["fupload1"]["tmp_name"],"../doc/".$_FILES["fupload1"]["name"],
	'sandatatype' => $_POST['sandatatype'],
    'reason' => $reason
);

echo json_encode($response);
exit();
?>


