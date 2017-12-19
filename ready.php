<?php
ini_set('display_errors', 1);
date_default_timezone_set('Asia/Tokyo');
$timestamp = time();
$t = date( "YmdHis", $timestamp);

$tableName = $_POST['userName']; 

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
  <title>Start</title>
</head>
<body>
<div class="endOfExam" style="font-size: 16px; color:#888; font-family:Arial, sans-serif; text-align: center">
これから本試行を始めます。<br>
<ul style="text-align:left; padding-left: 390px; margin: 4px" >
<li>呈示された旋律の「速さ」について、あなたが感じた数をテキストエリアに入力してください。</li>
<li>必ず正の数を入力してください。</li>
<li>「 ▷ 」ボタンを押せば、何度でも呈示音を聞くことができます。</li>
<li>数を入力したら「next」ボタンを押して、次の試行へ進んでください。</li>
<li>画面に”実験は終了です。お疲れ様でした。”というメッセージが表示されたら、実験終了です。</li>
</ul>
</div>
  <form action="exam.php" method="post"  autocomplete="off" style="padding-right:110px">
	<input type="hidden" name="userName" value="<?php echo $tableName?>">
  	<input type="hidden" name="bar" value=0>
    <input type="hidden" name="k" value=0>
    <input type="hidden" name="count" value=0>
  	<input type="submit" class="start_button" value="start">
  </form>
</body>
</html>


