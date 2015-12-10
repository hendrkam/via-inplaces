<html>

	<head>
			<script src="script/jquery.js"></script>
			<script>
				$(document).ready(function (){
					$.getJSON("http://hendrich.wz.cz/dataprovider/api.php?method=getAllCategories&jsoncallbacktest=?",
					function (data){
						console.log(data);
						$("#result").html( $("#result").html() + data);
					});
				});
			 </script>
		
	</head>

	<body>
		<div id="result">
			TEST
		</div>
	</body>

</html>			


	