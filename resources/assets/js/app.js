jQuery(document).ready(function($) {

var button = jQuery('.button');
var longitudediv = jQuery('.longitude');
var lattitudediv = jQuery('.lattitude');
var locationdiv = jQuery('.location');


function exportPosition(position) {

		// Get the geolocation properties and set them as variables
		latitude = position.coords.latitude;
		longitude  = position.coords.longitude;

		// Insert the google maps iframe and change the location using the variables returned from the API
		longitudediv.html('Longitude: '+longitude);
		lattitudediv.html('Latitude: '+latitude);

		//Make a call to the Google maps api to get the name of the location
		jQuery.ajax({
		  url: 'http://maps.googleapis.com/maps/api/geocode/json?latlng='+latitude+','+longitude+'&sensor=true',
		  type: 'POST',
		  dataType: 'json',
		  success: function(data) {
		  	//If Successful add the data to the 'location' div
		   $('#spinner').addClass('hidden');
		   locationdiv.html('Location: '+data.results[0].address_components[2].long_name);
		  },
		  error: function(xhr, textStatus, errorThrown) {
		  		   $('#spinner').addClass('hidden');
		  		   errorPosition();
		  }
		});
		
	}


function errorPosition() {
		alert('Sorry couldn\'t find your location');
		   //pretext.show();
}


if (navigator.geolocation) {

	button.click(function(e) {
		e.preventDefault();
		$('#spinner').removeClass('hidden');
		navigator.geolocation.getCurrentPosition(exportPosition, errorPosition);
	});

} else {
	alert('Sorry your browser doesn\'t support the Geolocation API');	
}

});