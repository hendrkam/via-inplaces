<!doctype html>
<html>
  <head>
  	<meta charset="utf-8">
    <title>Data provider - public API</title>
	 <link rel="stylesheet" href="style/style.css">
  </head>
  
  <body>
	<div id="top">
		<h1>Data provider - public API</h1>
	</div>
	</br></br>
	
	<div class="document">
    	<h3>How to use API</h3>
		<dd>
			<table id="t01">
			  <tr>
				<th>Address</th>
				<th>Usage</th>
				  <th>Method</th>
				<th>Result format</th>
			  </tr>
			  <tr>
				<td>/</td>
				<td>Detecting API state and discover documentation</td>
				  <td>GET</td>
				<td>Text/HTML</td>
			  </tr>
				<tr>
					<td>/categories/</td>
					<td>Returns list of all categories</td>
					<td>GET</td>
					<td>JSON</td>
				</tr>
				<tr>
					<td>/categories/{id}</td>
					<td>Returns one of categories by id</td>
					<td>GET</td>
					<td>JSON</td>
				</tr>
			</table>
		</dd>
		</br>
		
    	</div>
		
		<div class="document">
			<h3>API Documentation</h3>
				<div id="swagdoc">
					<dd>
						<a href="doc.html"> >>> Documentation by Swagger <<< </a>
					</dd>
				</div>
				</br>
		</div>		
		
		<div class="document">
			<h3>Technologies</h3>
				<p>Swagger Documentation</p>
				<p>Flight PHP Framework http://flightphp.com/</p>
		</div>
		
		<div class="document">
			<h3>Actual API state</h3>
			
				<?php

				require 'vendor/autoload.php';

				function ready(){
					echo '<div class="success">API is ready!</div>';
				}
				
				function connect(){
						/*
							$servername = "sql2.webzdarma.cz";
							$username = "hendrich.wz.6240";
							$password = "viadb91";
							$database = "hendrich.wz.6240";
						*/
						
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
						
						$sql = "SELECT * FROM categories";
						$result = $conn->query($sql);
						
						
						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
								echo "id: " . $row["id"]. " - ...: " . $row["nazev"]. " " . $row["popis"]. "</br>";
								}
							} else {
								echo "0 results";
							}
				
				}
				
				
				Flight::route('/categories/', function(){
						
						/*
							$servername = "sql2.webzdarma.cz";
							$username = "hendrich.wz.6240";
							$password = "viadb91";
							$database = "hendrich.wz.6240";
						*/
						
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
						
						$sql = "SELECT * FROM categories";
						$result = $conn->query($sql);
					
					$rows = array();

					while ($row = mysqli_fetch_row($result)) {
						$rows[] = $row;
					}

					//echo json_encode($rows);
					Flight::json($rows);
				});
				
					
				Flight::route('/categories/@id:[0-9]+', function($id){
					//echo "hello, ($id)!";
					/*
						$servername = "sql2.webzdarma.cz";
						$username = "hendrich.wz.6240";
						$password = "viadb91";
						$database = "hendrich.wz.6240";
						*/
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
						
						$sql = "SELECT * FROM categories WHERE id = '$id'";
						$result = $conn->query($sql);
					
					$row = mysqli_fetch_row($result);
					//echo json_encode($rows);
					Flight::json($row);
				});

				Flight::route('/', 'ready');
				Flight::start();
					
				?>
	
		</div>
		
  </body>
</html>
