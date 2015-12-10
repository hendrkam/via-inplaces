/* 
	 var weatherData = {
      city: document.querySelector("#city"),
      weather: document.querySelector("#weather"),
      temperature: document.querySelector("#temperature"),
      temperatureValue: 0,
      units: "°C"
    };

	function jsonFlickrApi(data){
		//var photoIdx = Math.floor(Math.random() * 5) + 1;
		//document.querySelector("body").style.backgroundImage = "url('" +"img/back"+ photoIdx + ".jpg"+"')";
		
		document.querySelector("body").style.backgroundImage = "url('" +"img/back2.jpg"+"')";
*/		
	/*  if (data.photos.pages > 0){
		var photo = data.photos.photo[Math.floor(Math.random() * 3) + 0  ];
		document.querySelector("body").style.backgroundImage = "url('" + photo.url_l + "')";
		document.querySelector("#image-source").setAttribute("href", "http://www.flickr.com/photos/" + photo.owner + "/" + photo.id);
	  }
	  else{
		document.querySelector("body").style.backgroundImage = "url('https://fourtonfish.com/tutorials/weather-web-app/images/default.jpg')";
		document.querySelector("#image-source").setAttribute("href", "https://www.flickr.com/photos/superfamous/310185523/sizes/o/");
	  }
	}*/
/*	
	function loadBackground(lat, lon, weatherTag) {
	  var script_element = document.createElement('script');

	  script_element.src = "https://api.flickr.com/services/rest/?method=flickr.photos.search&api_key=cec63e743f88e8177f4dcfc54e5bfef8&lat=" + lat + "&lon=" + lon + "&accuracy=1&tags=" + weatherTag + "&sort=relevance&extras=url_l&format=json";

	  document.getElementsByTagName('head')[0].appendChild(script_element);
	}
	  
	function switchUnits(){
	  if (weatherData.units == "°C"){
		weatherData.temperatureValue = weatherData.temperatureValue * 9/5 + 32;
		weatherData.units = "°F";
	  }
	  else{
		weatherData.temperatureValue = (weatherData.temperatureValue -  32) * 5/9;
		weatherData.units = "°C";
	  }

	  weatherData.temperature.innerHTML = weatherData.temperatureValue + weatherData.units + ", ";      
	}
    

    
	function getLocationAndWeather(){
	
	  if (window.XMLHttpRequest){
	  
		var xhr = new XMLHttpRequest();
		xhr.addEventListener("load", function() {
		  var response = JSON.parse(xhr.responseText);

		
		  console.log(response);
		  


																							  		 		  
		  var position = {
			latitude: response.latitude,
			longitude: response.longitude

		  };
		  var cityName = response.city;
		  var weatherSimpleDescription = response.weather.simple;
		  var weatherDescription = response.weather.description;
		  var weatherTemperature = response.weather.temperature;

		 			  	 	

		$("#temperature").text(weatherTemperature + weatherData.units);  	
		$("#city").text(cityName);  
		$("#weather").text(weatherDescription);    
		  //weatherData.temperatureValue = weatherTemperature;
		  //weatherData.city.innerHTML = "City: " + cityName;
		  //weatherData.weather.innerHTML =  ", Description " + weatherDescription;
		  //weatherData.temperature.innerHTML = weatherTemperature + weatherData.units;
		  
		  loadBackground(position.latitude, position.longitude, weatherSimpleDescription);
		  
		}, false);

		xhr.addEventListener("error", function(err){
		  alert("Could not complete the request");
		}, false);


		xhr.open("GET", "https://fourtonfish.com/tutorials/weather-web-app/getlocationandweather.php?owapikey=5881349e5d705169c253902c3e35470b&units=metric", true);
		xhr.send();
	  }
	  else{
		alert("Unable to fetch the location and weather data.");
	  }           
	}
	
	

	
	



	

	 getLocationAndWeather();
	 
	*/ 