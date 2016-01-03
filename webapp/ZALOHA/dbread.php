<div id="content">
	<h2><img src="img/earth.png" alt="icon" class="image" height="32" width="32" /> DB Read test</h2>
		<?php
		
		
		/*
		============================
			NEPOUZIVA SE!!!
		============================
		
		*/
			include "db_connect.php";
			
			$sql = "SELECT * FROM prispevek";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo '<a href="'. '?p=generate&id='.  $row["id"] .'">';
					echo '<div class="box">';
					echo '<h2> <img src="img/earth.png" alt="icon" class="image" height="64" width="64"/>' . ' ' . $row["nazev"] . '</h2></br>';
					echo 'Author: ' . $row["autor"]. '</br>';
					echo 'Date: ' . $row["datum"] . '</br>';
					echo '</br>';
					echo '</div>';
					echo '</a>';
					
					
					echo '<div class="inbox">';
					echo '<a href="img/earth.png"><img src="img/earth.png" alt="icon" class="image" height="64" width="64"/></a>';
					echo '<h2>' . $row["nazev"] . '</h2></br>';
					echo 'Author: ' . $row["autor"]. '</br>';
					echo 'Date: ' . $row["datum"] . '</br>';	
					echo $row["popis"]. '</br>';
					echo '<p>Position:' .' Latitude ' . $row["latitide"] . ' Longitude ' . $row["longitude"] . '</p>' ;
			
					echo '</div>';
				/*	echo $row["id"]. "	" . $row["nazev"]. "	" . $row["autor"]. "	". $row["popis"]. "	". $row["idKategorie"]."	". $row["latitide"]."	". $row["longitude"]. "	". $row["photoURL"]."	". $row["datum"]."<br>";*/
				}
			} else {
				echo "0 results";
			}		
		?>
		
</div>


	