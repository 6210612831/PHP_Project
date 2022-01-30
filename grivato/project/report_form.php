<?php require('connect.php'); checkuser();?>
<!DOCTYPE HTML>
<!--
	Solid State by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>GriVaTo</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>
    <?php 
$inf_num=$_GET['inf_num'];
$q=mysqli_query($mysqli,"select * from info where inf_num='$inf_num'") or die(mysql_error());
$fq=mysqli_fetch_array($q);
$us_email=$_SESSION['personal']['us_email'];
if($_SESSION['personal']['us_status']!=3){
if($fq['us_email']!=$us_email){
redirect('edit1.php');
exit();
}
}
?>
    		<!-- Page Wrapper -->
			<div id="page-wrapper">
							<div class="wrapper">
								<div class="inner">
				<!-- Header -->
					<?php require('head.php'); ?>
				<!-- Menu -->
					<?php require('menu.php'); ?>
                       <?php 
					   $inf_num=$_GET['inf_num'];
					   $sql="select * from info where inf_num='$inf_num'";
					   $res=mysqli_query($mysqli,$sql) or die(mysql_error());
					   $fec=mysqli_fetch_array($res);
					   $us_email=$fec['us_email'];
					   $sql2="select us_name from user where us_email='$us_email'";
					   $quer=mysqli_query($mysqli,$sql2) or die(mysql_error());
					   $f=mysqli_fetch_array($quer);
					   $inf_num=$fec['inf_num'];
					   $sql3="select * from customer where inf_num='$inf_num'";
					   $quer1=mysqli_query($mysqli,$sql3) or die(mysql_error());
					   $qn=mysqli_num_rows($quer1);
					   ?>
									<section>
										<h3 class="major">ข้อมูลที่พักของคุณ</h3>
											<div class="row uniform">
												<div class="6u 12u$(xsmall)">
													<label for="name">ชื่อที่พัก</label>
													<input name="inf_name" type="text" id="inf_name" value="<?php echo $fec['inf_name'] ?>" maxlength="50" readonly />
												</div>
                                                <div class="6u$ 12u$(xsmall)">
                                                <label for="name">วันที่เพิ่มที่พัก</label>
                                                	<input name="inf_date" type="text" id="inf_name" value="<?php echo $fec['inf_date'] ?>" maxlength="50" readonly />									<ul class="actions fit">
											<li></li>
												</div>
										  <div class="6u 12u$(xsmall)">
													<label for="prices">ราคาเข้าพัก</label>
                                                    <input type="text" name="inf_money" id="inf_money" value="<?php echo $fec['inf_money'] ?>" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกราคาที่เป็นตัวเลขเท่านั้น'); this.value='';}" maxlength="8" readonly/>
										  </div>
                                                <div class="6u$ 12u$(xsmall)">
													<label for="where">สถานที่</label>
                                                    <input name="inf_where" type="text" id="inf_where" value="<?php echo $fec['inf_where'] ?>"  readonly/>
												</div>
                                                 <div class="6u 12u$(xsmall)">
													<label for="where">เจ้าของที่พัก</label>
                                                    <input name="us_name" type="text" id="us_name" value="<?php echo $f['us_name'] ?>"  readonly/>
												</div>
                                                 <div class="6u 12u$(xsmall)">
													<label for="where">จำนวนการจอง</label>
                                                    <input name="cm_much" type="text" id="cm_much" value="<?php echo $qn?>"  readonly/>
												</div>
                                                                 <div class="12u$">
									<label for="message">รูปที่พัก</label>
									<img src="info_picture/<?php echo $fec['inf_pic'] ?>" alt="" />
								</div>
                                                <div class="12u$">
									<label for="message">ข้อมูลเพิ่มเติมที่พัก</label>
									<textarea name="inf_det" id="inf_det"  readonly rows="5" cols = "95"><?php echo $fec['inf_det']; ?> </textarea>
								</div>
												
										  </div>
									</section>
								</div>
                             </div>
						</div>
                        </div>
                    <!-- Scripts -->
					<?php require('html_script.php'); ?>

					</body>
				</html>
                             
