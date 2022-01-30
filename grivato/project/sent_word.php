<?php require('connect.php'); ?>
<?php 
if($_POST['name']&&$_POST['email'])
{
	$message=$_POST['message'];
	$email=$_POST['email'];
	$name=$_POST['name'];
	$sql="insert into messenger(name,email,message) values('$message','$email','$name')";
	$query=mysqli_query($mysqli,$sql) or die(mysql_error());
?>
<script language="javascript">
alert("ส่งข้อความถึงผู้ดูแลระบบสำเร็จ");
window.location.href="index.php";
</script>
<?php
}else{
?>
<script language="javascript">
alert("ส่งข้อความถึงผู้ดูแลระบบล้มเหลว");
window.location.href="index.php";
</script>
<?php }?>