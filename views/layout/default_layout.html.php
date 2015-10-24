<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<script src="js/jquery-2.1.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/main.js"></script>
</head>
	<body>
	<!--Navbar Header-->
	<header>
		<nav class="navbar navbar-default" id="navbar">
		  <div class="container-fluid">
		  	 <ul class="nav navbar-nav">
					<li><a href="index.php">Accueil</a></li>
					<li><a href="?/eleves">Elèves</a></li>
					<li><a href="?/documents">Documents</a></li>
					<li><a href="?/parametres">Paramètres</a></li>
				</ul>
		  </div>
		</nav>
	</header>
	<!--Récuperation du contenu de la page-->
	<div id="section" class="col-lg-12">
		<?php if (isset($content)){ 
			echo $content;
		}
		else{
			echo "Il y a une erreur avec le chargement des données";
		}?>
	</div>
	<!--footer-->
	<footer>
	</footer>
</body>
</html>
