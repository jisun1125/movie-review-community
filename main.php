<?php
	require_once("session.php");
	require_once("header.php");
	require_once("nav.php");
?>

<section class="model">
	<form method="post" action="searchreview.php">
	  <div id="searchbox"><input type="search" name="keyword" title="검색">
	  <input type="submit" value="Search"></div></br>
	</form>
	<div id="refresh">새로고침</div>
	<div id="write_review"><a href="writereviewform.php">리뷰 등록</a></div>
</section>

<?php
	require_once("footer.php");
?>
