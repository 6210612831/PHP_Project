<?php require('connect.php'); checkuser();?>
<?php
if($_FILES["myfile"]["error"]!=0)
	{
echo "Error:". $_FILES["myfile"]["error"];
	}
else
	{
$type=$_FILES["myfile"]["type"];
$name=time()."_".rand(1,9999);
if($type=="image/jpeg") {$pic="$name.jpg";}
else if($type=="image/png")	{$pic="$name.png";}
else if($type=="image/gif")	{$pic="$name.gif";}
else("อัพโหลดรูปเฉพาะนามสกุล .GIF, .PNG, .JPG เท่านั้น");

$images = $_FILES["myfile"]["tmp_name"];
//$new_images = "Thumbnails_".$_FILES["myfile"]["name"];
//copy($_FILES["myfile"]["tmp_name"],"./info_picture/".$pic);
$width=700;
$size=getimagesize($images);
//$height=round($width*$size[1]/$size[0]);
$height=600;
$images_orig = imagecreatefromjpeg($images);
$photoX = imagesx($images_orig);
$photoY = imagesy($images_orig);
$images_fin = imagecreatetruecolor($width, $height);
imagecopyresampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
imagejpeg($images_fin,"info_picture/".$pic);
imagedestroy($images_orig);
imagedestroy($images_fin);
	}
	
	
if($_POST['us_email'])
{
    $us_email=$_POST['us_email'];
	$inf_name=$_POST['inf_name'];
	$inf_money=$_POST['inf_money'];
	$inf_where=$_POST['inf_where'];
	$inf_room=$_POST['inf_room'];
	$inf_det=$_POST['inf_det'];
	$sql="insert into info(inf_name,inf_money,inf_where,inf_room,inf_det,us_email,inf_pic,inf_date)
    values('$inf_name','$inf_money','$inf_where','$inf_room','$inf_det','$us_email','$pic',NOW())";
    $result=mysqli_query($mysqli,$sql) or die(mysql_error());
	alert_text("เพิ่มข้อมูลที่พักเรียบร้อยครับ");
	redirect("index.php");
}?>
