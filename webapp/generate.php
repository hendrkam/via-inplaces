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
							
							echo $row["popis"]. '</br>';
							
							echo '<p>Position:' .' Latitude ' . $row["latitide"] . ' Longitude ' . $row["longitude"] . '</p>' ;
								echo '<div class="photoframe">';
								
								echo '</div>';
								
								echo '<div class="weatherframe">';
								
								echo '</div>';
						
						echo '</div>';
						
						
						
					}
				} else {
					echo "0 results";
				}
			}	
			?>	
</div>


<div id="content">
<p>TEST</p>
	<?php
	
		include "maptest.php";
	?>

	
	
	<!--
	
	<div id="map"></div>
		 <script type="text/javascript">
		 var map;
			function initMap() {
			  map = new google.maps.Map(document.getElementById('map'), {
				center: {lat: -34.397, lng: 150.644},
				zoom: 8
			  });
			}
		</script>	
		
	    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNYvJP6s2oFfdcJ-PjqJDjiz9aGhWg1Io&callback=initMap" async defer>
		</script>	
	-->

</div>		
		
