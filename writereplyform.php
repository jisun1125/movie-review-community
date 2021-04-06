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
<div id="input_form">
	<h2>댓글 등록</h2>
	<form method="post" action="writereply.php">
		댓글: <br/>
		<textarea name="memo" cols="50" rows="10" maxlength="5000"></textarea>
		<input type="hidden" name="reviewid" value="<?php echo $_GET['reviewid']; ?>"/>
		<br/>
		<br/>
		<input type="submit" value="댓글 등록"/>
	</form>
</div>
<?php
	require_once("footer.php");
?>
