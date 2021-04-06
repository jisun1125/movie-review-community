<?php
	require_once("session.php");
?>
<?php
	require_once("session.php");
	require_once("header.php");
	require_once("nav.php");
	
?>
<h2>리뷰 수정 결과</h2>
<?php
	require_once('dbcon.php');
	
	if (empty($_SESSION['id'])){
		exit('<div id="input_form"><a href="main.php">로그인 상태가 아닙니다. 홈으로</a></div></body></html>');
	}
	if (empty($_POST['memo']) || empty($_FILES['picture']['tmp_name'])){
		exit('<div id="input_form"><a href="javascript:history.go(-1)">입력 폼을 채워주세요.</a></div></body></html>');
	}
	if (!isset($_FILES['picture'])){
		exit('<div id="input_form"><a href="javascript:history.go(-1)">이미지 업로드 에러가 발생했습니다.</a></div></body></html>');
	}
	$dbc = mysqli_connect($host, $user, $pass, $dbname) or die("Error Connecting to MySQL Server");
	$id = $_SESSION['id'];
	$reviewid = mysqli_real_escape_string($dbc, trim($_POST['reviewid']));
	$memo = mysqli_real_escape_string($dbc, trim($_POST['memo']));
	$image = addslashes(file_get_contents($_FILES['picture']['tmp_name']));
	
	mysqli_query($dbc, 'set names utf8');
	
	$query = "update review set picture='$image', memo='$memo', time=NOW(), userid='$id' where reviewid='$reviewid'";
	
	$result = mysqli_query($dbc, $query);
	mysqli_close($dbc);
	if ($result){
		echo "<div id='input_form'>리뷰가 수정되었습니다.<br/><br/>";
		echo '<a href="/main.php">홈으로</a></div>';
	}
	else{
		echo "<div id='input_form'>리뷰 수정에 실패했습니다.<br/><br/>";
		echo '<a href="/main.php">홈으로</a></div>';
	}
?>
<?php
	require_once("footer.php");
?>