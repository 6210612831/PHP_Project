<?php

 require('connect.php'); 
unset($_SESSION['personal']);
unset($_SESSION['login']);
redirect('index.php');
exit();
?>

