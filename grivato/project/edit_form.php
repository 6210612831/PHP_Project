<?php require('connect.php'); checkuser();?>
<!DOCTYPE HTML>
<!--
	Solid State by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<?php require('html_header.php'); ?>
	</head>
	<body>

<!-- check user must only access own info -->
<?php 
$inf_num=$_GET['inf_num'];
$q=mysqli_query($mysqli,"select * from info where inf_num='$inf_num'") or die(mysql_error());
$fq=mysqli_fetch_array($q);
$us_email=$_SESSION['personal']['us_email'];
if($_SESSION['personal']['us_status']!=3){
if($fq['us_email']!=$us_email){
redirect('edit.php');
exit();
}
}
?>
    	<!-- Page Wrapper -->
		<div id="page-wrapper">
		<!-- Header -->
<?php require('head.php'); ?>
		<!-- Menu -->
<?php require('menu.php'); ?>
<?php 
$inf_num=$_GET['inf_num'];
$sql="select * from info where inf_num='$inf_num'";
$res=mysqli_query($mysqli,$sql) or die(mysql_error());
$fec=mysqli_fetch_array($res);
?>



			<section id="wrapper">
				<header>
					<div class="inner">
						<h3 class="major">แก้ไขข้อมูลที่พักของคุณ</h3>
					</div>
				</header>
				<div class="wrapper">
					<div class="inner">
						<section>
                            <form name="form_insert" method="post" action="edit_form_save.php" enctype="multipart/form-data">
								<div class="6u 12u$(xsmall)">
									<label for="name">ชื่อที่พัก</label>
									<input name="inf_name" type="text" id="inf_name" value="<?php echo $fec['inf_name'] ?>" maxlength="50" />
								</div>
                                <div class="6u$ 12u$(xsmall)">
                                    <label for="name">รูปที่พัก</label>
                                    <ul class="actions fit">
									<input type="hidden" name="old_pic" id="old_pic" value="<?php echo $fec['inf_pic']; ?>" />
									<li><a href="#" class="button fit"><input type="file" name="myfile" value = "null" ></a></li>
									</ul>
								</div>
								<div class="6u 12u$(xsmall)">
										<label for="prices">ราคาเข้าพัก</label>
										<input type="text" name="inf_money" id="inf_money" value="<?php echo $fec['inf_money'] ?>" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกราคาที่เป็นตัวเลขเท่านั้น'); this.value='';}" maxlength="8"/>
								</div>
								<div class="6u$ 12u$(xsmall)">
									<label for="where">สถานที่</label>
									<input name="inf_where" type="text" id="inf_where" value="<?php echo $fec['inf_where'] ?>" />
								</div>
                                <div class="12u$">
									<label for="message">ข้อมูลเพิ่มเติมที่พัก</label>
									<textarea name="inf_det" id="inf_det"><?php echo $fec['inf_det']; ?></textarea>
								</div>
                                <input name="inf_num" type="hidden" value="<?php echo $inf_num;?>">
								<div class="12u$">
									<ul class="actions">
										<li>
										<input type="hidden" name="us_email" id="us_email" value="<?php echo $_SESSION['personal']['us_email']; ?>" />
										<input type="submit" value="ตกลง" class="special" /></li>
										<li><input type="reset" value="ยกเลิก" /></li>
									</ul>
								</div>
							</form>
						</section>
					</div>
                </div>
<!-- Scripts -->
<?php require('html_script.php'); ?>

	</body>
</html>
                             
