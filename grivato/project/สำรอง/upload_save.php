<?php require('connect.php'); ?>
<?php 
if($_FILES["myfile"]["error"]!=0)
	{
echo "Error:". $_FILES["myfile"]["error"];
	}
else
	{
/*echo "Name:".$_FILES["myfile"]["name"]."<br />";
echo "Type:".$_FILES["myfile"]["type"]."<br />";
echo "Size:".($_FILES["myfile"]["size"]/1024)."<br />";
echo "Store:".$_FILES["myfile"]["tmp_name"]."<br />";	*/
$type=$_FILES["myfile"]["type"];
$name=time()."_".rand(1,9999);
if($type=="image/jpeg") {$pic="$name.jpg";}
else if($type=="image/png")	{$pic="$name.png";}
else if($type=="image/gif")	{$pic="$name.gif";}
else("อัพโหลดเฉพาะนามสกุล .GIF, .PNG, .JPG เท่านั้น");
copy($_FILES["myfile"]["tmp_name"],"./inf_picture/".$pic);
	}
$us_email=$_POST['us_email'];
//$q="insert into info(inf_name,inf_money,inf_where,inf_pic, inf_det,inf_email)
   //values('$inf_name','$inf_money','$inf_where','$pic','$inf_det','inf_email')";
$q="insert into info(inf_name,inf_money,inf_where,inf_pic, inf_det,us_email)
    values('inf_name','inf_money','inf_where','$pic','inf_det','$us_email')";
    $result=mysql_query($q) or die(mysql_error());
		alert_text("เพิ่มที่พักสำเร็จ");
	redirect('index.php');
?>
