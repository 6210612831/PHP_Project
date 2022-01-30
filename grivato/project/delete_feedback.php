<?php include('connect.php'); checkuser();?>

<!-- check user must only access own comment -->
<?php 
if($_SESSION['personal']['us_status']!=3 )
{
?>

<script>
	history.back();
</script>

<?php 
}
?>


<?php 
	$name=$_GET['message_name'];
	$email=$_GET['message_email'];
	$message=$_GET['message_message'];
	$sql="delete from messenger where name='$name' and email = '$email' and message='$message'";
    $result=mysqli_query($mysqli,$sql) or die(mysql_error());
	alert_text("ลบ Feedback เรียบร้อยครับ");
?>

<script>
	history.back();
</script>	