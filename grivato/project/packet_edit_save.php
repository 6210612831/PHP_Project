<?php include('connect.php'); checkuser();?>
<?php 
    $pk_id=$_POST['pk_id'];
	$pk_det=$_POST['pk_det'];
	$inc_money=$_POST['inc_money'];
	$sql="update packet set pk_det='$pk_det',inc_money='$inc_money' where pk_id = '$pk_id'";
    $result=mysqli_query($mysqli,$sql) or die(mysql_error());
	alert_text("แก้ไขข้อมูลแพ็กเกจเรียบร้อยครับ");
?>

<script>
	window.history.back();
</script>
