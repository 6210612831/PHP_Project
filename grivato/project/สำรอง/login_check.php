<?php require('connect.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>lockincheck</title>
</head>

<body>

<?php 
$username = $_POST[username];
$password = $_POST[password];
$sql="select * from admin where username='$username' and password='$password'";
$result=mysql_query($sql) or die(mysql_error());
$num=mysql_num_rows($result);

if($num == 0)
  {
  die("<script>
alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');
history.back();
</script>");
}
$_SESSION['login'] = true;
$_SESSION['personal'] = mysql_fetch_assoc($result);
session_write_close();
redirect('ad_borrow.php');
exit();?>
</body>
</html>
