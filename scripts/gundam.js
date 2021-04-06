$(document).ready(function(){
	// $("header").click(function(){
		// $("img").fadeIn(1000);
		// $("p").fadeIn(1000);
	// });
	// $("img").click(function(){
		// $(this).animate({height: '+=300px', width: '+=300px'});
	// });
	// $("p").hover(function(){
		// $(this).animate({height: '+=10px', width: '+=10px'}, 100);
	// },
	// function(){
		// $(this).animate({height: '-=10px', width: '-=10px'}, 100);
	// });
	$("#btn_grade_desc").click(function(){
		if ($(this).text()=="표시 안함"){
			$(this).text("표시");
		}
		else{
			$(this).text("표시 안함");
		}
		$(".grade_desc").slideToggle(1000);
	});
	
	
	
	$("h3").click(function(){
		$(this).siblings().slideToggle(100);
	});

	// $("#refresh").click(function(){
		// $(".model").append(""
	// });
	// $("#refresh").click(function(){
		// $.ajax({
			// url: "listreview.php",
			// cache: false,
			// dataType: "xml",
			// success: function(xml){
				// $(xml).find("review").each(function(){
					// var review = '<article class="review">\
					// <div class="img_frame">\
						// <img class="user_image"src="' + 
							// $(this).find("user_image").text() + '" alt="Gundam Picture" />';
					// review += '<div class="user_memo"><p>' + $(this).find("user_memo").text() + '</p></div>';
					// review += '<div class="user_info">';
					// review += '<div class="user_thumbnail" src="' + $(this).children("user_info").find("user_thumbnail").text() + '" alt="User Image"/>';
					// review += '<div class="user_email">' + $(this).children("user_info").find("user_email").text() + '</div>';
					// review += '<div class="user_date">' + $(this).children("user_date").text() + '</div>';
					// review += '</div></div>';
					// review += '<section class="review_reply">';
					// review += '</section>';
					// review += '</article>';
					// $(".model").append(review);
				// });
			// }
			// ,
			// error:function (xhr, ajaxOptions, thrownError){
				// alert(xhr.status);
				// alert(thrownError);
			// }
		// });
	// });	
	refreshreview();
	
	$("#refresh").click(refreshreview);
	
	function refreshreview(){
		$.getJSON("listreviewjson.php",function(json){
			$(".review").remove();
			$.each(json.review, function(){
				var review = '<article class="review">\
				<div class="img_frame">\
					<img class="user_image" src="getpicture.php?reviewid=' + this["reviewid"] + '" alt="Picture" />';
				review += '<div class="user_memo"><p>' + this["memo"] + '</p></div>';
				
				review += '<div class="user_info">';
				review += '';
				review += '<form method="POST" action="modifyreviewform.php">';
				review += '<input type="hidden" name="reviewid" value="'+ this["reviewid"] +'"/>';
				review += '<div class="btn_modify"><input type="submit" value="수정"/>';
				review += '</div></form>';
				review += '<form method="POST" action="deletereview.php">';
				review += '<input type="hidden" name="reviewid" value="'+ this["reviewid"] +'"/>';
				review += '<div class="btn_delete"><input type="submit" value="삭제"/></div>';
				review += '</form>';
				review += '<div class="user_thumbnail" src="userimage.php?email=' + this["email"] + '" alt="User Image"/>';
				review += '<div class="user_email">' + this["email"] + '</div>';
				review += '<div class="user_date">' + this["time"] + '</div>';
				review += '</div></div>';
				review += '<section class="review_reply">';
				review += '<div id="write_reply"><a href="writereplyform.php?reviewid=' + this["reviewid"] + '">댓글 등록</a></div>';
				
				if(this.reply){
					//$(".review").remove();
					$.each(this.reply, function(){
						var reply = '<article class="reply">';
						reply += '<div class="user_reply"><p>' + this["memo"] + '</p>';
						reply += '<div class="user_info">';
						
						reply += '<form method="POST" action="modifyreplyform.php">';
						reply += '<div class="btn_modify"><input type="submit" value="수정"/>';
						
						reply += '<input type="hidden" name="replyid" value="'+ this["replyid"] +'"/>';
						reply += '</div></form>';
						reply += '<form method="POST" action="deletereply.php">';
						reply += '<input type="hidden" name="replyid" value="'+ this["replyid"] +'"/>';
						reply += '<div class="btn_delete"><input type="submit" value="삭제"/></div>';
						reply += '</form>';
						reply += '<div class="user_thumbnail" src="userimage.php?email=' + this["email"] + '" alt="User Image"/>';
						reply += '<div class="user_email">' + this["email"] + '</div>';
						reply += '<div class="user_date">' + this["time"] + '</div>';
						reply += '</div>';
						
						reply += '</article>';
						review += reply;
					});
				}			
				review += '</section>';	
				review += '</article>';
				$(".model").append(review);
					
			});

		});
	}
});