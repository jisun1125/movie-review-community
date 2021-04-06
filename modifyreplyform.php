<?php
	require_once("session.php");
?>
<?php
	require_once("session.php");
	require_once("header.php");
	require_once("nav.php");
	
?>
<h2>댓글 수정</h2>
<?php
	if (!isset($_SESSION['id'])){
		exit('<div id="input_form"><a href="main.php">로그인 상태가 아닙니다. 홈으로</a></div></body></html>');
	}
?>
	<div id=input_form>
	<form method="post" action="modifyreply.php">
		댓글: <br/>
		<textarea name="memo" cols="50" rows="10" maxlength="5000"></textarea>
		<input type="hidden" name="replyid" value="<?php echo $_POST['replyid']; ?>"/>
		<br/>
		<br/>
		<input type="submit" value="수정"/>
	</form>
	</div>
<?php
	require_once("footer.php");
?>
