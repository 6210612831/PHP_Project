<?php 
session_start();
if ($_SESSION['personal']==null)
      {
        $us_status=0;
        $us_num=0;
      }
else
    {
        $us_status=$_SESSION['personal']['us_status'];
        $us_num=$_SESSION['personal']['us_num'];
    }
?>


<nav id="menu">
	<div class="inner">
		<h2>Menu</h2>
        <h4><?php echo $_SESSION['personal']['us_email']; ?></h4>
		<ul class="links">
			<li><a href="index.php">หน้าแรก</a></li>
<?php if($us_status<1){?>
            <li><a href="login.php">เข้าสู่ระบบ</a></li>
            <li><a href="register.php">สมัครสมาชิก</a></li>
<?php }?>
<?php if($us_status>0){?>
            <li><a href="customer.php">จองที่พัก</a></li>
<?php }?>
<?php if($us_status>1){?>
			<li><a href="form_insert.php">เพิ่มที่พัก</a></li>
<?php }?>
<?php 
$us_email=$_SESSION['personal']['us_email'];
$sql="select * from info where us_email='$us_email'";
$res=mysqli_query($mysqli,$sql) or die (mysql_error());
$resw=mysqli_num_rows($res);
if($resw>0){?>
            <li><a href="edit.php">แก้ไขข้อมูลที่พัก</a></li>
            <li><a href="member_report.php">ข้อมูลที่พัก</a></li>
<?php }?>
<?php if($us_status>2){?>
            <li><a href="upgrade.php">เลื่อนขั้นสมาชิก</a></li>
            <li><a href="feedback.php">Feedback</a></li>
<?php }?>
<?php if($us_status>0){?>
            <li><a href="logout.php">ออกจากระบบ</a></li>
<?php }else{};?>
        </ul>
        <a href="#" class="close"></a>
    </div>
</nav>