
<div id="content">
<p>Flickr test</p>
<script>
	$(function()
	{
		jQuery('#a-link').remove();   
		
		jQuery('<img alt="" />').attr('id', 'loader').attr('src', 'img/loading.gif').appendTo('#image-container');
		
		//assign your api key equal to a variable
		var apiKey = 'cec63e743f88e8177f4dcfc54e5bfef8';
		var userID = '';
		var longitude = 0;
		var latitude = 0;
		
		//the initial json request to flickr
		//to get your latest public photos, use this request: http://api.flickr.com/services/rest/?&amp;method=flickr.people.getPublicPhotos&amp;api_key=' + apiKey + '&amp;user_id=29096781@N02&amp;per_page=15&amp;page=2&amp;format=json&amp;jsoncallback=?
		//$.getJSON('https://api.flickr.com/services/rest/?&method=flickr.people.getPublicPhotos&api_key=cec63e743f88e8177f4dcfc54e5bfef8&user_id=137644089@N03&photoset_id=72157619415192530&format=json&jsoncallback=?');
		$.getJSON('https://api.flickr.com/services/rest/?method=flickr.photos.search&api_key=6334f229b697af2d1b43734922034fc9&accuracy=11&lat=50.08804&lon=14.420759999999973&format=json&auth_token=72157662425374849-2584b6e4a29336e3&api_sig=36016efe33ace23e1a33307df8a13cd5&jsoncallback=?',
		function(data){
			alert(data);	
			//loop through the results with the following function
			$.each(data.photoset.photo, function(i,item){

				//build the url of the photo in order to link to it
				var photoURL = 'http://farm' + item.farm + '.static.flickr.com/' + item.server + '/' + item.id + '_' + item.secret + '_m.jpg'

				//turn the photo id into a variable
				var photoID = item.id;

				//use another ajax request to get the geo location data for the image
				$.getJSON('http://api.flickr.com/services/rest/?&amp;method=flickr.photos.geo.getLocation&amp;api_key=' + apiKey + '&amp;photo_id=' + photoID + '&amp;format=json&amp;jsoncallback=?',
				function(data){

					//if the image has a location, build an html snippet containing the data
					if(data.stat != 'fail') {
						pLocation = '<a href="http://www.flickr.com/map?fLat=' + data.photo.location.latitude + '&amp;fLon=' + data.photo.location.longitude + '&amp;zl=1" target="_blank">' + data.photo.location.locality._content + ', ' + data.photo.location.region._content + ' (Click for Map)</a>';
					}
					
				});
		
			});

		});
	});

	


</script>
</div>