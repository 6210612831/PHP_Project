<?php require('connect.php'); checkuser();
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
		<script type="text/javascript">
		$(
			function(){
			// แทรกโค้ต jquery
		$("#date_start").datepicker({ dateFormat: 'yy-mm-dd'	,changeMonth: true,
			changeYear: true ,minDate: 0});
			$("#date_end").datepicker({ dateFormat: 'yy-mm-dd',changeMonth: true,
			changeYear: true,
			numberOfMonths: 2,
			showButtonPanel: true ,minDate: 1});
		$("#date_select").datepicker({ dateFormat: 'yy-mm-dd'	,changeMonth: true,
			changeYear: true ,minDate: -1});	// รูปแบบวันที่ที่ได้จะเป็น 2009-08-16สามารถกำหนด เป็น
			//$("#date_start").datepicker({minDate: 0});
			// $("#date_end").datepicker({minDate: 0});
		$("#date_select_end").datepicker({ dateFormat: 'yy-mm-dd',changeMonth: true,
			changeYear: true,
			numberOfMonths: 2,
			showButtonPanel: true });
		});

		function IsNumeric(sText,obj)
		{
			var ValidChars = "0123456789.";
			var IsNumber=true;
			var Char;
			for (i = 0; i < sText.length && IsNumber == true; i++) 
			{ 
			Char = sText.charAt(i); 
			if (ValidChars.indexOf(Char) == -1) 
				{
				IsNumber = false;
				}
			}
				if(IsNumber==false){
					alert("ระบุตัวเลขเท่านั้น");
					obj.value=sText.substr(0,sText.length-1);
				}
		}
			$(function() {
			$( ".resizeme" ).aeImageResize({ height: 300, width: 300 });
			});
		</script>
		<style type="text/css">
		.ui-datepicker{
			width:210px;
			font-family:tahoma;
			font-size:13px;
			text-align:center;
		}
		body {/* background-color: #FEF5ED; */}
		</style>
	</head>
	<body>
    <!-- Page Wrapper -->
		<div id="page-wrapper">
	<!-- Header -->
		<?php require('head.php'); ?>
	<!-- Menu -->
		<?php require('menu.php'); ?>
<?php 
$inf_num=$_GET['inf_num'];
$sp="select * from info where inf_num='$inf_num'";
$rp=mysqli_query($mysqli,$sp) or die(mysql_error());
$fp=mysqli_fetch_array($rp);
$us_email=$_SESSION['personal']['us_email'];
$soi="select * from user where us_email='$us_email'";
$rt=mysqli_query($mysqli,$soi) or die(mysql_error());
$rtf=mysqli_fetch_array($rt);
?>
	<!-- Body -->
	
			<section id="wrapper">
				<header>
					<div class="inner">
						<h2 class="major">ข้อมูลที่พัก</h2>
					</div>
				</header>
				<div class="wrapper">
					<div class="inner">
                    	<section>
                            <form name="customer_form" method="post" action="customer_form_save.php" enctype="multipart/form-data">
								
								<div class="row uniform">
									<div class="12u">
                                        <label for="name">ชื่อที่พัก</label>
										<input name="inf_name" type="text" id="inf_name" value="<?php echo $fp['inf_name'] ?>" maxlength="50" readonly />
									</div>
                                    
									<div class="">
										<label for="prices">ราคาเข้าพัก</label>
                                        <input name="inf_name" type="text" id="inf_name" value="<?php echo $fp['inf_money'] ?>" maxlength="50" readonly/>
									</div>
                                    <div class="">
										<label for="where">สถานที่ของที่พัก</label>
                                        <input name="inf_name" type="text" id="inf_name" value="<?php echo $fp['inf_where'] ?>" maxlength="50" readonly />
									</div>
                                    <div class="">
										<label for="many">จำนวนผู้พักโดยประมาณ</label>
                                        <input name="inf_many" type="text" id="inf_many" readonly value="<?php echo $fp['inf_where'] ?>"/>
									</div>
									<div class="12u$">
										<label for="message">ข้อมูลเพิ่มเติมที่พัก</label>
										<textarea name="inf_det" id="inf_det" rows="2" cols="57" readonly><?php echo $fp['inf_det'] ?></textarea>
									</div>
									<div class="12u"><span class="image fit"><img src="info_picture/<?php echo $fp['inf_pic'] ?>" alt="" /></span></div>
								</div>
                                	<div class="12u">
										<h3 class="major">ข้อมูลผู้จองที่พัก</h3>
									</div>
								<div class="row uniform">
									<div class="6u 12u$(xsmall)">
										<label for="name">ชื่อ-นามสกุลผู้จอง</label>
										<input name="cu_name" type="text" id="cu_name"  readonly  value="<?php echo $rtf['us_name'] ?>"/>
									</div>
                                    <div class="6u 12u$(xsmall)">
										<label for="cu_email">อีเมลล์ที่ใช้ในเข้าสู่ระบบและติดต่อ</label>
										<input type="email" name="cu_email" id="cu_email" />
									</div>
                                    <div class="6u 12u$(xsmall)">
										<label for="number">เลขบัตรประจำตัวประชาชน</label>
										<input type="text" name="cu_number" id="cu_number" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกเป็นตัวเลขเท่านั้น'); this.value='';}" maxlength="13"/>
									</div> 
                                    <div class="6u 12u$(xsmall)">
										<label for="number">เบอร์โทรศัพท์</label>
										<input type="text" name="cu_phone" id="cu_phone" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกเบอร์โทรศัพท์เท่านั้น'); this.value='';}" maxlength="10"/>
									</div> 
                                    <div class="6u 12u$(xsmall)">
										<label>วันเวลาเข้าที่พัก(Check-in)</label>
                                        <input type="datetime-local" name="date_select" id="date_select" />
									</div>
                                    <div class="6u 12u$(xsmall)">
										<label>วันเวลาออกที่พัก(Check-out)</label>
                                        <input type="datetime-local" name="date_select_end" id="date_select_end" />
   									</div>
									<div class="6u 12u$(xsmall)">
                                        <label for="name">รูปบัตรประชาชน</label>
                                        <ul class="actions fit">
										<li><a href="#" class="button fit"><input type="file" name="scor" ></a></li>
									</div>
								</div>
								</div>
						</section>
					</div>
				</div>             
<?php 
$sql4="select * from packet where inf_num='$inf_num'";
$que4=mysqli_query($mysqli,$sql4) or die(mysql_error());
$num=mysqli_num_rows($que4);
if($num!=0){												  
?>         
								
				<section class="wrapper alt spotlight style2">
					<section >
					<div class="inner">
						<h2 class="major">กรุณาเลือกแพ็คเกจ</h2>
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
										</tr>
									</thead>

<?php while($ss=mysqli_fetch_array($que4)){extract($ss);?>
									<tbody>
										<tr>
											<td><?php echo $pk_det ?></td>
											<td><?php echo $inc_money ?></td>
											<td><a href="?inf_num=<?php echo $inf_num ?>&pk_id=<?php echo $pk_id ?>">เลือกแพ็คเกจนี้</a></td>
										</tr>
									</tbody>
<?php }?> 
								</table>
							</section>
<?php  }?>                                        
<?php 
$pk_id=$_GET['pk_id'];
$sql5="select * from packet where pk_id='$pk_id'";
$que5=mysqli_query($mysqli,$sql5) or die(mysql_error());
$fq2=mysqli_fetch_array($que5);
$last_money=$fp['inf_money']+$fq2['inc_money'];
?>
							<section >
								<div class="6u 12u$(xsmall)">
									<label for="cu_email">ราคาโดยรวม</label>
									<input name="inf_name" type="text" id="inf_name" value="<?php echo $last_money?>" readonly />
								</div>
								<div class="12u$">
                                    <input name="inf_num" type="hidden" value="<?php echo $inf_num; ?>">
									<ul class="actions">
										<li><input type="submit" value="จองที่พัก" class="special" /></li>
										<a href="customer_us_form.php?inf_num=<?php echo $inf_num; ?>" >
										<li><input type="button" value="ยกเลิก" /></li>
										</a>
									</ul>
								</div>
							</section>
						</div>
						</div>
					</section>
					</form>
				</section>
                <!-- Scripts -->
<?php require('html_script.php'); ?>
	</body>
</html>
                             
