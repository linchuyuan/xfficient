jQuery(document).ready(function ($) {

var name ;
var icon_location_top;
var icon_location_left;
var value;
var extension;

$(".img_right_click").bind("contextmenu", function (event) {

    event.preventDefault();

    name = event.target.id;
    value = event.target.value;
    value = $("#"+name).attr("data-value");
    icon_location_top = $("#"+name).position().top;
    icon_location_left = $("#"+name).position().left;

    $(".img").finish().toggle(100).

    css({
        top: event.pageY + "px",
        left: event.pageX + "px"
    });
});

$(".img_right_click").dblclick(function (event) {

    event.preventDefault();

    name = event.target.id;
    value = event.target.value;
    value = $("#"+name).attr("data-value");
    icon_location_top = $("#"+name).position().top;
    icon_location_left = $("#"+name).position().left;

    $(".img").finish().toggle(100).

    css({
        top: event.pageY + "px",
        left: event.pageX + "px"
    });
});


$('body').bind("mousedown", function (e) {

    if (!$(e.target).parents(".img").length > 0) {

        $(".img").hide(100);
    }
});

$(".img li").click(function(){


    switch($(this).attr("data-action")) {

        case "new_folder":
        window.location.replace("/main/session/new_folder.php");
        break;
	case "set_as_background":
        window.location.replace("/main/session/set_bak.php?target="+value);
        break;
	case "default_background":
        window.location.replace("/main/session/default_bak.php");
        break;	
        case "download":
        window.location.replace("/main/session/download.php?target="+value);
        break;
        case "delete":
        window.location.replace("/main/session/delete.php?target="+value);
        break;
        case "log_out":
        window.location.replace("/main/session/log_out.php");
        break;
    }


    $(".img").hide(100);
});

$("#img_rename").click(function (event) {
    event.preventDefault();
    $("#name_box").val(value);
    $("#"+name).hide(100);
    $("#rename_input").finish().toggle(100).
    css({
        top: icon_location_top - 3  + "px",
        left: icon_location_left - 2 + "px",
});				
   $("#rename_box").val(value);
   $("#rename_box").select();
	
});
$('body').bind("mousedown", function (e) {
	$("#"+name).show(100);
});


$(".img_right_click").click(function (event) {
  
    event.preventDefault();
    name = event.target.id;
    var element_width = $("#div_"+name).width();
    var element_height = $("#div_"+name).height();
    var screen_width = $(window).width();
    var screen_height = $(window).height();
    $("#div_"+name).finish().toggle(100).
    css({
        top: (screen_height-element_height)/2 + "px",
        left:(screen_width-element_width)/2   + "px"
    });

    
});

$('body').bind("mousedown", function (event) {
 if (!$(event.target).is("#div_"+name)) { 
        $("#div_"+name).hide(100);
}
});


});

