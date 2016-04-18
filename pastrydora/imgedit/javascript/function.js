jQuery(document).ready(function ($) {

var name;
$("#work_area").click(function(event){ name = event.target.id;});
$("#clear_background").click(function(){ 
	var clear_back_low_limit = 200;
	var image_array = get_pixel(name);
	var index = 1;
	for (var i = 1; i < image_array.data.length; i++) {
		if ((i + 1) % 4 === 0) {
			if(image_array.data[i-1]<=255 && image_array.data[i-1]>=clear_back_low_limit && image_array.data[i-2]<=255 && image_array.data[i-2]>=clear_back_low_limit && image_array.data[i-3]<=255 && image_array.data[i-3]>=clear_back_low_limit){
				image_array.data[i] = 0;
			}
			if(image_array.data[i+1]<=clear_back_low_limit || image_array.data[i+2]<=clear_back_low_limit || image_array.data[i+3]<=clear_back_low_limit){
				i = index * 4*image_array.width;
				index ++;
			}
		}
		else { continue;}
	} 
	index = 1;
	for (var i = image_array.data.length; i > 0; i--) {
		if (!(image_array.data[i-1]!==0 && image_array.data[i-2]!==0 && image_array.data[i-3]!==0)){continue;}
                if ((i + 1) % 4 === 0) {
                        if(image_array.data[i-1]<=255 && image_array.data[i-1]>=clear_back_low_limit && image_array.data[i-2]<=255 && image_array.data[i-2]>=clear_back_low_limit && image_array.data[i-3]<=255 && image_array.data[i-3]>=clear_back_low_limit){
                                image_array.data[i] = 0;
                        }
                        if(image_array.data[i-5]<=clear_back_low_limit || image_array.data[i-6]<=clear_back_low_limit || image_array.data[i-7]<=clear_back_low_limit){ 
                                i = image_array.data.length - 1 - 4* index * image_array.width;
                                index ++;
                        }
                }
                else { continue;}
        }

	draw_image(image_array,name);	
});

$("#rotate").click(function(){
	
	var degrees = 90;
	var canvas = document.getElementById(name);
	var ctx = canvas.getContext("2d");
	var image = new Image();
	image.src = canvas.toDataURL("image/png");
	ctx.clearRect(0,0,canvas.width,canvas.height);
	canvas.width = canvas.width + canvas.height;
	canvas.height = canvas.width - canvas.height;
	canvas.width = canvas.width - canvas.height;
    	ctx.save();
    	ctx.translate(canvas.width/2,canvas.height/2);
    	ctx.rotate(degrees*Math.PI/180);
    	ctx.drawImage(image,-image.width/2,-image.height/2);
    	ctx.restore();



});
});
