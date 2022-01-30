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
    		<!-- Page Wrapper -->
			<div id="page-wrapper">
				<!-- Header -->
<?php require('head.php'); ?>
				<!-- Menu -->
<?php require('menu.php'); ?>

                    <section id="wrapper">
					<header>
							<div class="inner">
								<h2 class="major">การจองสถานที่</h2>
							</div>
					</header>
					<!-- <div class="wrapper"> -->
						<div class="wrapper">
							<div class="inner">
							<p>กรุณาเลือกสถานที่ที่ต้องการจอง</p>                                                      
                                <section>
                                    <form id="form_insert" name="form_insert" method="get" action="">
										<div class="6u 12u$(xsmall)">
                                                <input type="text" name="keyword" id="keyword" />
										</div>
                                        <div class="12u$">
											<input type="submit" name="Submit" id="Submit" value="ค้นหา"  class="special"/>
                                        </div>
                                    </form>                                                 
								</section>
									
								
							<section class="features">
<?php 
$keyword=$_GET["keyword"];
if($keyword){$str="and inf_name like '%$keyword%'";}
$sql2="select * from info where 1 $str order by inf_name asc";
//$sql="select * from student_list,register where student_list.stu_code=register.id  order by stu_code asc";//desc มาsกไปน้อย  asc น้อยไปมาก//
$result=mysqli_query($mysqli,$sql2) or die(mysql_error());
while($fets=mysqli_fetch_array($result)){
?>
									<article>
										<a href="form_post.php?inf_num=<?php echo $fets['inf_num'] ?>" class="image">
											<img src="info_picture/<?php echo $fets['inf_pic'] ?>" alt="" />
										</a>
										<a href="form_post.php?inf_num=<?php echo $fets['inf_num'] ?>" >
											<h3 class="major"><?php echo $fets['inf_name']; ?></h3>
											<p><?php echo $fets['inf_where']; ?></p>
										</a>
										<a href="customer_us_form.php?inf_num=<?php echo $fets['inf_num']; ?>" class="special">จอง</a>
									</article>
								<?php }?>
							</section>
						</div>
					</div>
					ดูข้อมูล
            <!-- Scripts -->
<?php require('html_script.php'); ?>
	</body>
</html>
                             
