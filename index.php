<?php
ini_set('display_errors', 1);
date_default_timezone_set('Asia/Tokyo');
$timestamp = time();
$t = date( "YmdHis", $timestamp);
?>
<!DOCTYPE html>
<html class="no-js">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="css/layout.css" />
  <script type="text/javascript" src="js/javascript.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script type="text/javascript" src="js/modernizr-2.6.2.min.js"></script>
</head>
<body>
  <form action="exam.php" method="post" onSubmit="return checkSubmit()" autocomplete="off">
  	<input class="username"  type="text" value="Name" onfocus="if(this.value==this.defaultValue){this.value=''}" onblur="if(this.value==''){this.value=this.defaultValue}" name="userName" required>
  	<input type="hidden" name="number" value=0>
  	<input type="hidden" name="bar" value=0>
  	<input type="submit" class="start_button" value="start">
  </form>
</body>
</html>


