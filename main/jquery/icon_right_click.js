jQuery(document).ready(function ($) {

var id;
var name;
$(document).bind ("contextmenu",function(event){ 
id = event.target.id; 
name = $("#"+id).attr('data-value');
});

$(".share").click(function(event){
	getLocation();
	$("#near_by").show();
	document.getElementById("nearby_list").innerHTML = "<img src='/icons/xfficient_loading.gif'>";
	$.ajax({
		url: "jquery/php/search_nearby.php",
		type: "GET",
		dataType: "json",
		success: function(result){
			near_by = new Array();
			near_by = result;
			var list = "";
			$.each(near_by, function(i){
			list = list + '<a href="#" style="position:absolute; left:0;right:0;text-decoration: none;width: 100%; color:black" class="nearby_result" id = "'+near_by[i]+'">'+near_by[i]+'</a></br>';});
			document.getElementById("nearby_list").innerHTML=list;
			$(".nearby_result").click(function(event){
        			var nearby_target = event.target.id;
        			$.ajax({
                			url: "jquery/php/sent_my_file.php",
               				type: "POST",
                			data: { target_file:name , target_nearby:nearby_target },
                			success: function (result) { alert ("file sent to "+nearby_target);}
        			});
			});

		}
	});
});
$("#nearby_close").click(function(){$("#near_by").hide(100)});


var name;
var value;
var icon_location_top;
var icon_location_left;

$(".icon_right_click").bind("contextmenu", function (event) {

    event.preventDefault();
    name = event.target.id;
    value = $("#"+name).attr("data-value");
    icon_location_top = $("#"+name).position().top;
    icon_location_left = $("#"+name).position().left;
    $(".icon").finish().toggle(100).
    css({
        top: event.pageY + "px",
        left: event.pageX + "px"
    });

});


$('body').bind("mousedown", function (e) {

    if (!$(e.target).parents(".icon").length > 0) {

        $(".icon").hide(100);
    }
});

$(".icon li").click(function(){


    switch($(this).attr("data-action")) {

        case "new_folder":
        window.location.replace("/main/session/new_folder.php");
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


    $(".icon").hide(100);
});

$("#icon_rename").click(function (event) {
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

$(".video").click(function (event) {
    event.preventDefault();
    name = event.target.id;
    var path = $("#"+name).attr("data-rel");
    $(".video_box #div_video_popup").attr("src","/main/session/video_play.php?target="+path);
    $(".video_box").finish().toggle(100);
});
$(".video_box #video_close").click(function(){
        $(".video_box #div_video_popup").trigger('pause');
	$(".video_box").finish().hide(100);
});

$(".audio").click(function (event) {
    event.preventDefault();
    name = event.target.id;
    var path = $("#"+name).attr("data-rel");
    $(".audio_box #div_audio_popup").attr("src","/main/session/audio_play.php?target="+path);
    $(".audio_box").finish().toggle(100);
});
$(".audio_box #audio_close").click(function(){
	$(".audio_box #div_audio_popup").trigger('pause');
        $(".audio_box").finish().hide(100);
});

$(".doc").click(function (event) {
    event.preventDefault();
    name = event.target.id;
    var path = $("#"+name).attr("data-rel");
    $(".doc_box #div_doc_popup").attr("src","/main/session/doc_play.php?target="+path);
    $(".doc_box").finish().toggle(100);
});
$('body').bind("mousedown", function (event) {
if (!$(event.target).is(".doc_box")) {
       $(".doc_box").hide(100);
}
});


});

