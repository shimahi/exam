<?php 
ini_set('display_errors', 1);
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
require_once('audio_energy.php');

/*
$tableName 新規作成するDBのテーブル名、値は被験者の氏名
$k         フォームを送った時点での音声ファイルの名前、DBにaudioとして格納される
$bar  	   被験者が入力する数値、DBにvalueとして格納される
$count     ページングの回数を記録、audio_energy.phpの配列番号に使う、40に達するとend.phpに移動する
$number    $kの参照に使う
$random    audio_energy.phpの順番を決める。$countで管理する
*/

$random = [14,73,35,9,34,16,18,59,66,27,58,40,70,8,72,55,1,71,68,22,50,41,31,38,65,56,24,76,20,78,0,43,79,12,7,17,4,36,62,30,69,64,23,49,77,29,48,42,57,39,5,28,6,60,51,15,74,10,61,53,21,75,46,44,47,3,52,26,67,11,13,32,2,54,45,33,25,37,19,63];

$tableName = $_POST['userName']; 
$k = $_POST['k'];
$bar = $_POST['bar'];	
$count = $_POST['count'];

if($count == 0){
$number = 0;
}else{
	$number = $_POST['number'];
}
$count +=1;


$dbHost = "127.0.0.1"; 
$dbUser = "root";
$dbPass = "password";
$dbName = "exam_energy";
$sql = "CREATE TABLE $tableName (audio varchar(60) , value INT(10))"; //createTable
$query = "insert into $tableName (audio, value) values ('$k', $bar)";
$conn = new mysqli($dbHost, $dbUser, $dbPass,$dbName);

//create table
if($count == 1){
if($conn->connect_error){
	die($conn->connect_error);
}
if($conn->query($sql)===TRUE){
	// echo "table created";
}else{
	 echo "table failed";
}
$conn->close();
}

//insert the Value into DataBase
if($count > 1){
if($conn->connect_error){
	die($conn->connect_error);
}
if($conn->query($query)===TRUE){

}else{
	 echo "<br>insert failed";
}
$conn->close();
}

$k = $audiodata[$random[$number]];
$number++;

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

	<?php 
	$link = "";
	if($count < 80){
		$link = "exam.php";
	}elseif($count == 80){
		$link = "end.php";
	}
	?>

	<div class="mojinoiro">
		<form action="<?php echo $link ?>" method="post" autocomplete="off">
		<output id="output1"></output>
		<br>
		<label>
			<input type="hidden" name="count" value="<?php echo $count;?>">
			<input type="hidden" name="userName" value="<?php echo $tableName?>">
			<input type="hidden" name="number" value="<?php echo $number;?>">
			<input type="hidden" name="k" value="<?php echo $k;?>">
			<input type="number" name="bar" class="custom" pattern="\d*"/ step="0.000000000001" value="" required>
		</label>
		<br>
  		<input class="submit_button" type="submit" value="next" >
		</form>
	</div>
  </div>
</body>
</html>