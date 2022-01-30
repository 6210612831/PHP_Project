<script language="javascript">
function check()
{
if(document.form1.name.value=="")
	{
	alert("กรุณาใส่ชื่อของคุณ");
	document.form1.name.focus();
	return false;
	}
else if(document.form1.email.value=="")
	{
	alert("กรุณาใส่อีเมลล์ของคุณ");
	document.form1.email.focus();
	return false;
	}
else if(document.form1.message.value=="")
	{
	alert("กรุณาใส่ข้อความที่ต้องการส่งหาผู้ดูแลระบบ");
	document.form1.message.focus();
	return false;
	}
else
	{
	return true;
	}
}
</script>
<section id="footer">
						<div class="inner">
							<h2 class="major">ติดต่อพวกเรา</h2>
							<p>เมื่อมีปัญหาการสั่งจอง การเพิ่มโรงแรมติดต่อพวกเราได้ ยินดีรับใช้ครับ</p>
							<form method="post" action="sent_word.php" name="form1" onsubmit="return check()" id="form1" >
								<div class="field">
									<label for="name">ชื่อ</label>
									<input type="text" name="name" id="name" value= "<?php echo $_SESSION['personal']['us_name']; ?>"/>
								</div>
								<div class="field">
									<label for="email">อีเมลล์</label>
									<input type="email" name="email" id="email" value="<?php echo $_SESSION['personal']['us_email']; ?>"/>
								</div>
								<div class="field">
									<label for="message">ข้อความถึงเรา</label>
									<textarea name="message" id="message" rows="4"></textarea>
								</div>
								<ul class="actions">
									<li><input type="submit" value="ส่งข้อความ" /></li>
								</ul>
							</form>
							<ul class="contact">
								<li class="icon solid fa-home">
									Thailand Inc<br />
									84000 Somewhere Road  #2894<br />
								</li>
								<li class="icon solid fa-phone">0860610124</li>
								<li class="icon brands fa-facebook-f"><a href="https://www.facebook.com/scorp1on-v1per">facebook.com/scorp1on-v1per</a></li>
							</ul>
							<ul class="copyright">
								<li>&copy; ScorP1on Inc. All rights reserved.</li><li>Design: <a href="http://html5up.net">This website create for learning only</a></li>
							</ul>
						</div>
					</section>