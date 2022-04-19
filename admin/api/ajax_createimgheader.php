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
    $target_dirThumbnail = "../../images/mattype/";
    $newFileThumbnail = $target_dirThumbnail.$_POST['imgid'].'.'.$extension;//เปลี่ยนชื่อไฟล์ thumbnail ที่ ลดขนาดแล้ว

    $sql = "INSERT INTO `a_image`(`imgid`,`type`,`name`,`order`,`subtype`,`description`,`disable`) 
	VALUES ('".$_POST['imgid']."','".$_POST['imgtypebase']."','".$_POST['imgid'].'.'.$extension."','".$_POST['imgorder']."'
	,'".$_POST['imgsubtype']."','".$_POST['imgdescription']."','".$_POST['imgdisable']."')";

	if (mysqli_query($con, $sql))
	 {
        if(!empty($_FILES["fupload1"]["name"])) {
         
            if (move_uploaded_file($_FILES["fupload1"]["tmp_name"], $target_file))
             {
                    
                    $resize = new ResizeImage($target_file);//เรียกใช้งาน class สำหรับ Resize
                    $resize->resizeTo(80, 80, 'exact');//กำหนดขนาดที่ต้องการ Resize กว้าง 150 สูง 150
                    $resize->saveImage($newFileThumbnail);//สร้างไฟล์ที่ลดขนาดแล้ว
                    // $reason = "The file ". htmlspecialchars($filename). " has been uploaded.";
                    $reason = "Data added successfully !";
                } else {
                    // $reason = "Sorry, there was an error uploading your file.";
                    $reason = "Error occured ! ";
                }
            }else{
                // $reason = "Sorry, there was an error uploading your file.";
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
    'reason'  => $reason 

);
echo json_encode($response);
exit;
//ตรวจสอบว่ามีการ submit ข้อมูลมาหรือไม่
// if(isset($_POST["submit"]) && !empty($_FILES["fupload1"]["name"])) {
	
// 	$target_dir = "images/origin/";//ชื่อ Folder สำหรับเก็บไฟล์ที่ Upload

// 	$path_parts = pathinfo($_FILES["fupload1"]["name"]);

// 	$extension = $path_parts['extension'];//นามสกุลไฟล์

// 	// $filename = date("YmdHis").'.'.$extension;//เปลี่ยนชื่อไฟล์ที่ upload แล้ว

//     $filename =  $_FILES["fupload1"]["name"];

// 	$target_file = $target_dir.$filename; 


//     $Str_file = explode(".",$_FILES['fupload1']['name']); 
//     // $newFileThumbnail=$Str_file['0']."_thumbnail.".$Str_file['1'];

//     $target_dirThumbnail = "images/mattype/";

// 	// $newFileThumbnail = $target_dir.date("YmdHis").'_thumbnail.'.$extension;//เปลี่ยนชื่อไฟล์ thumbnail ที่ ลดขนาดแล้ว

//     $newFileThumbnail = $target_dirThumbnail.$Str_file['0'].'.'.$extension;//เปลี่ยนชื่อไฟล์ thumbnail ที่ ลดขนาดแล้ว

//     echo $_FILES["fupload1"]["tmp_name"], $target_file;
//     if (move_uploaded_file($_FILES["fupload1"]["tmp_name"], $target_file))
//      {
			
// 			$resize = new ResizeImage($target_file);//เรียกใช้งาน class สำหรับ Resize
// 			$resize->resizeTo(80, 80, 'exact');//กำหนดขนาดที่ต้องการ Resize กว้าง 150 สูง 150
// 			$resize->saveImage($newFileThumbnail);//สร้างไฟล์ที่ลดขนาดแล้ว
// 			echo "The file ". htmlspecialchars($filename). " has been uploaded.";
// 	    } else {
// 			echo "Sorry, there was an error uploading your file.";
// 	    }

// }else{
// 	echo "Sorry, there was an error uploading your file.";
// }


?>