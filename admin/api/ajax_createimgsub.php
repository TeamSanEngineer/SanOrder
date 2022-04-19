<?php

include "../../lib/ResizeImage.php";//นำเข้า class ResizeImage เข้ามาใช้ในไฟล์
include "../../connectdb.php";

$response = array();
$success = true;
$reason = "";
try {
    	
    $target_dir = "../../images/origin/";//ชื่อ Folder สำหรับเก็บไฟล์ที่ Upload
    $path_parts = pathinfo($_FILES["fupload1"]["name"]);
    $extension = $path_parts['extension'];//นามสกุลไฟล์
    $filename =  $_FILES['fupload1']['name'];
    $target_file = $target_dir.$filename; 
    $Str_file = explode(".",$_FILES['fupload1']['name']); 
    $target_dirThumbnail = "../../images/datatype/";
    $newFileThumbnail = $target_dirThumbnail.$_POST['imgid'].$_POST['imgsubid'].'.'.$extension;//เปลี่ยนชื่อไฟล์ thumbnail ที่ ลดขนาดแล้ว

    $sql = "INSERT INTO `a_measure`(`imgid`,`namemeasure`,`diameterhead`,`diameterbase`,`clength`,`flength`,`radius`,`thread`
    ,`length`,`angle`,`lengthead`,`subid`,`radiushead`,`helix`,`numofteethid`,`numofteethchk`,`anglestep`,`diameterhead2`,`lengthead2`,`diameterbase2`,`radiushead2`) 
	VALUES ('".$_POST['imgid']."','".$_POST['imgid'].$_POST['imgsubid'].'.'.$extension."','".$_POST['slcdiameterhead']."','".$_POST['slcdiameterbase']."','".$_POST['slcclength']."'
	,'".$_POST['slcflength']."','".$_POST['slcradius']."','".$_POST['slcthread']."','".$_POST['slclength']."','".$_POST['slcangle']."'
    ,'".$_POST['slclengthead']."','".$_POST['imgsubid']."','".$_POST['slcradiushead']."','".$_POST['slchelix']."','".$_POST['txtnumofteeth']."'
    ,'".$_POST['slcnumofteeth']."','".$_POST['slcanglestep']."','".$_POST['slcdiameterhead2']."','".$_POST['slclengthead2']."','".$_POST['slcdiameterbase2']."'
    ,'".$_POST['slcradiushead2']."')";

	if (mysqli_query($con, $sql))
	 {
        if(!empty($_FILES["fupload1"]["name"])) {
            if (move_uploaded_file($_FILES["fupload1"]["tmp_name"], $target_file))
             {
                    
                    $resize = new ResizeImage($target_file);//เรียกใช้งาน class สำหรับ Resize
                    $resize->resizeTo(500, 250, 'exact');//กำหนดขนาดที่ต้องการ Resize กว้าง 150 สูง 150
                    $resize->saveImage($newFileThumbnail);//สร้างไฟล์ที่ลดขนาดแล้ว
                    $reason = "Data added successfully !";
                } else {
                    $reason = "Error occured ! ";
                }
            }else{
                $reason = "Error occured ! ";
            }
	} 
	else
	 {
		$success = false;
		$reason = "Error occured ! ". $mysqli -> error  . mysqli_error($con);
		mysqli_rollback($con);
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
    'url' => $newFileThumbnail,
    'getid' => $_POST['imgid'].$_POST['imgsubid'],
    'reason'  => $reason 

);
echo json_encode($response);
exit;
?>