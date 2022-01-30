<?php require('connect.php'); ?>

<?php
if($_POST['inf_num'])
{
    $inf_num=$_POST['inf_num'];
	$cm_inf=$_POST['cm_inf'];
	$us_email=$_SESSION['personal']['us_email'];
	$sql="insert into comment(inf_num,cm_inf, cm_date,us_email) values('$inf_num','$cm_inf',NOW(),'$us_email')";
    $result=mysqli_query($mysqli,$sql) or die(mysql_error());
	alert_text("แสดงความคิดเห็นสำเร็จ");
}?>

<script>
	history.back();
</script>