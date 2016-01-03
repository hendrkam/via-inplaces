<div id="content">
		<?php
		/* Jednotlive prispevky*/
		
			include "db_connect.php";
			
			if(isset($_GET['id'])){
				$id = $_GET['id'];
				//echo " id = $id";
			
				$sql = "SELECT * FROM prispevek WHERE id = '$id'";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						echo '<div class="inbox">';
						
							echo '<div style="float:right">';
								echo '<a href="'. $row["photoURL"] .'"><img src="'. $row["photoURL"] .'" alt="img" class="image" height="128" width="128"/></a>';
							echo '</div>';
							
							echo '<h2>' . $row["nazev"] . '</h2></br>';
							
							echo 'Author: <b>' . $row["autor"]. '</b></br>';
							
							echo 'Date: <b>' . $row["datum"] . '</b></br>';
							
							echo 'Category: ' . $row["idKategorie"] . '</br></br>';
							
							echo $row["popis"]. '</br></br></br>';
							
							echo '<b>Position:</b>' .'<dd><p> Latitude ' . $row["latitide"] . ' </p><p>Longitude ' . $row["longitude"] . '</p></dd>' ;
								echo '<div class="photoframe">';
								
								echo '</div>';	
						echo '</div>';
						
						echo '<script>var longitude= '.$row["longitude"].'; var latitude = '.$row["latitide"].';</script>';
						
					}
				} else {
					echo "0 results";
				}
			}	
			?>	


<div class="box">
<h3>Weather information</h3>
	<?php

	?>

</div>	

<div class="box">
<h3>Flickr photos near this location</h3>
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
							
						
								
							
									return photoCount != 20;
								});	    
							});
						});
					



	</script>
</div>	
	
</div>		
