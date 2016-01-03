
<script type="text/javascript" src='http://maps.google.com/maps/api/js?libraries=places'></script>
	<!-- Add.php 
		Formular pro pridavani prispevku
	-->
<div id="content">		
	<h2><img src="img/add.png" alt="icon" class="image" height="64" width="64"/> Add new place</h2>
	
	<form class="box" action="index.php?p=added" method="post" enctype="multipart/form-data">
		<div class="formElement">Title: </div><input type="text" name="title" required>
		</br>
		</br>
		
		<div class="formElement">Author name: </div><input type="name" name="name" required>
		</br>
		</br>

		<div class="formElement">Description:</div>
			<textarea name="description" cols="80" rows="6" placeholder="Write a description" required></textarea>
		</br>
		</br>
	


		
		<div class="formElement" >Category select:</div>
			<select name="category">
				<option value="1">Restaurants</option>
				<option value="2">Castles & statues</option>
				<option value="3">Nature & parks</option>
				<option value="4">Museum & art</option>
				<option value="5">Education</option>
				<option value="6">Shopping</option>
				<option value="7">Sport</option>
				<option value="8">Other</option>
			</select>
		</br>
		</br>

		
		<div class="formElement" >Select image:</div>
		    <input type="file" name="fileToUpload" id="fileToUpload">
		</br>
		</br>
		</br>
		</br>
		
		<!-- Location: <input type="text" id="us2-address" style="width: 200px"/> -->
		<!-- Radius: <input type="text" id="us2-radius"/> -->
		<div class="formElement">Position of place:</div>
		</br>
		<div class="formElement" ><dd>Latitude: </dd></div><input type="text" id="us2-lat" name="lat"/>
		</br>
		<div class="formElement" ><dd>Longitude: </dd></div><input type="text" id="us2-lon" name="long"/>
		</br>
		<p><dd>
			<div >
				<div id="us2" style="width: 400px; height: 300px;"></div>
			</div>
		</dd></p>				
		
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
		
		</br>
		<div>
			<div class="formElement"><dd><input type="submit" class="btn" class="specialbutton" value="Add"></dd></div>
		</div>
		</br>
		</br>
	</form>
	</br>
	</br>

</div>
</br>