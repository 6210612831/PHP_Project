<?php require('connect.php');checkuser(); ?>

<!-- check user must only access own info -->
<?php 
$inf_num=$_GET['inf_num'];
$q=mysqli_query($mysqli,"select * from info where inf_num='$inf_num'") or die(mysql_error());
$fq=mysqli_fetch_array($q);
$us_email=$_SESSION['personal']['us_email'];
if($_SESSION['personal']['us_status']!=3){
if($fq['us_email']!=$us_email){
redirect('edit.php');
exit();
}
}
?>

<?php

if($_FILES["myfile"]["type"])
	{
		echo "hi";
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
	
	
if($_POST['inf_num'])
{
	$inf_num=$_POST['inf_num'];
    $us_email=$_POST['us_email'];
	$inf_name=$_POST['inf_name'];
	$inf_money=$_POST['inf_money'];
	$inf_where=$_POST['inf_where'];
	$inf_room=$_POST['inf_room'];
	$old_pic =$_POST['old_pic'];
	$inf_det=$_POST['inf_det'];
	if($_FILES["myfile"]["type"])
	{
		$sql="update info SET inf_name='$inf_name',inf_money='$inf_money',inf_where='$inf_where',
		inf_room='$inf_room',inf_det='$inf_det',us_email='$us_email',inf_pic='$pic' where inf_num='$inf_num'";
	}
	else
	{
		$sql="update info SET inf_name='$inf_name',inf_money='$inf_money',inf_where='$inf_where',
		inf_room='$inf_room',inf_det='$inf_det',us_email='$us_email',inf_pic='$old_pic' where inf_num='$inf_num'";
	}
	/*$sql="insert into info(inf_name,inf_money,inf_where,inf_room,inf_det,us_email,inf_pic,inf_date)
    values('$inf_name','$inf_money','$inf_where','$inf_room','$inf_det','$us_email','$pic',NOW())";*/
    $result=mysqli_query($mysqli,$sql) or die(mysql_error());
	alert_text("แก้ไขข้อมูลที่พักเรียบร้อยครับ");
	redirect("form_post.php?inf_num=$inf_num");
	//redirect("form_post.php?inf_num='$inf_num'");
	echo $inf_num;
}?>
