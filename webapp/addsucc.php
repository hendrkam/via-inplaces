<script type="text/javascript">
	function changeFunction() {
			$('#container').text('New record created successfully. Thank you!');
	}
	
	
	function changeImgFunction() {
			$('#imgcontainer').text('Image has been uploaded!');
	}
	
</script>
			
<div id="content">		
	<h2 id="container">
		
	</h2>
	
	<p id="imgcontainer">
		
	</p>
</div>

<?php
		function addsucc()
			{
				// id, nazev, autor, popis, idKategorie, latitide, longitude, photoURL, datum
			$varTitle = $_POST["title"];
			$varName = $_POST["name"];
			$varDescription = $_POST["description"];
			$varCategory = $_POST["category"];
			$varLat = $_POST["lat"];
			$varLong = $_POST["long"];
			$varDate = date("j, n, Y");   
			$varURL = "uploads/nophoto.png";
			
			// IMAGE upload =====
					$target_dir = "uploads/";
					$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
					$uploadOk = 1;
					$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
					// Check if image file is a actual image or fake image
						$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
						if($check !== false) {
							//echo "File is an image - " . $check["mime"] . ".";
							$uploadOk = 1;
						} else {
							echo "File is not an image.";
							$uploadOk = 0;
						}
						
							if ($uploadOk == 0) {
								echo "Sorry, your file was not uploaded.";
							// if everything is ok, try to upload file
							} else {
							if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
								//echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
								$varURL = $target_dir .	basename( $_FILES["fileToUpload"]["name"]);
								?>				
								<script type="text/javascript">
									changeImgFunction();
								</script>
								<?php
							} else {
								echo "Sorry, there was an error uploading your file.";
							}}
		
			
			//echo "$varURL";
			// ======

			$sql = "INSERT INTO prispevek VALUES (UUID(),'$varTitle',
			'$varName',
			'$varDescription',
			'$varCategory',
			'$varLat',
			'$varLong',
			'$varURL',
			'$varDate')";

			include "db_connect.php";
			
			if ($conn->query($sql) === TRUE) {	
				//echo "succes";
			?>
				
				<script type="text/javascript">
					changeFunction();
				</script>
			<?php	
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
				
		}
		
		addsucc();
		?>
