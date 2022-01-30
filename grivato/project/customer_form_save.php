<?php require('connect.php');checkuser(); ?>
<?php
if(!$_FILES["scor"])
	{
		alert_text("กรุณาใส่รูปภาพ");
		history.back();
	}
else
	{
$type=$_FILES["scor"]["type"];
$name=time()."_".rand(1,9999);
if($type=="image/jpeg") {$pic="$name.jpg";}
else if($type=="image/png")	{$pic="$name.png";}
else if($type=="image/gif")	{$pic="$name.gif";}
else("อัพโหลดรูปเฉพาะนามสกุล .GIF, .PNG, .JPG เท่านั้น");

$images = $_FILES["scor"]["tmp_name"];
//$new_images = "Thumbnails_".$_FILES["scor"]["name"];
//copy($_FILES["scor"]["tmp_name"],"./info_picture/".$pic);
$width=700;
$size=getimagesize($images);
//$height=round($width*$size[1]/$size[0]);
$height=600;
$images_orig = imagecreatefromjpeg($images);
$photoX = imagesx($images_orig);
$photoY = imagesy($images_orig);
$images_fin = imagecreatetruecolor($width, $height);
imagecopyresampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
imagejpeg($images_fin,"customer_picture/".$pic);
imagedestroy($images_orig);
imagedestroy($images_fin);
	
	
	
if($_POST['inf_num'])
{
    
	$inf_num=$_POST['inf_num'];
	$cu_email=$_POST['cu_email'];
	$cu_number=$_POST['cu_number'];
	$cu_phone=$_POST['cu_phone'];
	$date_start=$_POST['date_select'];
	$date_end=$_POST['date_select_end'];
	
	$sql="insert into customer(inf_num,cu_email,cu_number,cu_phone,cu_pic,date_start,date_end,status) values('$inf_num','$cu_email','$cu_number','$cu_phone','$pic','$date_start','$date_end','0')";
    $result=mysqli_query($mysqli,$sql) or die(mysql_error());
	alert_text("รออนุมัติการจองที่พัก");
	redirect("index.php");
}
}
?>
