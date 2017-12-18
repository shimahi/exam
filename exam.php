<?php 
ini_set('display_errors', 1);
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
require_once('audio_energy.php');

$tableName = $_POST['userName']; //tableNamedBySubject
$first = $_POST['first'];
$bar = $_POST['bar'];	//barIsValueSubjectReplied
$random = range( 0, 39 );

$count = $_POST['count'];
if($first < 40){
$first +=1;
$count +=1;
}




if($first >1){
$k = $audiodata[$random[$count - 2]];
}else{
	$k = $audiodata[$random[$count - 1]];
}


$dbHost = "127.0.0.1"; 
$dbUser = "root";
$dbPass = "password";
$dbName = "exam_energy";
$sql = "CREATE TABLE $tableName (audio varchar(60) , value INT(10))"; //createTable


$query = "insert into $tableName (audio, value) values ('$k', $bar)";
$conn = new mysqli($dbHost, $dbUser, $dbPass,$dbName);

//createTableOnlyFirstPost
if($first == 1){
if($conn->connect_error){
	die($conn->connect_error);
}
if($conn->query($sql)===TRUE){
	// echo "table created";
}else{
	// echo "table failed";
}
$conn->close();
}

//insertTheValueIntoDataBase
if($first > 1){
if($conn->connect_error){
	die($conn->connect_error);
}
if($conn->query($query)===TRUE){
	// echo "inserted";
}else{
	// echo "insert failed";
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

  <title><?=h("examination")?></title>
</head>
<body>
  <?php // echo "Name = ".$tableName; ?>
  <br>
  <?php // echo "number=".$number;?>
  <br>
  <?php // echo "value=".$bar;?>
  <div id="main">
  	<audio id="sound" preload="auto">
 		<source src="<?php echo "audiodata/".$audiodata[$random[$count - 1]].".wav" ?>" type="audio/wav"/>
   		Your browser does not support the audio element.
	</audio>
	<div class="button-position">
		<div class="general-button" onclick="audioPlay()">
			<div class="button-content">
				<div class="icon-font" id="button" >play</div>  
			</div>
		</div>
	</div>
	<div class="mojinoiro">
	  <?php 

	$link = "";
	if($count < 40){
		$link = "exam.php";

	}else{
		$link = "end.php";
	}
	?>
		<form action="<?php echo $link ?>" method="post" autocomplete="off">
		<output id="output1"></output>
		<br>
		<label>
			<input type="hidden" name="count" value="<?php echo $count;?>">
			<input type="hidden" name="userName" value="<?php echo $tableName?>">
			<input type="hidden" name="first" value="<?php echo $first;?>">
			<input type="number" name="bar" class="custom" pattern="\d*"/ step="0.000000000001" required>
		</label>
		<br>
  		<input class="submit_button" type="submit" value="next" >
		</form>
	</div>
  </div>
</body>
</html>