<?php include('connect.php'); checkuser();?>

<!-- check user must only access own comment -->
<?php 
if($_SESSION['personal']['us_status']!=3 or $_SESSION['personal']['us_email']!=$_GET['email_check'])
{
?>

<script>
	history.back();
</script>

<?php 
}
?>


<?php 
    $email_check=$_GET['email_check'];
	$cm_num=$_GET['cm_num'];
	$sql="delete from comment where cm_num='$cm_num'";
    $result=mysqli_query($mysqli,$sql) or die(mysql_error());
	alert_text("ลบคอมเมนต์เรียบร้อยครับ");
?>
