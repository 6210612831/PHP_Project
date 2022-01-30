<?php require('connect.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register_save</title>
</head>

<body>
<?php
if($_POST['name'])
{
    $name=$_POST['name'].' '.$_POST['sur_name'];
    $email=$_POST['email'];
	$password=$_POST['password'];
	$number=$_POST['number'];
    $check_same_email_sql= "select * from user where us_email = '$email'";
    $check_same_email_result=mysqli_query($mysqli,$check_same_email_sql) or die(mysql_error());
    $check_num=mysqli_num_rows($check_same_email_result);	
    if($check_num!=0)
    {
        alert_text("อีเมลล์นี้ถูกใช้งานแล้ว");
?>

<script>
	window.history.back();
</script>

<?php 
    }
    else
    {
    $sql="insert into user(us_name,us_email, us_pass,us_number,us_status,us_date)
    values('$name','$email','$password','$number','1',NOW())";
    $result=mysqli_query($mysqli,$sql) or die(mysql_error());
	alert_text("สมัครเรียบร้อยครับ");    
    }
	redirect("login.php");
}?>
</body>
</html>