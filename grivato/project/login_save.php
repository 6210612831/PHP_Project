<?php require('connect.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register_save</title>
</head>

<body>
<?php
if($_POST['email'])
{
    $email=$_POST['email'];
	$password=$_POST['password'];
	$sql="select * from user where us_email='$email' and us_pass='$password'";
	$result=mysqli_query($mysqli,$sql) or die(mysql_error());
	$num=mysqli_num_rows($result);
	if($num == 0)
  {
  die("<script>
alert('อีเมลล์ที่ใช้ในเข้าสู่ระบบและติดต่อหรือรหัสผ่านไม่ถูกต้อง');
history.back();
</script>");
}
}
$_SESSION['login'] = true;
$_SESSION['personal'] = mysqli_fetch_assoc($result);
session_write_close();
die("<script>
alert('เข้าสู่ระบบสำเร็จ');
window.location='index.php';
</script>");
#redirect('index.php');
exit();?>
</body>
</html>