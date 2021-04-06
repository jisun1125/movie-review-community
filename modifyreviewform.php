<?php
	require_once("session.php");
?>
<?php
	require_once("session.php");
	require_once("header.php");
	require_once("nav.php");
	
?>
<h2>영화 리뷰 수정</h2>
<?php
	if (!isset($_SESSION['id'])){
		exit('<div id="input_form"><a href="main.php">로그인 상태가 아닙니다. 홈으로</a></div></body></html>');
	}
?>
	<div id=input_form>
	<form method="post" enctype="multipart/form-data" action="modifyreview.php">
		리뷰 메모: <br/>
		<textarea name="memo" cols="50" rows="10"></textarea>
		<br/>
		리뷰 이미지<br/>
		<input type="file" name="picture"/>
		<br/>
		<br/>
		<input type="hidden" name="reviewid" value="<?php echo $_POST["reviewid"]; ?>"/>
		<input type="submit" value="리뷰 수정"/>
	</form>
	</div>
<?php
	require_once("footer.php");
?>
