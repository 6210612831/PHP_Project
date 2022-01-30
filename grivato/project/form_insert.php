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
		<script language="javascript">
			function check(){
			if(document.form_insert.inf_name.value==""){
			alert('กรุณาป้อนชื่อที่พัก');
			document.form_insert.inf_name.focus();
			return false;
			}
			else if(document.form_insert.myfile.value==""){

			alert('กรุณาใส่รูปที่พัก');
			document.form_insert.myfile.focus();
			return false;
			}
			else if(document.form_insert.inf_money.value==""){

			alert('กรุณาใส่ราคาเข้าพัก');
			document.form_insert.inf_money.focus();
			return false;
			}
			else if(document.form_insert.inf_where.value==""){

			alert('กรุณาใส่ตำแหน่งที่พัก');
			document.form_insert.inf_where.focus();
			return false;
			}
			else if(document.form_insert.inf_many.value==""){

			alert('กรุณาใส่จำนวนผู้เข้าพักโดยประมาณ');
			document.form_insert.inf_many.focus();
			return false;
			}
			else if(document.form_insert.inf_room.value==""){

			alert('กรุณาใส่จำนวนห้องพักที่คุณมี');
			document.form_insert.inf_room.focus();
			return false;
			}
			else{return true;}
			}
			</script>
	</head>
	<body>
<?php $us_status=$_SESSION['personal']['us_status']; if($us_status<2){redirect("index.php");}?>
    	<!-- Page Wrapper -->
			<div id="page-wrapper">
				<!-- Header -->
<?php require('head.php'); ?>
				<!-- Menu -->
<?php require('menu.php'); ?>
<?php 
$ch=$_SESSION['personal']['us_status'];
if($ch=='M'){
redirect('index.php');
exit();
}
?>
			<section id="wrapper">
				<header>
					<div class="inner">
						<h2 class="major">เพิ่มข้อมูลที่พักของคุณ</h2>
					</div>
				</header>
				<div class="wrapper">
					<div class="inner">
						<section>
                            <form name="form_insert" method="post" onSubmit="return check()" action="form_insert_save.php" enctype="multipart/form-data">
								<div class="6u 12u$(xsmall)">
									<label for="name">ชื่อที่พัก</label>
									<input name="inf_name" type="text" id="inf_name" value="" maxlength="50" />
								</div>
								<div class="6u$ 12u$(xsmall)">
									<label for="name">รูปที่พัก</label>
									<ul class="actions fit">
									<li><a href="#" class="button fit"><input type="file" name="myfile" ><input type="hidden" name="us_email" id="us_email" value="<?php echo $_SESSION['personal']['us_email']; ?>" /></a></li>
									</ul>
								</div>
								<div class="6u 12u$(xsmall)">
									<label for="prices">ราคาเข้าพัก</label>
									<input type="text" name="inf_money" id="inf_money" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกราคาที่เป็นตัวเลขเท่านั้น'); this.value='';}" maxlength="8"/>
								</div>
								<div class="6u$ 12u$(xsmall)">
									<label for="where">ตำแหน่งที่พัก</label>
									<input name="inf_where" type="text" id="inf_where" value="" />
								</div>
									<div class="6u">
									<label for="many">จำนวนผู้พักโดยประมาณ</label>
									<input name="inf_many" type="text" id="inf_many" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกจำนวนคนที่เป็นตัวเลขเท่านั้น'); this.value='';}" maxlength="2" />
								</div>
									<div class="6u 12u$">
									<label for="room">จำนวนห้องพักที่คุณมี</label>
									<input name="inf_room" type="text" id="inf_room" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกจำนวนคนที่เป็นตัวเลขเท่านั้น'); this.value='';}" maxlength="2" />
								</div>
								<div class="12u$">
									<label for="message">ข้อมูลเพิ่มเติมที่พัก</label>
									<textarea name="inf_det" id="inf_det" rows="4" ></textarea>
								</div>
								<div class="12u$">
									<ul class="actions">
										<li><input type="submit" value="ตกลง" class="special" /></li>
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
                             
