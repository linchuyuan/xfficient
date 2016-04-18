<!DOCTYPE html>
<html>
<head>
    <META CHARSET="UTF-8">
    <META name="description" content="Keep living, keep learning is what I aim for.">
    <link rel="shortcut icon" type="image/x-icon" href="/icons/xfficient_icon.png" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>
    <script src="javascript/html2canvas.js"></script>	
    <script src="javascript/image_process.js"></script>
    <script src="javascript/right_click.js"></script>
    <script src="javascript/function.js"></script>
    <link rel="StyleSheet" type="text/css" href="css/style.css" />


</head>
<body>
         <ul class="hide context">
                <li id="effect">Effect	-</li>
        </ul>

        <ul class="hide img">
		<li data-action="restore">Restore</li>
                <li data-action="invert">Invert</li>
                <li data-action="grayout">grayout</li>
		<li data-action="thresh">Threshold</li>
		<li data-action="blur">Blury</li>
		<li data-action="sobel">Sobel</li>
		<li data-action="laplace">Laplace</li>
        </ul>

	<div style="margin: 5px;border: 5px solid;background-color:dimgray;opacity:0.7" class="cover_upload">
	<form action="cover_upload.php" method="post" enctype="multipart/form-data" >
        	Section to upload:<input class="btn" type="file" name="fileToUpload" id="fileToUpload">
		Main background: <input class="btn" type="file" name="back_fileToUpload" id="back_fileToUpload">
        	<input class="btn" type="button" value="Save" id="save" name="save">
		<input class="btn" type="button" value="Edit" id="edit" name="edit">
		<input class="btn" type="button" value="Delete" id="delete_image" name="delete">
		<input class="btn" type="button" value="Clear Background" id="clear_background" name="cleart_background">
		<input class="btn" type="button" value="Rotate" id="rotate" name="rotate">
		<input class="btn" type="button" value="Filter" id="filter" name="filter">
	</form>
	</div>
	<div id="border" style="background-image: url('image/transparent_indicator.png');background-repeat:none;left:0;right:0;margin:auto;border: 5px solid">
		<div id = "work_area" style="position:absolute;height:90%;width:90%;margin:auto;right:0;left:0;">
	</div>
	</div>
        <div>
        	<input style="display:inline-block" class="btn image_process" type="button" value="+" id="focus_plus"> <p style="display:inline-block" id = "focus_state"> focus 1x </p>
		<input style="display:inline-block" class="btn image_process" type="button" value="-" id="focus_min">
                <script>
                        var focus_count = 1;
                        $("#focus_plus").click(function(){
                                if (focus_count < 3){
                                        focus_count++;
                                        document.getElementById("focus_state").innerHTML = "focus " +focus_count.toString() + "x";
                                }
                        });
                        $("#focus_min").click(function(){
                                if (focus_count > 1){
                                        focus_count--;
                                        document.getElementById("focus_state").innerHTML = "focus " +focus_count.toString() + "x";
                                }
                        });
                </script>
                <input style="display:inline-block" class="btn image_process" type="button" value="+" id="contrast_plus"> <p style="display:inline-block" id = "contrast_state"> contrast +0 </p>
                <input style="display:inline-block" class="btn image_process" type="button" value="-" id="contrast_min">
                <script>
                        var contrast_state = 0;
                        $("#contrast_plus").click(function(){
                                if (contrast_state <= 100 && contrast_state >= -100){
					if(contrast_state < 80){
                                        	contrast_state = contrast_state + 20;
					}
					if ( contrast_state >=0)
                                        	document.getElementById("contrast_state").innerHTML = "contrast +" +contrast_state.toString();
					else
						document.getElementById("contrast_state").innerHTML = "contrast " +contrast_state.toString();
                                }
                        });
                        $("#contrast_min").click(function(){
                                if (contrast_state < 100 && contrast_state > -100){
					if(contrast_state > -80){
                                        	contrast_state = contrast_state - 20;
					}
					if ( contrast_state >=0)
                                        	document.getElementById("contrast_state").innerHTML = "contrast +" +contrast_state.toString();
					else
                                                document.getElementById("contrast_state").innerHTML = "contrast " +contrast_state.toString();
                                }
                        });
                </script>
                <input style="display:inline-block" class="btn image_process" type="button" value="+" id="bright_plus"> <p style="display:inline-block" id = "bright_state"> Brightness +0 </p>
                <input style="display:inline-block" class="btn image_process" type="button" value="-" id="bright_min">
                <script>
                        var bright_state = 0;
                        $("#bright_plus").click(function(){
                                if (bright_state <= 100 && bright_state >= -100){
                                        if(bright_state < 80){
                                                bright_state = bright_state + 20;
                                        }
                                        if ( bright_state >=0)
                                                document.getElementById("bright_state").innerHTML = "Brightness +" +bright_state.toString();
                                        else
                                                document.getElementById("bright_state").innerHTML = "Brightness " +bright_state.toString();
                                }
                        });
                        $("#bright_min").click(function(){
                                if (bright_state < 100 && bright_state > -100){
                                        if(bright_state > -80){
                                                bright_state = bright_state - 20;
                                        }
                                        if ( bright_state >=0)
                                                document.getElementById("bright_state").innerHTML = "Brightness +" +bright_state.toString();
                                        else
                                                document.getElementById("bright_state").innerHTML = "Brightness " +bright_state.toString();
                                }
                        });
                </script>
        </div>
	
	
	<script>$("#border").width($("#work_area").width());$("#border").height($("#work_area").height());</script>
	<div id = "showroom" style="position:absolute;background-color:white;border: 5px solid black;width:90%;height:90%;margin:auto;right:0;left:0;top:0;bottom:0;display:none"></div>
	<canvas id="restore_backup" style="display:none;position:absolute;"></canvas>
	<canvas id="undo1" style="display:none;position:absolute;"></canvas>
	<canvas id="undo2" style="display:none;position:absolute;"></canvas>
	<canvas id="undo3" style="display:none;position:absolute;"></canvas>
	<!-- <canvas id="image_edit"  style="position:relative;width:100%;object-fit:contain;height:70%;margin:auto;left:0;right:0;"> -->
	
	<script>
	var id_count = 0;
	var z_index = 1;
	$("#fileToUpload").change(function(){
		var input = this;
		var drag_indicator = true;
		if(input.files && input.files[0]){
			var reader = new FileReader();
			reader.onload = function(event){
			var img = new Image();
			var canvas = document.createElement('canvas');
			$(canvas).css({"position":"absolute"});
			canvas.className = "image_edit";
			canvas.id = id_count + 1;
			id_count = id_count+1;
			img.src = event.target.result;
    			var ctx = canvas.getContext("2d");
			img.onload = function(){
			if ( $("#work_area").width() < $("#work_area").height()) {
				if (img.width > $("#work_area").width()){
					var ratio = $("#work_area").width()/img.width;
                                	img.width =  $("#work_area").width();
					img.height = img.height * ratio
                        	}
                        	if (img.height > $("#work_area").height()){
					var ratio = $("#work_area").width()/img.height;
                                	img.height =  $("#work_area").width();
					img.width = img.width * ratio;
                        	}
				canvas.width=img.width; canvas.height= img.height;
				ctx.drawImage(img, 0, 0,canvas.width,canvas.height);
			}
			else {
                                if (img.width > $("#work_area").width()){
                                        var ratio = $("#work_area").height()/img.width;
                                        img.width =  $("#work_area").height();
                                        img.height = img.height * ratio
                                }
                                if (img.height > $("#work_area").height()){
                                        var ratio = $("#work_area").height()/img.height;
                                        img.height =  $("#work_area").height();
                                        img.width = img.width * ratio;
                                }
                                canvas.width=img.width; canvas.height= img.height;
                                ctx.drawImage(img, 0, 0,canvas.width,canvas.height);
			}
			}
			$("#work_area").append(canvas);	
			$("#"+id_count).bind("mousedown",function(event){
				drag_indicator = true;
				var name = event.target.id;
				if( $("name").width() <= $("work_area").width() && $("name").height <= $("work_area").height){
				$("#"+name).css({"z-index":z_index});
				z_index = z_index + 1;
                		$(document.body).on("mousemove",function(event){
				if(drag_indicator){
					$("#"+name).offset({
						top: event.pageY  - img.height/2,
						left: event.pageX  - img.width/2, 
					});
				}
				});
				}
        		});
                        $("#"+id_count).bind("ontouchstart",function(event){
                                drag_indicator = true;
                                var name = event.target.id;
                                $("#"+name).css({"z-index":z_index});
                                z_index = z_index + 1;
                                $(document.body).on("mousemove",function(event){
                                if(drag_indicator){
                                        $("#"+name).offset({
                                                top: event.pageY  - img.height/2,
                                                left: event.pageX  - img.width/2, 
                                        });
                                }
                                });
                        });
			$(document.body).on("mouseup",function(event){
				drag_indicator = false;
                        });

		}
		}
		reader.readAsDataURL(input.files[0]);
	});
	$("#save").click(function() { 
        html2canvas($("#work_area"), {
            onrendered: function(canvas) {
                theCanvas = canvas;
                document.body.appendChild(canvas);

                // Convert and download as image 
                //Canvas2Image.saveAsPNG(canvas); 
		$("#work_area").hide(100);
		$("#showroom").html('');
                $("#showroom").append(canvas);
		$("#showroom").finish().toggle(100);
                // Clean up 
                //document.body.removeChild(canvas);
            }
        });
    	});
	$("#edit").click(function() { $("#work_area").finish().toggle(100);$("#showroom").hide(100);});
	
	</script>
</body>
</html>
