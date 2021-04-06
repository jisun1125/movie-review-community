<?php
	require_once("session.php");
	require_once("header.php");
	require_once("nav.php");
	
?>

<h2>추천 영화 리스트</h2>
<table id="result">
<thead>
	<tr><th>제목</th><th>감독</th><th>출연진</th><th>개봉년도</th><th>장르</th><th>상영시간</th></tr>
</thead>
<tbody>
<?php
	$dbc = mysqli_connect("127.0.0.1","root", "root","moviedb")
		or die("Error: Connect");
	mysqli_query($dbc, "set names utf8");
	$query = "select * from movie";
	$result = mysqli_query($dbc, $query) or die("Error: Query");
	while($row = mysqli_fetch_array($result)){
		echo '<tr><td>' . $row['title'] . '</td><td>'. $row['director'] . '</td><td>'. $row['cast'] . '</td><td>'. $row['releaseyear'] . '년</td><td>'. $row['genre'] . '</td><td>'. $row['runningtime'] . '분</td></tr>'; 
	}
?>
</tbody>

</table>

<?php
	require_once("footer.php");
?>
