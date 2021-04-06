<?php
	require_once("session.php");
	require_once("gundamheader.php");
	require_once("gundamnav.php");
	
?>

<section class="grade_desc">
	<table>
		<tr>
			<th>제목</th>
			<th>감독</th>
			<th>포스터</th>
			<th>출연진</th>
		</tr>
		<tr>
			<td>SD</td>
			<td colspan="2">Super Deforemd</td>
		</tr>
		<tr>
			<td>HG</td>
			<td>High Grade</td>
			<td rowspan="2">1/144</td>
		</tr>
		<tr>
			<td>RG</td>
			<td>Real Grade</td>
		</tr>
		<tr>
			<td>MG</td>
			<td>Master Grade</td>
			<td>1/100</td>
		</tr>		
	</table>
</section>
<div id="btn_grade_desc">표시 안함</div>

<section>
	<header><h2>건담 프라모델 등급<h2></header>
	<article id="SD">
		<h3>SD (Super Deforemd)</h3>
		<p>머리를 전체 비율에 비해 크게 표현한 모델</p>
		<td><img src="sd.jpg" alt="SD Gundam" style="width:200px;"/></td>
	</article>
	<article id="HG">
		<h3>HG (High Grade)</h3>
		<p>1/144 모델로서 가격이 매우 저렴하고 매우 다양한 라인업이 특징</p>
	</article>
	<article id="RG">
		<h3>RG (Real Grade)</h3>
		<p>MG를 HG 사이즈로 줄인 정교한 1/144 모델</p>
	</article>
	<article id="MG">
		<h3>MG (Master Grade)</h3>
		<p>1/100 모델로서 졍교함이 특징</p>
	</article>
</section>

<?php
	require_once("gundamfooter.php");
?>
