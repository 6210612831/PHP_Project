<?php include('connect.php'); checkuser();?>
<?php 
    $inf_num=$_POST['inf_num'];
	$pk_det=$_POST['pk_det'];
	$inc_money=$_POST['inc_money'];
	$sql="insert into packet(inf_num,pk_det,inc_money,pk_date)
    values('$inf_num','$pk_det','$inc_money',NOW())";
    $result=mysqli_query($mysqli,$sql) or die(mysql_error());
	alert_text("เพิ่มข้อมูลแพ็กเกจเรียบร้อยครับ");
?>

<script>
	window.history.back();
</script>