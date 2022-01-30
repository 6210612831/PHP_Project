<?php require('connect.php'); checkuser();?>
<!DOCTYPE HTML>
<html>
	<head>
		<?php require('html_header.php'); ?>
	</head>

<!-- Script confim delete -->
<script language="javascript">
    function confirm_delete()
    {
        var answer = window.confirm("ยืนยันการลบ");
        return answer;
    }
    function confirm_reset()
    {
        var answer = window.confirm("ยืนยันการรีเซ็ต");
        return answer;
    }
</script>

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
$sql="select * from messenger where 1";
$query=mysqli_query($mysqli,$sql) or die(mysql_error());
?>
		<section id="wrapper">
			<header>
				<div class="inner">
					<h2 class="major">Feed Back</h2>
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
											<th>ข้อความ</th>
											<th>การจัดการ</th>
										</tr>
									</thead>
<?php while($ss=mysqli_fetch_array($query)){?>
									<tbody>
										<tr>
											<td><?php echo $ss['name'] ?></td>
											<td><?php echo $ss['email'] ?></td>
											<td><?php echo $ss['message'] ?></td>
											<td>
												<a href="delete_feedback.php?message_name=<?php echo $ss['name']; ?>&message_email=<?php echo $ss['email']; ?>&message_message=<?php echo $ss['message']; ?>" onclick="return confirm_delete()">ลบ</a>
											</td>
										</tr>
										</tbody>
										<?php }?>
								</table>
							</div>
					<!-- Script -->
					<?php require('html_script.php'); ?>
	</body>
    </html>
