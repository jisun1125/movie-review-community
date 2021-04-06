<?php
	require_once("session.php");
?>
<?php
	require_once("session.php");
	require_once("header.php");
	require_once("nav.php");
	
?>
<h2>댓글 등록 결과</h2>
<?php
	require_once('dbcon.php');

	if (empty($_SESSION['id'])){
		exit('<div id="input_form"><a href="main.php">로그인 상태가 아닙니다. 홈으로</a></div></body></html>');
	}
	if (empty($_POST['memo'])){
		exit('<div id="input_form"><a href="javascript:history.go(-1)">입력 폼을 채워주세요.</a></div></body></html>');
	}

	$dbc = mysqli_connect($host, $user, $pass, $dbname) or die("Error Connecting to MySQL Server");
	
	$reviewid = mysqli_real_escape_string($dbc, trim($_POST['reviewid']));
	$id = $_SESSION['id'];
	$memo = mysqli_real_escape_string($dbc, trim($_POST['memo']));

	mysqli_query($dbc, 'set names utf8');
	$query = "insert into reply values (null, $reviewid, $id, NOW(), '$memo')";
	$result = mysqli_query($dbc, $query) or die ("Error Querying database.". mysqli_error($dbc));
	mysqli_close($dbc);
	
	echo "<div id='input_form'>댓글이 등록되었습니다.<br/><br/>";
	echo '<a href="/main.php">홈으로</a></div>';
?>
<?php
	require_once("footer.php");
?>
