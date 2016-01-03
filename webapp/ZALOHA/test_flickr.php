<div id="content">
<p>Flickr test</p>
<div id="image-loader"></div>
<div id="image-container"></div>

<script>

	$(function(){
		jQuery('#a-link').remove();   
		
		jQuery('<img alt="" width="128" height="128" />').attr('id', 'loader').attr('src', 'img/loading.gif').appendTo('#image-loader');
		
		//assign your api key equal to a variable
		var apiKey = 'cec63e743f88e8177f4dcfc54e5bfef8';
		
		//the initial json request to flickr
		//to get your latest public photos, use this request: https://api.flickr.com/services/rest/?&method=flickr.people.getPublicPhotos&api_key=' + apiKey + '&user_id=29096781@N02&per_page=15&page=2&format=json&jsoncallback=?
		$.getJSON('https://api.flickr.com/services/rest/?&method=flickr.photosets.getPhotos&api_key='+apiKey+'&photoset_id=72157619415192530&format=json&jsoncallback=?',
		function(data){
						
		//loop through the results with the following function
		$.each(data.photoset.photo, function(i,item){

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
								var imgCont = '<div class="image-container"><img src=' + photoURL + ' alt="icon" class="image" height="128" width="128"/><div class="image-info"><p class="top"><a class="title" href="https://www.flickr.com/photos/' + data.photo.owner.nsid + '/' + photoID + '">' + data.photo.title._content + '</a> <span class="author">by <a href="https://flickr.com/photos/' + data.photo.owner.nsid + '">' + data.photo.owner.username + '</a></span></p><div class="bottom">';
								
								//if there are tags associated with the image
							   /* 
							   if (typeof(tags) != 'undefined') {
								
									//combine the tags with an html snippet and add them to the end of the 'imgCont' variable
									imgCont += '<p><span class="infoTitle">Tags:</span> ' + tags + '</p>';
								}
								
								*/
								//if the image has geo location information associate with it
								/*
								if(typeof(pLocation) != 'undefined'){
								
									//combine the geo location data into an html snippet and at that to the end fo the 'imgCont' variable
									imgCont += '<p><span class="infoTitle">Location:</span> ' + pLocation + '</p>';
								}
								*/
								
								//add the description & html snippet to the end of the 'imgCont' variable
								imgCont += '<p><span class="infoTitle">Decription:</span> ' + data.photo.description._content + '</p></div></div>';
								
								//append the 'imgCont' variable to the document
								$(imgCont).appendTo('#image-container');
								
								//delete the pLocation global variable so that it does not repeat
								delete pLocation;
								$('#image-loader').hide(); 
							});
							
					
							
						
						  
							});	    
						});
					});
				



</script>
</div>