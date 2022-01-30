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
   
    		<!-- Page Wrapper -->
			<div id="page-wrapper">
							<div class="wrapper">
								<div class="inner">
				<!-- Header -->
					<?php require('head.php'); ?>
				<!-- Menu -->
					<?php require('menu.php'); ?>
                     <?php $us_status=$_SESSION['personal']['us_status'];if($us_status<2){redirect("index.php");}?>
             <section id="two" class="wrapper alt style1">
								<div class="inner">
									<h2 class="major">รายงานข้อมูลที่พัก</h2>
									<p>กรุณาเลือกที่พักที่ต้องการดูข้อมูล</p>
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
											<img src="info_picture/<?php echo $fet['inf_pic'] ?>" alt="" />
										</a>
										<a href="form_post.php?inf_num=<?php echo $fet['inf_num'] ?>" >
											<h3 class="major"><?php echo $fet['inf_name']; ?></h3>
											<p><?php echo $fet['inf_where']; ?></p>
										</a>
											<a href="report_form.php?inf_num=<?php echo $fet['inf_num']; ?>" class="special">ดูข้อมูล</a>
										</article>
										<?php }?>
                                       <?php /* ?> <article>
											<a href="#" class="image"><img src="images/pic05.jpg" alt="" /></a>
											<h3 class="major">Nisl placerat</h3>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing vehicula id nulla dignissim dapibus ultrices.</p>
											<a href="#" class="special">Learn more</a>
										</article> <?php */?>
										
									</section>
									
								</div>
							</section>

					</section>

								</div>
                             </div>
						</div>
                        </div>
                <!-- Scripts -->
				<?php require('html_script.php'); ?>

					</body>
				</html>
                             
