<?php 
ini_set('display_errors', 1);
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
require_once('audio_energy.php');


$random = [49,21,8,9,46,7,3,27,34,43,38,69,2,51,23,36,25,56,29,30,17,26,48,12,61,18,63,11,64,28,1,47,10,58,15,67,52,65,32,0,14,57,50,13,55,16,42,37,53,62,4,66,60,6,41,22,54,24,20,39,19,59,40,45,33,5,31,35,68,44];

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
	if($count < 14){
		$link = "renshu.php";
	}elseif($count == 14){
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
	<div class="count"><?php echo $count; ?>/14</div>
  </div>
</body>
</html>