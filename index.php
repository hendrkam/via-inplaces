<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="shortcut icon" href="img/icon_1.ico" />
			<?php
					if(!isset($_GET['p']))
					{
					 $adresa = "uvod.php";
					 echo('<title>Hendrich - Úvod </title>');
					}
					else
					{
					switch($_GET['p'])
					  {
					  case 'news':
							$adresa = "uvod.php";
							echo('<title>Hendrich - Úvod </title>');
							break;
					  case 'postup':
							$adresa = "postupprace.php";
							echo('<title>Hendrich - Postup práce </title>');
							break;			
					  default:
							$adresa = "uvod.php";
							echo('<title>Hendrich - Úvod </title>');
							break;
					  }

					}
			?>
	</head>

	<body>
			<div>
				<div id="content">
					<div id="horni" style="background-color: DeepSkyBlue;">
							<div>
								<img src="img/cvut2.png" alt="cvut logo" width="90" height="90" align="left">
								<p style="color:white;"><h1 style="color:white;">Kamil Hendrich</h1>
								Czech Technical University in Prague - Faculty of electrical engineering</p>
							</div>

							<div id="menu">
										<ul>
											<li><a href="?p=news">Introduction</a></li>
											<li><a href="?p=postup">Work progress</a></li>
										</ul>
									
							</div>
					</div>

					<div id="page">
						<?php
							include $adresa;
						?>
					</div>
				</div>
			</div>	
		</div>
	</body>
</html>