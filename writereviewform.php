<?php
	require_once("session.php");
?>
<?php
	require_once("session.php");
	require_once("header.php");
	require_once("nav.php");
	
?>
<?php
	if (!isset($_SESSION['id'])){
		exit('<div id="input_form"><a href="main.php">로그인 상태가 아닙니다. 홈으로</a></div></body></html>');
	}
?>
	<div id=input_form>
	<h1>영화 리뷰 등록</h1>
	<form method="post" enctype="multipart/form-data" action="writereview.php">
		리뷰 메모 </br>
		<textarea name="memo" cols="50" rows="10"></textarea>
		<br/>
		<br/>
		리뷰 이미지<br/>
		<input type="file" name="picture"/>
		<br/>
		<br/>
		<input type="submit" value="리뷰 등록"/>
	</form>
	</div>
<?php
	require_once("footer.php");
?>
