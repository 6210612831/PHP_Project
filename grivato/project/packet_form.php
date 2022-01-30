<?php require('connect.php');checkuser(); ?>
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
<!-- check user must only access own packet_form -->
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
<?php $inf_num=$_GET['inf_num']?>

		<section id="wrapper">
			<header>
				<div class="inner">
					<h2 class="major">จัดการแพ็กเกจ</h2>
				</div>
			</header>
			<div class="wrapper">
				<div class="inner">
					<section>
<?php
if($_GET["pk_id"])
{
$pk_id=$_GET["pk_id"];
$pk_sql="select * from packet where pk_id='$pk_id'";
$pk_que=mysqli_query($mysqli,$pk_sql) or die(mysql_error());
$pk_fet=mysqli_fetch_array($pk_que);
extract($pk_fet);
?>
						<h3 class="major">แก้ไขแพ็กเกจของคุณ</h3>
						<form name="form_insert" method="post" action="packet_edit_save.php" enctype="multipart/form-data">
							<div class="row uniform">
								<div class="6u 12u$(xsmall)">
									<label for="name">ข้อมูลแพ็กเกจ</label>
									<input name="pk_det" type="text" id="pk_det" value="<?php echo $pk_det ?>" maxlength="50" />
								</div>
							<div class="6u$ 12u$(xsmall)">
									<label for="prices">ราคาที่เพิ่ม</label>
									<input type="text" name="inc_money" id="inc_money" value="<?php echo $inc_money ?>" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกราคาที่เป็นตัวเลขเท่านั้น'); this.value='';}" maxlength="8"/>
							</div>
								<div class="12u$">
									<ul class="actions">
									<input name="pk_id" type="hidden" value="<?php echo $pk_id ?>">
										<li><input type="submit" value="ตกลง" class="special" /></li>
										<a href="?inf_num=<?php echo $inf_num; ?>" >
										<li><input type="button" value="ยกเลิก" /></li>
										</a>
									</ul>
								</div>
								</div>
							</div>
						</form>
<?php }else{ ?>
						<h2 class="major">เพิ่มแพ็กเกจของคุณ</h2>
						<form name="form_insert" method="post" action="packet_save.php" enctype="multipart/form-data">
							<div class="row uniform">
								<div class="6u 12u$(xsmall)">
									<label for="name">ข้อมูลแพ็กเกจ</label>
									<input name="pk_det" type="text" id="pk_det" value="" maxlength="50" />
								</div>
							<div class="6u$ 12u$(xsmall)">
									<label for="prices">ราคาที่เพิ่ม</label>
									<input type="text" name="inc_money" id="inc_money" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกราคาที่เป็นตัวเลขเท่านั้น'); this.value='';}" maxlength="8"/>
							</div>
								<div class="12u$">
									<ul class="actions">
									<input name="inf_num" type="hidden" value="<?php echo $inf_num ?>">
										<li><input type="submit" value="ตกลง" class="special" /></li>
										<li><input type="reset" value="ยกเลิก" /></li>
									</ul>
								</div>
								</div>
							</div>
						</form>
<?php }?>
					</section>
				</div>
			</div>

			<section class="wrapper alt spotlight style2">
				<section >
					<div class="inner">
						<h2 class="major">แพ็คเกจที่มีอยู่</h2>
					</div>
				</section>
					<div class="inner">
						<div class="row uniform">
							<section >
								<table>
									<thead>
										<tr>
											<th>แพ็คเกจ</th>
											<th>ราคาที่เพิ่มขึ้น</th>
											<th></th>
											<th></th>
											<th></th>
										</tr>
									</thead>
<?php 
$sql4="select * from packet where inf_num='$inf_num'";
$que4=mysqli_query($mysqli,$sql4) or die(mysql_error());
$num=mysqli_num_rows($que4);	
while($ss=mysqli_fetch_array($que4)){extract($ss);
?>
									<tbody>
										<tr>
											<td><?php echo $pk_det ?></td>
											<td><?php echo $inc_money ?></td>
											<td><a href="?inf_num=<?php echo $inf_num ?>&pk_id=<?php echo $pk_id ?>">แก้ไข</a></td>
											<td><a href="packet_remove.php?inf_num=<?php echo $inf_num ?>&pk_id=<?php echo $pk_id ?>" onclick="return confirm_delete()">ลบ</a></td>
										</tr>
									</tbody>
<?php }?>  
								</table>
							</section>
						</div>
            		</div>
			</section>
<!-- Scripts -->
<?php require('html_script.php'); ?>

	</body>
</html>
                             
