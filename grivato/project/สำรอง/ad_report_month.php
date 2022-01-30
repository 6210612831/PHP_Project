<?php require('connect.php'); 
checkuser();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>report</title>
<link type="text/css" href="jquery/css/smoothness/jquery-ui-1.7.2.custom.css" rel="stylesheet" />	
<link rel="stylesheet" type="text/css" href="jquery/css/sunny/jquery.ui.theme.css">

<script type="text/javascript" src="jquery/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="jquery/js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript">
$(function(){
	// แทรกโค้ต jquery
   $("#date_start").datepicker({ dateFormat: 'yy-mm-dd'	,changeMonth: true,
      changeYear: true });
	$("#date_end").datepicker({ dateFormat: 'yy-mm-dd',changeMonth: true,
      changeYear: true,
	  numberOfMonths: 2,
      showButtonPanel: true });
 $("#date_select").datepicker({ dateFormat: 'yy-mm-dd'	,changeMonth: true,
      changeYear: true });	// รูปแบบวันที่ที่ได้จะเป็น 2009-08-16สามารถกำหนด เป็น
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

body {
	/* background-color: #FEF5ED; */
}
</style>


</head>

<body>
<?php echo 'ชื่อผู้ใช้',' ',$_SESSION[personal]['username']; ?>
<?php 
$ch=$_SESSION[personal]['level'];
if($ch==1){
redirect('Home.php');
exit();
}
?>
&nbsp;&nbsp; <a href="ad_borrow.php">ยืมอุปกรณ์</a>&nbsp; <a href="ad_restore.php">คืนอุปกรณ์</a>&nbsp; <a href="ad_repass.php">รหัสผ่านใหม่</a>&nbsp; <a href="ad_report.php">บันทึกการยืม</a>&nbsp; <a href="ad_logout.php">ออกจากระบบ</a>
<p align="center"><img src="srlogo.jpg" width="500" height="173" /></p>
<form id="form1" name="form1" method="get" action="">
  <label>
  <div align="center">ระบุเดือน  
    
    <label>
    <select name="m" id="m">
      <option value="12">ธ.ค.</option>
      <option value="02"></option>
      <option value="03"></option>
      <option value="04"></option>
        </select>
    </label>
    <label>
    <select name="y" id="y">
      <?php 
	  for($y=date('Y');$y<=2020;$y++){
	  ?>
      <option value="<?php echo $y ?>"><?php echo $y+543 ?></option>
      <?php }?>
        </select>
        
    </label>
    <input type="submit" name="Submit" id="Submit" value="ค้นหา" />
    <label>
    <select name="select" id="select">
      <?php 
	  $sqld="select * from admin where level='1' order by username asc";
//$sql="select * from student_list,register where student_list.stu_code=register.id  order by stu_code asc";//desc มาsกไปน้อย  asc น้อยไปมาก//
$resultd=mysql_query($sqld) or die(mysql_error());
	    while($rsd=mysql_fetch_array($resultd)){
	
	  ?>
      <option value="<?php echo $rsd[username] ?>"><?php echo $rsd[username] ?></option><?php }?>
    </select>
    </label>
  </div>
  </label>
</form>
</p>
<?php
$username=$_SESSION[personal1]['username'];
$date=$_GET["y"].'-'.$_GET["m"];
if($date){$str="and bor_list.bor_date like '$date%'";}
$sql2="select * from bor_list,it where bor_list.bor_it_code=it.it_code $str order by bor_list.bor_it_code asc";
//$sql="select * from student_list,register where student_list.stu_code=register.id  order by stu_code asc";//desc มาsกไปน้อย  asc น้อยไปมาก//
$result=mysql_query($sql2) or die(mysql_error());
$num=mysql_num_rows($result);
?>
</p>
<table width="756" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="66" height="28"><div align="center">ลำดับ</div></td>
    <td width="77"><div align="center">ชื่อผู้ยืม</div></td>
    <td width="130"><div align="center">ชื่ออุปกรณ์ที่ยืม</div></td>
    <td width="104"><div align="center">จำนวนที่ยืม</div></td>
    <td width="153"><div align="center">วันที่ยืม</div></td>
    <td width="113"><div align="center">สถานะ</div></td>
    <td><div align="center"></div></td>
  </tr>
  <?php
  $i=0;
  while($rs=mysql_fetch_array($result)){
  $i++;
  extract($rs);
  ?>
  <tr>
    <td height="27"><div align="center"><?php echo $i; ?></div></td>
    <td><div align="left"><?php echo $bor_code ?></div>    </td>
    <td><div align="left"><?php echo $it_name ?> </div></td>
    <td><div align="left"><?php echo $bor_amount ?> </div></td>
    <td><?php echo ThaiDateLong($bor_date);?></td>
    <td><?php if($bor_status==0){echo "คืนแล้ว";}else{echo "ยังไม่คืน";} ?>&nbsp;</td>
    <td width="97"><?php if($bor_status==1){?>
    <div align="center"><a href="ad_report_edit.php?bor_num=<?php echo $bor_num; ?>">แก้ไข</a></div>
    <?php }else echo "---";?>
    </td>
  </tr>
  <?php }?>
</table>
</body>
</html>
