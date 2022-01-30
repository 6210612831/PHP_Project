<?php require('connect.php'); ?>

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

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<?php require('head.php'); ?>
				<!-- Menu -->
					<?php require('menu.php'); ?>
				<!-- Banner -->
				<section id="banner">
					<div class="inner">
						<div class="logo"><span class="icon fa-diamond">💎</span></div>
							<h2>GriVaTo</h2>
							<p>เว็บสำหรับการจองที่พัก หรือ การเพิ่มที่พักของคุณ ทุกที่ทุกเวลา</p>
						</div>
					</div>
				</section>

				<!-- Wrapper -->
					<section id="wrapper">
                		<?php 
						$sql="select * from customer where 1";
						//$sql="select inf_num from comment where 1 order by inf_num desc limit 0,3";
						$res=mysqli_query($mysqli,$sql) or die(mysql_error());
						$nu=mysqli_num_rows($res);
						//$fet=mysqli_fetch_array($res);
						if($nu!=0){
						$sql1="select inf_num,count(inf_num) as infnum FROM customer GROUP BY inf_num ORDER BY infnum DESC Limit 1 ";
						$res1=mysqli_query($mysqli,$sql1) or die(mysql_error());
						$fe1=mysqli_fetch_array($res1);
						$fes1=$fe1['inf_num'];
						$us1="select * from info where inf_num='$fes1'";
						$qu1=mysqli_query($mysqli,$us1) or die(mysql_error());
						$use1=mysqli_fetch_array($qu1);

						$sql2="select inf_num,count(inf_num) as infnum FROM customer GROUP BY inf_num ORDER BY infnum Desc Limit 1,1 ";
						$res2=mysqli_query($mysqli,$sql2) or die(mysql_error());
						$fe2=mysqli_fetch_array($res2);
						$fes2=$fe2['inf_num'];
						$us2="select * from info where inf_num='$fes2'";
						$qu2=mysqli_query($mysqli,$us2) or die(mysql_error());
						$use2=mysqli_fetch_array($qu2);

						$sql3="select inf_num,count(inf_num) as infnum FROM customer GROUP BY inf_num ORDER BY infnum Desc Limit 2,1 ";
						$res3=mysqli_query($mysqli,$sql3) or die(mysql_error());
						$fe3=mysqli_fetch_array($res3);
						$fes3=$fe3['inf_num'];
						$us3="select * from info where inf_num='$fes3'";
						$qu3=mysqli_query($mysqli,$us3) or die(mysql_error());
						$use3=mysqli_fetch_array($qu3);
						?>
						<!-- One -->
							 <?php require('one.php'); ?>
						<!-- Two -->
							<?php require('two.php'); ?>
						<!-- Three -->
							<?php require('three.php'); ?>
						<!-- Four -->
							<?php //require('four.php'); ?>
                            <?php }?>
				<!-- Footer -->
					<?php require('footer.php'); ?>

			</div>

		<!-- Scripts -->
		<?php require('html_script.php'); ?>

	</body>
</html>