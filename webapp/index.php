<!doctype html>
<html>

	<!-- Index.php 
		Basic page, Generate Menu, change content, DB connection
	-->
	
  <head>
	<meta name="description" content="Interesting places mashup application by Kamil Hendrich.">
  	<meta charset="utf-8">
    <title>In-places web mashup</title>
	 <link rel="stylesheet" href="style/style.css">
	 <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
	 
	 <script src="script/jquery.js"></script>
	 <script src="script/script.js"></script>   
	 
	 <script src="script/locationpicker.jquery.js"></script>
	 
	 <?php
		if(!isset($_GET['p']))
			{
				$adresa = "intro.php";
			}
			else
			{
				switch($_GET['p'])
				  {
				  case 'intro':
						$adresa = "intro.php";
						break;
				  case 'weather':
						$adresa = "weather.php";
						break;
				  case 'categories':
						$adresa = "contentpage.php";
						break;
				  case 'add':
						$adresa = "add.php";
						break;		
				  case 'added':
						$adresa = "addsucc.php";
						break;	
				  case 'generate':
						$adresa = "generate.php";
						break;
				  case 'photos':
						$adresa = "photos.php";
						break;		
				  case 'test':
						$adresa = "test.php";
						break;						
				  default:
						$adresa = "intro.php";
						break;
			  }
			}
		?>
  </head>
  
  <body>
	<div id="settings">
		<img src="img/user.png" alt="icon" class="image" height="20" width="20"/>
		<img src="img/cz-flag.png" alt="icon" class="image" height="20" width="20"/>
		<img src="img/en-flag.png" alt="icon" class="image" height="20" width="20"/>
	</div>

	<div id="top">
		<h1>In-places</h1>
	</div>
    
    <div id="menu">
    	<!--<h2>Menu</h2>-->
			 <a href="?p=intro"><div class="menuItem"><img src="img/intro.png" alt="icon" class="image" height="32" width="32"/> Introduction</div></a>
			 <a href="?p=weather"><div class="menuItem"><img src="img/weather.png" alt="icon" class="image" height="32" width="32"/> Weather info</div></a>
			 <a href="?p=photos"><div class="menuItem"><img src="img/camera.png" alt="icon" class="image" height="32" width="32"/> Photos</div></a></br>
			 <a href="?p=add"><div class="menuItem"><img src="img/add.png" alt="icon" class="image" height="32" width="32"/> Add new place</div></a>
			 <!--<a href="?p=dbread"><div class="menuItem"><img src="img/earth.png" alt="icon" class="image" height="32" width="32" /> DB READ Test</div></a>-->
			 <a href="?p=categories&catid=99"><div class="menuItem"><img src="img/earth.png" alt="icon" class="image" height="32" width="32" /> All categories</div></a>
			
			<?php
				$basicURL = "http://hendrich.wz.cz/dataprovider/categories/";	 
				//$json = file_get_contents($cat0);
				//var_dump(json_decode($json));
				//$arr = json_decode($json);
				//var_dump($arr);
				
				$data = file_get_contents($basicURL);
				$arrayData = json_decode($data);
				//var_dump($arrayData);
			if(count($arrayData) > 0){
										
				for ($i = 0; $i < count($arrayData); $i++) {
					//echo "The number is: $i <br>";
					echo '<a href="?p=categories&catid=' . $arrayData[$i][0] . '"><div class="menuItem">';
					echo '<img src="' . $arrayData[$i][3] . ' " alt="icon" class="image" height="32" width="32" />';
					echo $arrayData[$i][1];
					echo '</div></a>';
				}
				
			}
			else{
				echo 'ERROR - default loaded';
					echo ' <a href="?p=categories"><div class="menuItem"><img src="img/restaurant.png" alt="icon" class="image" height="32" width="32" /> Restaurants</div></a>';
					echo '<a href="?p=categories"><div class="menuItem"><img src="img/castle.png" alt="icon" class="image" height="32" width="32" /> Castles & statues</div></a>';
					echo '<a href="?p=categories"> <div class="menuItem"><img src="img/nature.png" alt="icon" class="image" height="32" width="32" /> Nature & parks</div></a>';
					echo '<a href="?p=categories"><div class="menuItem"><img src="img/museum.png" alt="icon" class="image" height="32" width="32" /> Museum & art</div></a>';
					echo '<a href="?p=categories"><div class="menuItem"><img src="img/education.png" alt="icon" class="image" height="32" width="32" /> Education</div></a>';
					echo '<a href="?p=categories"><div class="menuItem"><img src="img/shopping.png" alt="icon" class="image" height="32" width="32" /> Shopping</div></a>';
					echo '<a href="?p=categories"><div class="menuItem"><img src="img/sport.png" alt="icon" class="image" height="32" width="32" /> Sports</div></a>';
					echo '<a href="?p=categories"><div class="menuItem"><img src="img/other.png" alt="icon" class="image" height="32" width="32" /> Other</div></a>';	
			}

			 /*
				 include "db_connect.php";
				
				$sql = "SELECT * FROM categories";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						echo '<a href="?p=categories&catid=' .  $row["id"] . '">';
						echo 'TEST  '.  $row["id"];
						echo '</a>';
						echo '</br>';
					}
				} else {
					echo "0 results";
				}
	*/
			 ?>			 	 

			</br>
				<p id="foot">In-places mashup by Kamil Hendrich</p>
			</br>
    </div>
	
	<div id="page">
		<?php
			include $adresa;
			include "db_connect.php";
		?>
	</div>
	
  </body>
</html>
