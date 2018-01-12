<?php 
ini_set('display_errors', 1);
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
require_once('audio_energy.php');
date_default_timezone_set('Asia/Tokyo');
$timestamp = time();
$t = date( "YmdHis", $timestamp);

$tableName = $_POST['userName']; 
$bar = $_POST['bar']; 
$k = $_POST['k'];
$count = $_POST['count'];

if($count == 0){
$number = 0;
}else{
  $number = $_POST['number'];
}

$dbHost = "127.0.0.1"; 
$dbUser = "root";
$dbPass = "password";
$dbName = "exam_energy";
$query = "insert into $tableName (audio, value, post_time) values ('$k', $bar, $t)";
$conn = new mysqli($dbHost, $dbUser, $dbPass,$dbName);

if($conn->connect_error){
  die($conn->connect_error);
}
if($conn->query($query)===TRUE){
  
}else{
  echo "insert failed";
}
$conn->close();
?>

<!DOCTYPE html>
<html class="no-js">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="css/layout.css" />
  <script type="text/javascript" src="js/javascript.js"></script>
  <script type="text/javascript" src="js/modernizr-2.6.2.min.js"></script>
  <title><?=h($title)?></title>
</head>

<body>
  <div class="endOfExam" style="font-size: 20px; color:#888; font-family:Arial, sans-serif; text-align: center">
    実験は終了です。お疲れ様でした。
 </div>
</body>
</html>