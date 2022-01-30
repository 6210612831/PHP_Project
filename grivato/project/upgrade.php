<?php require('connect.php'); checkuser();?>
<!DOCTYPE HTML>
<html>
	<head>
		<?php require('html_header.php'); ?>
	</head>
	<body>
	<!-- Page Wrapper -->
		<div id="page-wrapper">
	<!-- Header -->
<?php require('head.php'); ?>
	<!-- Menu -->
<?php require('menu.php'); ?>

<!-- check admin only can access this page -->
<?php 
if($_SESSION['personal']['us_status']!=3)
{
	redirect('index.php');
	exit();
}
?>



<?php 
$us_status=$_SESSION['personal']['us_status'];
if($us_status<3){redirect("index.php");}?>
<?php 
$sql="select * from user where us_status!='3'";
$query=mysqli_query($mysqli,$sql) or die(mysql_error());
?>
		<section id="wrapper">
			<header>
				<div class="inner">
					<h2 class="major">จัดการสมาชิก</h2>
				</div>
			</header>
			<div class="wrapper">
				<div class="inner" >
					<section>
							<div class="table-wrapper" >
								<table>
									<thead>
										<tr>
											<th>ชื่อ</th>
											<th>อีเมล</th>
											<th>ระดับขั้น</th>
											<th></th>
											<th></th>
										</tr>
									</thead>
<?php while($ss=mysqli_fetch_array($query)){
extract($ss);?>
									<tbody>
										<tr>
											<td><?php echo $us_name ?></td>
											<td><?php echo $us_email ?></td>
											<th><?php echo $us_status ?></th>
											<td><a href="us_upgrade.php?us_num=<?php echo $us_num ?>">เลื่อนขั้นผู้ใช้</a></td>
											<td><a href="us_degrade.php?us_num=<?php echo $us_num ?>">ลดขั้นผู้ใช้</a></td>
											<td><a href="us_delete.php?us_num=<?php echo $us_num ?>">ลบบัญชีผู้ใช้</a></td> 
										</tr>
										</tbody>
										<?php }?>
								</table>
							</div>
					<!-- Script -->
					<?php require('html_script.php'); ?>
	</body>
    </html>
