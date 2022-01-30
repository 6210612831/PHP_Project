<?php include('connect.php'); checkuser();?>
<!-- check admin only can access this page -->
<?php 
if($_SESSION['personal']['us_status']!=3)
{
	redirect('index.php');
	exit();
}
?>
<?php
 $us_num=$_GET['us_num'];
 $de="update user SET us_status='1' where us_num='$us_num'";
 $dq=mysqli_query($mysqli,$de) or die(mysql_error());
?>

<script language="javascript">
alert("ลดขั้นผู้ใช้เสร็จสิ้น");
window.location.href="upgrade.php";
</script>

