<?php 
ini_set('display_errors', 1);
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
require_once('audio_energy.php');


$random = [24,17,22,23,28,5,3,35,12,31,33,27,39,8,26,7,14,1,0,25,38,37,4,18,16,29,15,34,13,11,30,36,2,32,6,21,20,9,10,19];

$tableName = $_POST['userName']; 
$count = $_POST['count'];
$count +=1;

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
	if($count < 16){
		$link = "renshu.php";
	}elseif($count == 16){
		$link = "ready.php";
	}
	?>

	<div class="mojinoiro">
		<form action="<?php echo $link ?>" method="post" autocomplete="off">
		<output id="output1"></output>
		<br>
		<label>
			<input type="hidden" name="count" value="<?php echo $count;?>">
			<input type="hidden" name="userName" value="<?php echo $tableName?>">
		</label>
		<br>
  		<input class="submit_button" type="submit" value="next" >
		</form>
	</div>
  </div>
</body>
</html>