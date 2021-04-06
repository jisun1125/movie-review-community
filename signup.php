<?php
	require_once("session.php");
	require_once("header.php");
	require_once("nav.php");
	
?>
<h2>회원가입 결과</h2>
		<?php
			require_once('dbcon.php');
			
			if (empty($_POST['email']) || empty($_POST['pass']) || empty($_POST['passcon'])){
				exit('<div id="input_form"><a href="javascript:history.go(-1)">입력 폼을 채워주세요.</a></div></body></html>');
			}
			if (!isset($_FILES['userimg'])){
				exit('<div id="input_form"><a href="javascript:history.go(-1)">이미지 업로드 에러가 발생했습니다.</a></div></body></html>');
			}
			$dbc = mysqli_connect($host, $user, $pass, $dbname) or die("Error Connecting to MySQL Server");
			
			$email = mysqli_real_escape_string($dbc, trim($_POST['email']));
			$pass = mysqli_real_escape_string($dbc, trim($_POST['pass']));
			$passcon = mysqli_real_escape_string($dbc, trim($_POST['passcon']));
			$image = addslashes(file_get_contents($_FILES['userimg']['tmp_name']));
			$query = "select id from user where email='$email'";
			$result = mysqli_query($dbc, $query) or die ("Error Querying database.");
			if (mysqli_num_rows($result)!=0){
				exit('<div id="input_form"><a href="javascript:history.go(-1)">이미 등록된 e-mail입니다.</a></div></body></html>');
			}
			mysqli_free_result($result);
			
			mysqli_query($dbc, 'set names utf8');
			
			$query = "insert into user values (null, '$email', SHA('$pass'), '$image')";
			$result = mysqli_query($dbc, $query) or die ("Error Querying database.");
			mysqli_close($dbc);
			echo "<div id='input_form'><img src='userimage.php?email=$email' alt='User Image' style='width:80px;height:80px;'/><br/>";
			echo "$email". "님의 회원 가입을 축하드립니다.<br/><br/>";
			echo '<a href="/main.php">홈으로</a></div>';
		
		?>
<?php
	require_once("footer.php");
?>
