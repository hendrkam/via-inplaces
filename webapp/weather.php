<script type="text/javascript" src='http://maps.google.com/maps/api/js?libraries=places'></script>

	<!-- Weather.php 
		Basic weather info by location from Open Weather API
	-->

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
		$( document ).ready(function() {
		  $('.box').hide();
		});

		
		
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
			$('.box').show();
			
			if (window.XMLHttpRequest)
				{
					var xhr = new XMLHttpRequest();
					xhr.addEventListener("load", function() {
					  var response = JSON.parse(xhr.responseText);
					  console.log(response);
					  
						$('#textBox').text("Weather forecast");
						$('#city').text(response.city.name +", "+ response.city.country);
					
						
						$('#temperature').text("Temperature: " + Math.round((response.list[0].main.temp-273.15)*10)/10 + " °C");
						$('#weather').text("Description: " + response.list[0].weather[0].description);
						$('#weather').html($('#weather').html() + ' <img src="http://openweathermap.org/img/w/'+ response.list[0].weather[0].icon +'.png" alt="icon" class="image" height="50" width="50"/>');
						//$('#position').text("Position - Latitude: " + response.city.coord.lat + ", Longitude: " + response.city.coord.lon);
						
						$('#wind').text("Wind speed: "+ response.list[0].wind.speed + ", wind degree: "+response.list[0].wind.deg +'°');
						$('#humidity').text("Humidity: " + response.list[0].main.humidity + ' %') ;
						$('#pressure').text("Pressure: " + response.list[0].main.pressure + ' hPa') ; 
						
					var tableContent = "</br><h3>Weather forecast 5 days / 3 hours</h3>"; 
					tableContent += "<div class='weatherTableDiv'><table class='weatherTable'><tr>";
						$.each(response.list, function(i,item){
							//alert("press " + item.dt_txt);
							tableContent += "<td>" + item.dt_txt + "</td>";
						});
						
						tableContent += "</tr><tr>";
					
						$.each(response.list, function(i,item){
							//alert("press " + item.dt_txt);
							tableContent += "<td>" + Math.round((item.main.temp-273.15)*10)/10 + " °C ";
							tableContent += '<img src="http://openweathermap.org/img/w/'+ item.weather[0].icon +'.png" alt="icon" class="image" height="50" width="50"/>'+  "</td>";
						});
						
						tableContent += "</tr></div>";
					  $('#table').html(tableContent);
					  
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
		

			
	
			<div class="box">
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
							
						</p>

					</dd>
				</div>
			</div>
</div>