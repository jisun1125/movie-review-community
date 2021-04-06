<?php
	$dbc = mysqli_connect("127.0.0.1", "root", "apmsetup", "mysong") or die("Error: Connect");
	
	//제이슨을 읽어다가 출력해주는 코드
	
	mysqli_query($dbc, "set names utf8");
	$query = "select * from song";
	$result = mysqli_query($dbc, $query) or die ("Error: Query");
	$json = array();
	if (mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result)){
			//echo $row["name"];
			$json["list"][] = $row;
			//중괄호는 객체를 나타낸다
			//이거 실행했ㅇ르때 나오는 {"name":"180?","singer":"?","number":"92627","favorite":"50"} 이거 한줄이 객체를 말함
		}
	}
	echo json_encode($json);
	mysqli_free_result($result);
	mysqli_close($dbc);
?>