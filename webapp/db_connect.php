
	<?php
		/* 
		    DB_connect.php
			Pripojeni k DB 
		*/

	
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
		//echo "Connected successfully";
		
		//$conn->close();
		

	?>