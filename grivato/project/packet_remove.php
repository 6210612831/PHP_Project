<?php include('connect.php'); checkuser();?>

<!-- check user must only access own info -->
<?php 
$inf_num=$_GET['inf_num'];
$q=mysqli_query($mysqli,"select * from info where inf_num='$inf_num'") or die(mysql_error());
$fq=mysqli_fetch_array($q);
$us_email=$_SESSION['personal']['us_email'];
if($_SESSION['personal']['us_status']!=3){
if($fq['us_email']!=$us_email){
redirect('packet_form.php');
exit();
}
}
?>

<?php 
    $inf_num=$_GET['inf_num'];
	$pk_id=$_GET['pk_id'];
	$sql="delete from packet where pk_id='$pk_id' and inf_num='$inf_num'";
    $result=mysqli_query($mysqli,$sql) or die(mysql_error());
	alert_text("ลบแพ็กเกจเรียบร้อยครับ");
?>

<script>
	window.location.href = "packet_form.php?inf_num=<?php echo $inf_num; ?>";
</script>