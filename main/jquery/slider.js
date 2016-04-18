jQuery(document).ready(function ($) {

    setInterval(function () {
        move_right();
    }, 1);
 
	$('#slider ul li').css({ width: $(window).width() + 'px', height: $(window).height() + 'px'});
 
 
	var slideCount = $('#slider ul li').length;
	var slideWidth = $('#slider ul li').width();
	var slideHeight = $('#slider ul li').height();
	var sliderUlWidth = slideCount * slideWidth;
	var count = 0;	

	$('#slider').css({ width: slideWidth, height: slideHeight });
	
	$('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });

	$('#slider ul li:last-child').prependTo('#slider ul');	

    function move_left() {
        $('#slider ul').animate({
            left: '-=1px'
        }, 1, function () {
	    count = count + 1;
	    if ( count == (slideCount-2) * slideWidth ){
		count = 0 ;
		for (var i = 0; i < slideCount - 1; i++){
            	$('#slider ul li:first-child').appendTo('#slider ul');
		}
            	$('#slider ul').css('left', '');
		}
        });
    };
   
   function move_right() {
        $('#slider ul').animate({
            left: '+=1px' 
        }, 1, function () {
            count = count + 1; 
            if ( count == slideWidth ){
                count = 0 ;
                for (var i = 0; i < slideCount - 1; i++){
                $('#slider ul li:last-child').prependTo('#slider ul');
                }
                $('#slider ul').css('left', '');
                }
        });
    }; 

});    


/*********************************************************************
The following code produce two button: next, prev.
The page will shit when user press the button
*********************************************************************/


/*
jQuery(document).ready(function ($) {

    setInterval(function () {
        moveRight();
    }, 3000);

        $('#slider ul li').css({ width: $(window).width() + 'px', height: $(window).height() + 'px'});


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
*/
