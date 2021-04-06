<?php
	require_once("session.php");
	require_once("header.php");
	require_once("nav.php");
	
?>
<h2>검색 결과</h2>
<?php
	require_once('dbcon.php');
	
	$dbc = mysqli_connect($host, $user, $pass, $dbname) or die("Error Connecting to MySQL Server.");
	$keyword = $_POST['keyword'];
	mysqli_query($dbc, 'set names utf8');
	$query = "select reviewid, userid, email, memo, time from review, user where binary(memo) like '%$keyword%' order by time desc";
	$result = mysqli_query($dbc, $query) or die("Error Querying database.");
	if (mysqli_num_rows($result)==0){
		exit('<div id="input_form"><a href="javascript:history.go(-1)">검색결과가 없습니다. 돌아가기</a></div></body></html>');
	}
	echo '<article class="search">';
	while($row = mysqli_fetch_assoc($result)){
		echo '<div class="img_frame">';
		echo '<img class="user_image" src="getpicture.php?reviewid=' . $row['reviewid'] . '" alt="Picture" />';
		echo '<div class="user_memo"><p>' . $row['memo'] . '</p></div>';
		echo '<div class="user_info">';
		echo '<div class="user_thumbnail" src="userimage.php?email=' . $row['email'] . '" alt="User Image"/>';
		echo '<div class="user_email">' . $row['email'] . '</div></div>';
		echo '<div class="user_date">' . $row['time'] . '</div>';
		echo '</div></div>';
	}
	echo '</article>';
	mysqli_close($dbc);
?>

<?php
	require_once("footer.php");
?>
