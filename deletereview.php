<?php
	require_once("session.php");
?>
<?php
	require_once("session.php");
	require_once("header.php");
	require_once("nav.php");
	
?>
<h2>리뷰 삭제 결과</h2>
<?php
	require_once('dbcon.php');

	if (empty($_SESSION['id'])){
		exit('<div id="input_form"><a href="main.php">로그인 상태가 아닙니다. 홈으로</a></div></body></html>');
	}

	$dbc = mysqli_connect($host, $user, $pass, $dbname) or die("Error Connecting to MySQL Server");
	
	$reviewid = mysqli_real_escape_string($dbc, trim($_POST['reviewid']));

	mysqli_query($dbc, 'set names utf8');
	$query = "delete from review where reviewid=$reviewid";
	$result = mysqli_query($dbc, $query) or die ("Error Querying database.". mysqli_error($dbc));
	mysqli_close($dbc);
	
	echo "<div id='input_form'>게시글이 삭제되었습니다.<br/><br/>";
	echo '<a href="/main.php">홈으로</a></div>';
?>
<?php
	require_once("footer.php");
?>
