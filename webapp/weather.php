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
		</script>


			</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
			<div class="formElement"><dd><input type="submit" class="btn"  onClick="javascript:getWeather()" value="Show weather"></dd></div></br></br></br>
		

			
	
<script>
	
	
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
						$('#temperature').text(response.city.name);
						$('#weather').text(response.list[0].weather[0].description);
						$('#position').text("Position - Latitude: " + response.city.coord.lat + ", Longitude: " + response.city.coord.lon);
						$('#wind').text(response.city.name);
						wind speed
						$('#presure').text(response.city.name);
						presure
						$('#humidity').text(response.city.name);
						humidity
						
						
					  
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
			
			<div id="weatherinfo">
				<h3 id="textBox">
				</h3>
				<dd>
					<p id="city">
					
					</p>
					
					<p id="temperature">
					
					</p>
					
					<p id="weather">
					
					</p>
					<p id="position">
					
					</p>
				</dd>
			</div>
			
</div>