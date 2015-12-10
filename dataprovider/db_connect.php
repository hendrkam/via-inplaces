
	<?php
		//$servername = "sql2.webzdarma.cz";
		//$username = "hendrich.wz.6240";
		//$password = "viadb91";
		//$database = "hendrich.wz.6240";
		
		
		$servername = "localhost:3310";
		$username = "root";
		$password = "root";
		$database = "via";
		
		// Create connection
		$conn = new mysqli($servername, $username, $password, $database);

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		echo "</br>DB Connected successfully</br>";
		
		
		
		
	/*	if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo "id: " . $row["id"]. " - ...: " . $row["nazev"]. " " . $row["popis"]. "</br>";
				}
			} else {
				echo "0 results";
			}
			*/
			

		
		//$conn->close();
	?>