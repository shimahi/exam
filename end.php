<?php 
ini_set('display_errors', 1);
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
require_once('audio_energy.php');


$tableName = $_POST['userName'];
$first = $_POST['first'];
$bar = $_POST['bar'];
$random = range( 0, 40 );
$count = $_POST['count'];
$first +=1;
$count +=1;
$title = "end";

if($first >1){
  $k = $audiodata[$random[$count - 2]];
}else{
  $k = $audiodata[$random[$count - 1]];
}

$dbHost = "127.0.0.1"; 
$dbUser = "root";
$dbPass = "password";
$dbName = "exam_energy";
$sql = "CREATE TABLE $tableName (audio varchar(60) , value INT(10))"; 
$query = "insert into $tableName (audio, value) values ('$k', $bar)";
$conn = new mysqli($dbHost, $dbUser, $dbPass,$dbName);



//insertTheValueIntoDataBase
if($first > 1){
if($conn->connect_error){
  die($conn->connect_error);
}
if($conn->query($query)===TRUE){
}else{
  echo "insert failed";
}
$conn->close();
}

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

<body >
<div class="endOfExam" style="font-size: 24px; color:#888; font-family:Arial, sans-serif; text-align: center">
	It's done
  <br>
  	Thank you
 </div>

</body>
</html>