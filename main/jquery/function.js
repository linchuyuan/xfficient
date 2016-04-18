function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        alert( "Geolocation is not supported by this browser.");
    }
}

function showPosition(position) {
//	window.location.replace("jquery/php/position.php?latitude="+position.coords.latitude+"&longtitude="+position.coords.longitude+"&status=true"); 
	$('#loading').finish().show(100);	
	$.ajax({
		url: "jquery/php/position.php",
		method: "GET",
		data: {status:"true", latitude:position.coords.latitude, longtitude:position.coords.longitude },
		success: function(result){ alert ("Location Service On.");$('#loading').hide(); 
	}
	});
}
