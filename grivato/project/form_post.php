<?php require('connect.php');?>
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
				<div class="wrapper">
					<div class="inner">
		<!-- Header -->
<?php require('head.php'); ?>
		<!-- Menu -->
<?php require('menu.php'); ?>
<?php 
$inf_num=$_GET['inf_num'];
$sql="select * from info where inf_num='$inf_num'";
$resu=mysqli_query($mysqli,$sql) or die(mysql_error());
$ss=mysqli_fetch_array($resu) or die (mysql_error());
?>
<section>               
	<pre><code>
		<blockquote><h2><?php echo $ss['inf_name'];?></h2></blockquote>
<div class="4u$"><span class="image fit"><img src="info_picture/<?php echo $ss['inf_pic'] ?>" alt="" /></span></div><?php echo $ss['inf_det'] ?>
    
    <section><h2 class="major">สถานที่</h2><div class="row"><ul><li><?php echo $ss['inf_where'] ?></li></ul></div></section></code></pre> 
<?php if (isset($_SESSION['personal'])){ ?>
	<a href="customer_us_form.php?inf_num=<?php echo $inf_num; ?>"><input type="button" name="submit" id="submit" value="จอง" class="primary" /></a>
<?php } ?>
	</section>
	
	</div>
</div>

			<div class="wrapper">
				<div class="inner">
<?php if (isset($_SESSION['personal'])){ ?>
					<section>
						<div class="row gtr-uniform">
							<form id="forminf" name="forminf" method="post" action="form_com_save.php">
								<div class="col-12">
									<label>แสดงความคิดเห็น</label>
									<textarea name="cm_inf" id="cm_inf" rows="3" cols="150"></textarea>
								</div>
								<input type="hidden" name="inf_num" id="inf_num" value="<?php echo $inf_num ?>" />
								<div class="col-12">
									<ul class="actions">
										<li><input type="submit" name="submit" id="submit" value="ตกลง" class="primary" /></li>
										<li><input name="reset" type="reset" id="reset" value="ยกเลิก" />
									</ul>
								</div>
							</form>
						</div>
					</section>
<?php } ?>
					<h3 >Comment</h3>
					
<?php 
$com_sql="select * from comment where inf_num='$inf_num' ";
$com_result=mysqli_query($mysqli,$com_sql) or die(mysql_error());
while ($fetch_com_result=mysqli_fetch_array($com_result))
{
	extract($fetch_com_result);
	$find_us_sql = "select * from user where us_email='$us_email'";
	$find_us_result = mysqli_query($mysqli,$find_us_sql) or die(mysql_error());
	$fetch_find_us=mysqli_fetch_array($find_us_result);


?>
				<div class="inner">
					<section>
						<h2 class="major"></h2>
							<div class="row gtr-uniform">
									<div class="col-12">
										<div style="float:left;">
											<h4> ชื่อผู้ใช้ : <?php echo $fetch_find_us['us_name'] ?></h4>
										</div>
										<div style="float:right;">
											<h4 style="display: inline"> วันที่ : <?php echo $cm_date ?> </h4>
										

<!-- check user must only access own comment -->
<?php 
$q=mysqli_query($mysqli,"select * from info where inf_num='$inf_num'") or die(mysql_error());
$fq=mysqli_fetch_array($q);

if($_SESSION['personal']['us_status']==3 or $_SESSION['personal']['us_email']==$us_email)
{
?>
									<a href="delete_comment.php?cm_num=<?php echo $cm_num; ?>,email_check=<?php echo $us_email; ?>" onclick="return confirm_delete()"><h4 style="display: inline">ลบ</h4></a>
<?php } ?>						
									</div>
										<textarea name="cm_inf" id="cm_inf" rows="2" cols="150" readonly f><?php echo $cm_inf ?></textarea>
								</div>
							</div>
						<h3 class="major"></h3>
					</section>
				</div>
<?php } ?>
			</div>
		</div>
		<!-- Scripts -->
<?php require('html_script.php'); ?>
	</body>
</html>
                             
