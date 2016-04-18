jQuery(document).ready(function ($) {
var name ;
var restore_index = "null";
var image_array;
var undo = ["undo1","undo2","undo3"];
var undo_index = 0;
/*$("#work_area").bind("contextmenu", function (event) {

    name = event.target.id;
    event.preventDefault();
            if ( restore_index !== name){
                restore_index = name;
                var imgData = get_pixel(name);
		var c = document.getElementById("restore_backup");
		c.width = imgData.width;
		c.height = imgData.height;
                draw_image(imgData, "restore_backup");
        	}

    $(".context").finish().toggle(100).


    css({
        top: event.pageY + "px",
        left: event.pageX + "px"
    });
});*/

$("#work_area").click(function(event){
if (event.target.className !== "btn image_process"){
	name = event.target.id;
    	event.preventDefault();
            if ( restore_index !== name){
                restore_index = name;
                var imgData = get_pixel(name);
                var c = document.getElementById("restore_backup");
                c.width = imgData.width;
                c.height = imgData.height;
                draw_image(imgData, "restore_backup");
            }
	image_array = get_pixel(name);
}
});

$("#filter").click( function (event) {
    $(".img").finish().toggle(100).


    css({
        top: event.pageY + "px",
        left: event.pageX + "px"
    });
});

$("#effect").bind("mouseover", function (event) {
    
    event.preventDefault();
    $(".img").finish().toggle(100).
    

    css({
        top: event.pageY + "px",
        left: event.pageX + "px"
    });
});


$(document).bind("mousedown", function (e) {
    if (!$(e.target).parents(".img").length > 0) {
        
	$(".img").hide(100);
    }
});

$("#delete_image").click(function(){
	alert("Done");
	document.getElementById(name).parentNode.removeChild(document.getElementById(name));
});

$(".img li").click(function(){    
	switch($(this).attr("data-action")) {
	case "restore":
		image_array = get_pixel("restore_backup");
		draw_image(image_array,name);
	break;
	case "invert":
		draw_image(invert_image(image_array),name);
	break;
	case "grayout":
		draw_image(grayout_image(image_array),name);
	break;
	case "thresh":
		 draw_image(threshold_image(image_array,200),name);
	break;
        case "blur":
                var filter = [1/9,1/9,1/9,1/9,1/9,1/9,1/9,1/9,1/9];
                var divisor = 0;
                for ( var j = 0; j < 9; j++){
                        divisor = divisor + filter[j];
                }
                draw_image(convolute(image_array,filter,divisor),name);
        break;
        case "sobel":
                var filter = [-1,0,1,-2,0,2,-1,0,1];
                var divisor = 0;
                for ( var j = 0; j < 9; j++){
                        divisor = divisor + filter[j];
                }
                draw_image(convolute(image_array,filter,divisor),name);
        break;
        case "laplace":
		alert( "Apply one or two times Sharpen-Filter before Laplace will make your Image better"); 
                var filter = [1,1,1,1,0.7,-1,-1,-1,-1];
                var divisor = 0;
                for ( var j = 0; j < 9; j++){
                        divisor = divisor + filter[j];
                }
                draw_image(convolute(image_array,filter,divisor),name);
        break;
}
  
image_array = get_pixel(name);
    $(".img").hide(100);
});

$("#focus_plus").click(function(){
	if (undo_index < 2){
		image_array = get_pixel(name);
                var filter = [0,-1,0,-1,6,-1,0,-1,0];
                var divisor = 0;
                for ( var j = 0; j < 9; j++){
                        divisor = divisor + filter[j];
                }
                draw_image(convolute(image_array,filter,divisor),name);
                c = document.getElementById(undo[undo_index]);
                c.width = image_array.width;
                c.height = image_array.height;
                draw_image(image_array, undo[undo_index]);
                undo_index++;
	}
});
$("#focus_min").click(function(){
		if(undo_index === 0){}
		else{
			var go_back_array = get_pixel(undo[undo_index-1]);
			draw_image(go_back_array,name);
			image_array = go_back_array;
			if (undo_index > 0){undo_index --}; 
		}		
});

$("#bright_plus").click(function(){
		image_array = get_pixel(name);
		draw_image(brighten_image(image_array,5),name);
});
$("#bright_min").click(function(){
		image_array = get_pixel(name);
                draw_image(brighten_image(image_array,-5),name);
});


$("#contrast_plus").click(function(){
		image_array = get_pixel(name);
                draw_image(contrastImage(image_array,5),name);
});
$("#contrast_min").click(function(){
		image_array = get_pixel(name);
                draw_image(contrastImage(image_array,-5),name);
});
});
