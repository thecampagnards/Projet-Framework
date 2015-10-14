<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="js/bootstrap.min.js"></script>
</head>
<body>

<div id="header">
	<h1>Rentrée Administrateur</h1>
</div>

<div id="content">
	<div id="nav" class="col-lg-2">
		<a href="index.php">Accueil</a><br>
		<a href="?/eleves">Elèves</a><br>
		<a href="?/documents">Documents</a><br>
		<a href="?/parametres">Paramètres</a>
	</div>

	<div id="section" class="col-lg-10">
	<?php if (isset($content)){ 
		echo $content;
	}
	else{
		echo "Il y a une erreur avec la page";
	}
	?>
	</div>
</div>

<div id="footer">
	Copyright © W3Schools.com
</div>

</body>
</html>
