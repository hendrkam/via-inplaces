		<?php
		
	
		require("SwaggerDoc/autoload.php");
		$swagger = \Swagger\scan('./PetStore');
		header('Content-Type: application/json');
		echo $swagger;
		
	?>