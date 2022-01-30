<?php require('connect.php'); ?>
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
<script language="javascript">
function check(){
if(document.form1.email.value=="")
	{
	alert('กรุณาป้อนชื่อผู้ใช้');
	document.form1.email.focus();
	return false;
	}
else if(document.form1.password.value=="")
	{
	alert('กรุณาป้อนรหัสผ่าน');
	document.form1.password.focus();
	return false;
	}
else{return true;}
}
</script>
    		<!-- Page Wrapper -->
			<div id="page-wrapper">
							<div class="wrapper">
								<div class="inner">
				<!-- Header -->
					<?php require('head.php'); ?>
				<!-- Menu -->
					<?php include('menu.php'); ?>
                       
									<section>
										<h3 class="major">Log In</h3>
										<form method="post" action="login_save.php" id="form1" name="form1" onSubmit="return check()">
											<div class="row uniform">

												<div class="6u 12u$(xsmall)">
													<label for="email">อีเมลล์ที่ใช้ในเข้าสู่ระบบและติดต่อ</label>
													<input type="email" name="email" id="email" />
												</div>
                                                <div class="6u$ 12u$(xsmall)">
													<label for="password">รหัสผ่านในการเข้าสู่ระบบ</label>
                                                    <input name="password" type="password" id="password" value="" maxlength="20" />
												</div>
                                               
                                                &nbsp;
												<div class="12u$">
													<ul class="actions">
														<li><input type="submit" value="ตกลง" class="special" /></li>
														<li><input type="reset" value="ยกเลิก" /></li>
													</ul>
												</div>
											</div>
										</form>
									</section>
								</div>
                             </div>
						</div>
                        </div>
                <!-- Scripts -->
				<?php require('html_script.php'); ?>

					</body>
				</html>
                             
