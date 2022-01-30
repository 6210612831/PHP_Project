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
<?php $us_status=$_SESSION['personal']['us_status'];if($us_status<2){redirect("index.php");}?>
    <!-- Page Wrapper -->
		<div id="page-wrapper">
	<!-- Header -->
<?php require('head.php'); ?>
	<!-- Menu -->
<?php require('menu.php'); ?>
                   
			<section id="wrapper">
				<header>
					<div class="inner">
						<h2 class="major">แก้ไขข้อมูล</h2>
						<p>กรุณาเลือกที่พักของคุณที่ต้องการแก้ไขข้อมูล</p>
					</div>
				</header>
				<div class="wrapper">
					<div class="inner">
						<section class="features">
<?php 
if($_SESSION['personal']['us_status']<=2){
$us_email=$_SESSION['personal']['us_email'];
$sql="select * from info where us_email='$us_email'";
$res=mysqli_query($mysqli,$sql) or die (mysql_error());
	}	
	elseif($_SESSION['personal']['us_status']==3){
$us_email=$_SESSION['personal']['us_email'];
$sql="select * from info where 1";
$res=mysqli_query($mysqli,$sql) or die (mysql_error());
	}
while($fet=mysqli_fetch_array($res)){
?>
							<article>
							<a href="form_post.php?inf_num=<?php echo $fet['inf_num'] ?>" class="image">
								<img src="info_picture/<?php echo $fet['inf_pic'] ?>" alt=""/>
							</a>
							<a href="form_post.php?inf_num=<?php echo $fet['inf_num'] ?>" >
								<h3 class="major"><?php echo $fet['inf_name']; ?></h3>
								<p><?php echo $fet['inf_where']; ?></p>
							</a>
								<a href="packet_form.php?inf_num=<?php echo $fet['inf_num']; ?>" class="special">แพ็กเกจที่พัก</a>
								<a href="edit_form.php?inf_num=<?php echo $fet['inf_num']; ?>" class="special">แก้ไข</a>
								<a href="delete_info.php?inf_num=<?php echo $fet['inf_num']; ?>" class="special" onclick="return confirm_delete()">ลบที่พัก</a>
							</article>
<?php }?>					
						</section>
					</div>
				</div>
			</section>
        </div>
<!-- Scripts -->
<?php require('html_script.php'); ?>

	</body>
</html>

