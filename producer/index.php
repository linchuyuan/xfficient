<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="description" content="cloud storage">
<meta name="keywords" content=cloud,xfficient,efficient,storage,linchuyuan">
<meta name="author" content="linchuyuan">
    <link rel="shortcut icon" type="image/x-icon" href="/icons/xfficient_icon.png" />
    <title>Xfficient</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>
	<script>
jQuery(document).ready(function ($) {

    setInterval(function () {
        moveRight();
    }, 600000);

        $('#slider ul li').css({ width: $(window).width() + 'px', height: $(window).height() + 'px'});
	$('#slider ul li #linchuyuan').css({ width: $(window).width() + 'px', height: $(window).height() + 'px'});
	$('#slider ul li #danica').css({ width: $(window).width() + 'px', height: $(window).height() + 'px'});

        var slideCount = $('#slider ul li').length;
        var slideWidth = $('#slider ul li').width();
        var slideHeight = $('#slider ul li').height();
        var sliderUlWidth = slideCount * slideWidth;

        $('#slider').css({ width: slideWidth, height: slideHeight });

        $('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });

    $('#slider ul li:last-child').prependTo('#slider ul');

    function moveLeft() {
        $('#slider ul').animate({
            left: + slideWidth
        }, 600, function () {
            $('#slider ul li:last-child').prependTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    function moveRight() {
        $('#slider ul').animate({
            left: - slideWidth
        }, 600, function () {
            $('#slider ul li:first-child').appendTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    $('a.control_prev').click(function () {
        moveLeft();
    });

    $('a.control_next').click(function () {
        moveRight();
    });

});
	</script>
<style>
    div.center{
	position: absolute;
     	margin: auto;
    	top: 0;
     	right: 0;
     	bottom: 0;
     	left: 0;
     	width: 500px;
    	height: 500px;
	text-align: center;
    }
    div.padding{
	border: 3px solid #D0D0D0 ;
        border-radius: 30px;
	background-color: lightgray;
        padding:10px;
	}
    div.hidden {
	position: fixed;
	top: 0%;
	right: 0%;
	opacity: 0.1;
        margin: 0 auto;
	}
    #slider {
        position: absolute;
	top: 0%;
	bottom: 0%;
	left: 0%;
	right: 0%;
        overflow: hidden;
        border-radius: 0px;
    }
    #slider ul {
        position: relative;
        margin: 0;
        padding: 0;
        height: 100%;
        list-style: none;
    }
    #slider ul li {
        position: relative;
        float: left;
        display: block;
        line-height: 0px;
        }
    #image {
	width: 100%;
	height: 100%;	
	opacity: 0.9;
    }
    a.control_prev, a.control_next {
        position: absolute;
        top: 30%;
        z-index: 999;
        display: block;
        padding: 4% 3%;
        width: auto;
        height: auto;
        background: #2a2a2a;
        color: #fff;
        text-decoration: none;
        font-weight: 600;
        font-size: 18px;
        opacity: 0.1;
        cursor: pointer;
    }
    a.control_prev:hover, a.control_next:hover {
        opacity: 1;
        -webkit-transition: all 0.8s ease;
    }
    a.control_prev {
        border-radius: 0 2px 2px 0;
     }
    a.control_next {
        right: 0;
        border-radius: 2px 0 0 2px;
     }
</style>
</head>
    
<body>
<div id="slider">
  <a href="#" class="control_next">>></a>
  <a href="#" class="control_prev"><</a>
  <ul>
    <li><iframe id ="linchuyuan" src="linchuyuan"></iframe><a href="https://www.linkedin.com/profile/view?id=AAkAABKAyJMBuw-FsepTXB8Bb_8JYi5jXqDw1vM&authType=NAME_SEARCH&authToken=Fu4T&locale=en_US&trk=tyah&trkInfo=clickedVertical%3Amynetwork%2CclickedEntityId%3A310429843%2CauthType%3ANAME_SEARCH%2Cidx%3A1-1-1%2CtarId%3A1447263889048%2Ctas%3Achu" id="linkedin" style="position:absolute; width:3.5%; height:3.5%; left:20%; top: 1%; z-index:1000"><img src="linkedin.png" style="width:100%; height:100%; opacity:0.01"></a>
</li>
    <li><iframe id ="danica" src="danica"></iframe><a href="https://www.linkedin.com/profile/view?id=AAkAAA0wWVgBtR4yiTbsZHMNsqi6jvmNN4YAAP4&authType=NAME_SEARCH&authToken=U3V8&locale=en_US&trk=tyah&trkInfo=clickedVertical%3Amynetwork%2CclickedEntityId%3A221272408%2CauthType%3ANAME_SEARCH%2Cidx%3A1-1-1%2CtarId%3A1447223389716%2Ctas%3Adanica" style="position:absolute; width:3.5%; height:3.5%;right:20%; top: 1%; z-index:1000"><img src="linkedin.png" style="float: right; width:100%; height:100%; opacity:0.01"></a>
</li>
  </ul>
</div>


</body>
</html>

