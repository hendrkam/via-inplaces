<div id="content">
<?php
	/* Vypis prispevku podle kategorii */

			include "db_connect.php";
			
			if(isset($_GET['catid'])){
				$catid = $_GET['catid'];
				//echo " category id = $catid";
					
					
				if ($catid == 99) {
					echo '<h2>';
					echo '<img src="img/earth.png" alt="icon" height="64" width="64" />';
					echo 'All categories';
					echo '</h2>';
					
					$sql = "SELECT * FROM prispevek";
				} else {
					echo '<h2>';
					echo '<img src="' . $arrayData[$catid][3] . '" alt="icon" height="64" width="64" />';
					echo ' ' . $arrayData[$catid][1];
					echo '</h2>';
				
				
				
					$sql = "SELECT * FROM prispevek WHERE idKategorie = '$catid'";
				}
				
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						echo '<a href="'. '?p=generate&id='.  $row["id"] .'">';
						echo '<div class="box">';
						
						echo '<div style="float:right">';
						echo '<img src="'. $row["photoURL"] .'" alt="icon" class="image" height="128" width="128"/>';
						echo '</div>';
						
						echo '<div>';
						echo '<h2>' . $row["nazev"] . '</h2>';
						echo '</div>';
						
						
						
						echo '<div>';
						echo 'Author: ' . $row["autor"]. '</br>';
						echo 'Date: ' . $row["datum"] . '</br>';
						echo '</br>';
						echo '</div>';
						
						echo '</div>';
						echo '</a>';
					}
				} else {
					echo "0 results";
				}
			}
		?>

	
</div>