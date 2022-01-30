<?php 
// Connect
$mysqli = new mysqli('localhost','root','aaazaza',"project");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

// Init setting
ini_set('display_errors', 'Off');
session_start();
mysqli_query($mysqli,"SET NAMES UTF8");

// Setting function
function redirect($url)
{
      echo "<script type=\"text/javascript\">window.location='".$url."'</script>";  
}
function alert_text($msg)
{
      echo "<script type=\"text/javascript\">alert('$msg') </script>";
}
function checkuser()
{
    // if the session id is not set, redirect to login page
      if (!isset($_SESSION['personal']))
      {
        alert_text("กรุณาลงชื่อเข้าใช้ก่อนครับ");
        redirect("login.php");
        exit();
      }
}

function ThaiDateLong($date) 
{  
      $_month_name = array("01"=>"มกราคม","02"=>"กุมภาพันธ์",
      "03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม",
      "06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม",
      "09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน",
      "12"=>"ธันวาคม"); 
      $yy=substr($date,0,4);$mm=substr($date,5,2);$dd=substr($date,8,2);$time=substr($date,11,8);
      $yy+=543;
      // $dateT=intval($dd)." ".$_month_name[$mm]." ".$yy." ".$time;
      $dateT=intval($dd)." ".$_month_name[$mm]." พ.ศ. ".$yy;
        return $dateT; 
      }     //echo ThaiEachDate("2008-05-19"); 

      function ThaiDate($date){
      $_month_name = array("01"=>"ม.ค.","02"=>"ก.พ.","03"=>"มี.ค.","04"=>"เม.ย.","05"=>"พ.ค.","06"=>"มิ.ย.","07"=>"ก.ค.","08"=>"ส.ค.","09"=>"ก.ย.","10"=>"ต.ค.","11"=>"พ.ย.","12"=>"ธ.ค.");
      $yy=substr($date,0,4);$mm=substr($date,5,2);$dd=substr($date,8,2);$time=substr($date,11,8);
      $yy+=543;
      $dateT=intval($dd)." ".$_month_name[$mm]." ".$yy." ".$time;
      // $dateT=intval($dd)." ".$_month_name[$mm]." ".$yy;
      return $dateT;
}
?>
