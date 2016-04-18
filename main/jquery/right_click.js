jQuery(document).ready(function ($) {


$(document).bind("taphold", function (event) {
if (!$(event.target).is(".file_browser .icon_right_click") && !$(event.target).is(".file_browser .img_right_click")&& !$(event.target).is(".file_browser .txt_right_click") ){

    event.preventDefault();

    $(".custom-menu").finish().toggle(100).


    css({
        top: event.pageY + "px",
        left: event.pageX + "px"
    });
 }});

$(document).bind("contextmenu", function (event) {
if (!$(event.target).is(".file_browser .icon_right_click") && !$(event.target).is(".file_browser .img_right_click")&& !$(event.target).is(".file_browser .txt_right_click") ){
   
    event.preventDefault();

    $(".custom-menu").finish().toggle(100).
    

    css({
        top: event.pageY + "px",
        left: event.pageX + "px"
    });
 }});


$(document).bind("mousedown", function (e) {
    if (!$(e.target).parents(".custom-menu").length > 0) {
        
        $(".custom-menu").hide(100);
    }
   
    if (!$(e.target).is(".file_browser #rename_input #rename_box #rename_submit")){
   	$("#rename_input").hide(100);
    }	
});

$(".custom-menu li").click(function(){    
    switch($(this).attr("data-action")) {
        
        case "new_folder":
	window.location.replace("/main/session/new_folder.php");
	break;
	case "refresh":
        window.location.replace("/main/main.php");
        break;
        case "default_background":
        window.location.replace("/main/session/default_bak.php");
        break;
        case "log_out": 
	window.location.replace("/main/session/log_out.php"); 
	break;
    }
  

    $(".custom-menu").hide(100);
});

});
