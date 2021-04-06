<?php
	session_start();
	ob_start();
?>

<?php
	require_once("session.php");
	require_once("header.php");
	require_once("nav.php");
	
?>
<h2>로그인 결과</h2>
<?php
	require_once('dbcon.php');
	if (isset($_SESSION['id'])) {
	exit('<div id="input_form"><a href="main.php">세션을 통해서 로그인 정보를 확인했습니다.</a></div></body></html>');
	}
	if (empty($_POST['email']) || empty($_POST['pass'])){
		exit('<div id="input_form"><a href="javascript:history.go(-1)">로그인 폼을 채워주세요.</a></div></body></html>');
	}

	$dbc = mysqli_connect($host, $user, $pass, $dbname) or die("Error Connecting to MySQL Server");

	$email = mysqli_real_escape_string($dbc, trim($_POST['email']));
	$pass = mysqli_real_escape_string($dbc, trim($_POST['pass']));

	$query = "select id, email from user where email='$email' and password=SHA('$pass')";
	$result = mysqli_query($dbc, $query) or die ("Error Querying database.");
	if (mysqli_num_rows($result) == 1){
		$row = mysqli_fetch_assoc($result);
		$userid = $row['id'];
		$_SESSION['id'] = $userid;
		setcookie('id', $row['id'], time() + (60*60*24));
		setcookie('email', $row['email'], time() + (60*60*24));
		echo "<div id='input_form'>$email". "님의 로그인에 성공했습니다.<br/><br/><a href='/main.php'>홈으로</a></div>";
	}
	else{
		echo "<div id='input_form'>로그인에 실패했습니다.<br/><br/><a href='/main.php'>홈으로</a></div>";
	}

	mysqli_free_result($result);	
?>
<?php
	require_once("footer.php");
?>