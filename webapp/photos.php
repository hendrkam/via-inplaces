<script type="text/javascript" src='http://maps.google.com/maps/api/js?libraries=places'></script>

<div id="content">
	<!-- Photos.php 
		Fotografie z Flickr API
	-->
	
	
	<h2><img src="img/camera.png" alt="icon" class="image" height="64" width="64"/> Photos by location</h2>
			
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
		  jQuery('#a-link').remove();   
			
		  jQuery('<img alt="" width="128" height="128" />').attr('id', 'loader').attr('src', 'img/loading.gif').appendTo('#image-loader');
	
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

	
    function getPhotos()
		{
			$('.box').show();
			$('#image-container').empty();
			//assign your api key equal to a variable
			var apiKey = 'cec63e743f88e8177f4dcfc54e5bfef8';
			var latitude = $('#us2-lat').val();
			var longitude = $('#us2-lon').val();
			//the initial json request to flickr
			//to get your latest public photos, use this request: https://api.flickr.com/services/rest/?&method=flickr.people.getPublicPhotos&api_key=' + apiKey + '&user_id=29096781@N02&per_page=15&page=2&format=json&jsoncallback=?
			$.getJSON('https://api.flickr.com/services/rest/?method=flickr.photos.search&api_key=6334f229b697af2d1b43734922034fc9&accuracy=11&lat='+latitude+'&lon='+longitude+'&format=json&jsoncallback=?',
			function(data){
			
			var photoCount = 0;			
			//loop through the results with the following function
			$.each(data.photos.photo, function(i,item){
				photoCount++;
				//build the url of the photo in order to link to it
				var photoURL = 'https://farm' + item.farm + '.static.flickr.com/' + item.server + '/' + item.id + '_' + item.secret + '_m.jpg'
		//alert(item.id);
				//turn the photo id into a variable
				var photoID = item.id;
				//use another ajax request to get the geo location data for the image
				$.getJSON('https://api.flickr.com/services/rest/?&method=flickr.photos.geo.getLocation&api_key=' + apiKey + '&photo_id=' + photoID + '&format=json&jsoncallback=?',
				function(data){

					//if the image has a location, build an html snippet containing the data
					if(data.stat != 'fail') {
						pLocation = '<a href="https://www.flickr.com/map?fLat=' + data.photo.location.latitude + '&fLon=' + data.photo.location.longitude + '&zl=1" target="_blank">' + data.photo.location.locality._content + ', ' + data.photo.location.region._content + ' (Click for Map)</a>';
					}
					
				});
							 
			


			$.getJSON('https://api.flickr.com/services/rest/?&method=flickr.photos.getInfo&api_key=' + apiKey + '&photo_id=' + photoID + '&format=json&jsoncallback=?',
			function(data){

				//if the image has tags
				if(data.photo.tags.tag != '') {

				//create an empty array to contain all the tags
				var tagsArr = new Array();

				//for each tag, run this function
				$.each(data.photo.tags.tag, function(j, item){

					//push each tag into the empty 'tagsArr' created above
					tagsArr.push('<a href="https://www.flickr.com/photos/tags/' + item._content + '">' + item.raw + '</a>');

					});

					//turn the tags array into a string variable
					var tags = tagsArr.join(', ');
				}
				//create an imgCont string variable which will hold all the link location, title, author link, and author name into a text string
									var imgCont = '<div class="image-container"><div class="image-box"><a class="title" href="https://www.flickr.com/photos/' + data.photo.owner.nsid + '/' + photoID + '"><img src=' + photoURL + ' alt="icon" class="image"  width="200" height="150"/></a></div>'+
									'<div class="author">'+data.photo.title._content+' by <a href="https://flickr.com/photos/' + data.photo.owner.nsid + '">' + data.photo.owner.username + '</a> '+ '</br>Decription: ' + data.photo.description._content + '</div></div>';
	
						
									
									//append the 'imgCont' variable to the document
									$(imgCont).appendTo('#image-container');
									
									//delete the pLocation global variable so that it does not repeat
									delete pLocation;
									$('#image-loader').hide(); 
								});
							
						
								
							
									//return photoCount != 20;
								});	    
							});

						
						}
			
		 
	</script>
	</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
	<div class="formElement"><dd><input type="submit" class="btn"  onClick="javascript:getPhotos()" value="Show photos"></dd></div></br></br></br>
	

<div class="box">
<h3><img src="img/camera.png" alt="icon" class="image" height="40" width="40"/> Photos near this location</h3>
	<div id="image-loader"></div>
	<div id="image-container"></div>
</div>	

	
</div>