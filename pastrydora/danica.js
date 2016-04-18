jQuery(document).ready(function ($) {
		var cover_url ; 
		var like_status = true;
		var reference_count = 0;
		var width=$(window).width();
		var height=$(window).height();
                $('#like').click(function(){
                        if(like_status){
                        $.ajax({
                                url: 'like.php',
                                type: "GET",
                                success: function(result){ like_status=false; document.getElementById("like_p").textContent = result + " people liked Danica Xu"}
                        });
                        }
                        else { alert("Your support means a lot!!!Thanks!"); }
                });
		$('#title').show();
		$('.item').css({
			top: 0.03 * height + 'px',
			'font-size': 0.03 * height +'px'
		});
		$('#title').css({
                        'font-size': 0.07 * width +'px'
                });
		$(document).click(function(event){  if(event.target.classList[0] != "inmail_item" && event.target.id != "contact") { $(".inmail").hide(100); }});
		$('#contact').click(function(){
                        $('.inmail').show(100);
                        $('#title').hide();
        	});
		$(".gif").hover(function(event){ 
			var id = event.target.id; var value = $("#"+id).attr("data-val"); $("#"+id).attr("src","image/"+value);
		}); 
		$('.center_post_image').click(function(event){
			var id = event.target.id;
			var name = id ;
			var reference = $("#"+name).attr("data-ref");
			var id = $("#"+id).attr("data-val");
			if (reference_count === 0 && reference === "gif"){
				$("#"+name).attr("src","image/"+id);
				reference_count = reference_count + 1;
			}
			else {
			document.getElementById("comment_reply").innerHTML = '<textarea id="' + id +'_title" data-val="' + id +'" type="text" placeholder="Your Name" style="position:absolute;margin:1%;top:0;left:0;width:15%;"></textarea><textarea id="' + id +'_comment" data-val="' + id +'" type="text" placeholder="Comments..." style="position:absolute;top:0;left:17%;margin:1%;width:60%;"></textarea><img class="reply_click_me" id="' + id +'_reply" data-val="' + id +'" style="position:absolute;top:0;left:79%;width:5%;height:100%;margin:0.5%;object-fit:contain;" src="image/comment.ico"><img id="' + id +'_like" data-val="' + id +'"  class="like_click_me" style="position:absolute;left:85%;top:0;margin:0.5%;width:5%;height:100%;object-fit:contain;" src="image/like.png">';
			$('.sheild').finish().toggle(100);
			$('#center_post').finish().toggle(100);
			$('.like_click_me').click(function(){alert("likeclicked")});
			$('.reply_click_me').click(function(){
				var post_content = $("#"+id+"_comment").val();
				var post_content_title = $("#"+id+"_title").val();
				if(post_content === "" || post_content_title === ""){alert("No empty comment or empty name allowed");}
				else {
				$.ajax({
					url: "php/post_comment.php",
					method:"POST",
					data:{ target:id, content:post_content, content_title:post_content_title},
					dataType: "json",
					success: function(result){
						var list = '';
                                        	$.each(result,function(i){
                                                	list = list + "<p style='border-top: solid 1px lightgray;line-height:100%;white-space:pre;margin-top:1%;margin-bottom:1%'><span style='color:blue'>"+result[i][0]+":</span> "+result[i][1]+"<br><span style='font-size:10px'>"+result[i][2]+"</span></p></br>";
                                        	});
                                        	document.getElementById("center_post_comments").innerHTML = list;

						}
				});
				}
				$("#"+id+"_title").val("");
				$("#"+id+"_comment").val("");
			});
			$.ajax({
				url: "php/read_comment.php",
				method: "POST",
				data: { target:id },
				dataType: "json",
				success: function(result){
					var list = '';
					$.each(result,function(i){
						list = list + "<p style='border-top: solid 1px lightgray;line-height:100%;white-space:pre;margin-top:1%;margin-bottom:1%'><span style='color:blue'>"+result[i][0]+":</span> "+result[i][1]+"<br><span style='font-size:10px'>"+result[i][2]+"</span></p><br>";
					});
					document.getElementById("center_post_comments").innerHTML = list;
				}
			});  } 
		});

		$('.sheild').click(function(){ $('.sheild').hide(100);$('#center_post').hide(100); reference_count = 0;});
	});
