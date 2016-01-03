<script type="text/javascript" src='http://maps.google.com/maps/api/js?libraries=places'></script>
<div id="content">		
	<h2><img src="img/weather.png" alt="icon" class="image" height="64" width="64"/> Weather info</h2>
			
	<div class="formElement">Position of place:</div>
			</br>
			<div class="formElement" ><dd>Latitude: </dd></div><input type="text" id="us2-lat" name="lat"/>
			</br>
			<div class="formElement" ><dd>Longitude: </dd></div><input type="text" id="us2-lon" name="long"/>
			</br>	
			<dd>
				<div class="formElement">
					<div id="us2" style="float: left; width: 400px; height: 300px;"></div>
				</div>
			</dd>	
			</br>
			
	<script>
		
		$('#us2').locationpicker({
			location: {latitude: 50.0880400, longitude: 14.4207600},	
			radius: 1,
			inputBinding: {
			latitudeInput: $('#us2-lat'),
			longitudeInput: $('#us2-lon'),
			radiusInput: $('#us2-radius'),
			locationNameInput: $('#us2-address')
		}
		});

	
    function getWeather()
		{
			if (window.XMLHttpRequest)
				{
					var xhr = new XMLHttpRequest();
					xhr.addEventListener("load", function() {
					  var response = JSON.parse(xhr.responseText);
					  console.log(response);
					  
						$('#textBox').text("Weather forecast");
						$('#city').text(response.city.name +", "+ response.city.country);
						$('#temperature').text("Temperature: " + response.list[0].main.temp);
						$('#weather').text("Description: " + response.list[0].weather[0].description);
						$('#position').text("Position - Latitude: " + response.city.coord.lat + ", Longitude: " + response.city.coord.lon);
						
						$('#wind').text("Wind speed: "+ response.list[0].wind.speed + ", wind deg"+response.list[0].wind.deg);
						$('#humidity').text("Humidity: " + response.list[0].main.humidity);
						$('#pressure').text("Pressure: " + response.list[0].main.pressure);
						
					  
					}, false);
					
					xhr.addEventListener("error", function(err){
					  alert("Could not complete the request");
				}, false);

				//alert("Latitude = "+$('#us2-lat').val());
				//alert("Longitude = " + $('#us2-lon').val());
				var latit= $('#us2-lat').val();
				var longi= $('#us2-lon').val();
				xhr.open("GET", "http://api.openweathermap.org/data/2.5/forecast?APPID=5881349e5d705169c253902c3e35470b&lat="+latit+"&lon="+longi, true);
				xhr.send();
				
			  }
			  else{
				alert("Unable to fetch weather data.");
			  }   
		  } 
	</script>


			</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
			<div class="formElement"><dd><input type="submit" class="btn"  onClick="javascript:getWeather()" value="Show weather"></dd></div></br></br></br>
		

			
	
			
			<div id="weatherinfo">
				<h2 id="textBox">
				</h2>
				<dd>
					<h3 id="city">
					
					</h3>
					
					<p id="temperature">
					
					</p>
					
					<p id="weather">
					
					</p>
					<p id="position">
					
					</p>
					<p id="wind">
					
					</p>
					<p id="humidity">
					
					</p>
					<p id="pressure">
					
					</p>
					<p id="table">
						tabulka s nekolikadenni predpovedi....
					</p>

				</dd>
			</div>
			
</div>