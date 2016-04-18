function get_pixel(id){
	var c = document.getElementById(id);
       	var ctx = c.getContext("2d");
        var imgData = ctx.getImageData(0, 0, c.width, c.height);
	return imgData;
}

function clear_image(imgData){
        var i;
        for (i = 0; i < imgData.data.length; i +=4) {
                imgData.data[i] = 0;
                imgData.data[i+1] = 0;
                imgData.data[i+2] = 0;
                imgData.data[i+3] = 0;
        }
	return imgData;
}


function invert_image(imgData){
	var i;
	for (i = 0; i < imgData.data.length; i += 4) {
		imgData.data[i] = 255 - imgData.data[i];
		imgData.data[i+1] = 255 - imgData.data[i+1];
                imgData.data[i+2] = 255 - imgData.data[i+2];
                imgData.data[i+3] = 255;
        }
	return imgData

}

function draw_image(imgdata, target_id){
	var c = document.getElementById(target_id);
	if ( imgdata.width && imgdata.height){
                c.width = imgdata.width;
                c.height = imgdata.height;
        }
        var ctx = c.getContext("2d");
	ctx.putImageData(imgdata, 0, 0);
}

function grayout_image(imgData){
        var i;
        for (i = 0; i < imgData.data.length; i += 4) {
                var r = imgData.data[i];
                var g = imgData.data[i+1];
                var b = imgData.data[i+2];
		var v = 0.2126*r + 0.7152*g + 0.0722*b
		imgData.data[i] = imgData.data[i+1] = imgData.data[i+2] = v
        }
        return imgData;
}

function brighten_image(imgData,power){
	var i
	for (i = 0; i < imgData.data.length; i += 4) {
                imgData.data[i] = power + imgData.data[i];
                imgData.data[i+1] = power + imgData.data[i+1];
                imgData.data[i+2] = power + imgData.data[i+2];
	}
	return imgData;
}

function threshold_image(imgData,threshold){
        var i;
        for (i = 0; i < imgData.data.length; i += 4) {
                var r = imgData.data[i];
                var g = imgData.data[i+1];
                var b = imgData.data[i+2];
                var v = (0.2126*r + 0.7152*g + 0.0722*b >= threshold)?255:0;
                imgData.data[i] = imgData.data[i+1] = imgData.data[i+2] = v
        }
        return imgData;
}

function convolute(imgData,filter,divisor){
	var olddata = imgData;
  	var oldpx = olddata.data;
	var c = document.createElement("canvas");
	var ctx = c.getContext("2d");
  	var newdata = ctx.createImageData(imgData.width,imgData.height);
  	var newpx = newdata.data;
  	var len = newpx.length;
  	var res = 0;
  	var w = imgData.width;
	for (var i = 0; i < len; i++) {
    		if ((i + 1) % 4 === 0) {
      		newpx[i] = oldpx[i];
      		continue;
    		}
		res = 0;
    		var these = [
      		oldpx[i - w * 4 - 4] || oldpx[i],
      		oldpx[i - w * 4]     || oldpx[i],
      		oldpx[i - w * 4 + 4] || oldpx[i],
      		oldpx[i - 4]         || oldpx[i],
      		oldpx[i],
      		oldpx[i + 4]         || oldpx[i],
      		oldpx[i + w * 4 - 4] || oldpx[i],
      		oldpx[i + w * 4]     || oldpx[i],
      		oldpx[i + w * 4 + 4] || oldpx[i]
    		];
    		for (var j = 0; j < 9; j++) {
      		res += these[j] * filter[j];
    		}
    		res /= divisor;
    		newpx[i] = res;
    	}
	return newdata;	
 }

function contrastImage(imageData, contrast) {

    var data = imageData.data;
    var factor = (259 * (contrast + 255)) / (255 * (259 - contrast));

    for(var i=0;i<data.length;i+=4)
    {
        data[i] = factor * (data[i] - 128) + 128;
        data[i+1] = factor * (data[i+1] - 128) + 128;
        data[i+2] = factor * (data[i+2] - 128) + 128;
    }
    return imageData;
}
