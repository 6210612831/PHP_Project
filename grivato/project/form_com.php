<?php require('connect.php'); checkuser();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>createsave</title>
</head>

<body>
<?php 
$ch=$_SESSION[personal]['us_status'];
if($ch < 1){
redirect('login.php');
exit();
}
?>
<form id="forminf" name="forminf" method="post" action="form_com_save.php">
  <div align="center">
    <table width="647" border="1" cellspacing="1" cellpadding="1">
       <tr>
        <td height="71"><div align="center">แสดงความคิดเห็น</div></td>
       <td width="419"><div align="center">
          <label>
          <textarea name="cm_inf" id="cm_inf" cols="65" rows="5"></textarea>
          </label>
      </div>      </tr>
    </table>
    <table width="647" border="1" cellspacing="1" cellpadding="1">
      <tr>
        <td width="189"><div align="center"></div></td>
        <td width="445"><input type="submit" name="submit" id="submit" value="ตกลง" />
          <label>
          <input name="reset" type="reset" id="reset" value="ยกเลิก" />
          <input type="hidden" name="inf_num" id="inf_num" value="<?php echo $inf_num ?>" />
        </label></td>
      </tr>
    </table>
  </div>
</form>
</body>
</html>