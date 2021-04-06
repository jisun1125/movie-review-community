<?php
	session_start();
	ob_start();
?>
<?php
	require_once("session.php");
	require_once("header.php");
	require_once("nav.php");
	
?>
<h2>로그아웃 결과</h2>
<?php
	require_once('dbcon.php');
	
	if (!isset($_SESSION['id'])) {
		exit('<div id="input_form"><a href="main.php">로그인 상태가 아닙니다. 홈으로</a></div></body></html>');
	}
	
	$_SESSION = array();
	
	if (isset($_COOKIE[session_name()])){
		setcookie(session_name(), '', time() - (60*60));
	}
	
	session_destroy();
	
	setcookie('id', '', time() - (60*60));
	setcookie('email', '', time() - (60*60));
	echo '<div id="input_form">로그아웃하였습니다.</br><a href="main.php">홈으로</a></div>';
?>
<?php
	require_once("footer.php");
?>