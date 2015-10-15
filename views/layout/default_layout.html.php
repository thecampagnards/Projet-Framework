<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="js/jquery-2.1.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/main.js"></script>
</head>
<body>

	<div id="header">
		<h1>Rentrée Administrateur</h1>
	</div>
	<nav class="navbar navbar-default" id="navbar">
  <div class="container">
  	 <ul class="nav navbar-nav">
			<!--<li class="active"><a style="height:75px;padding-top:28px;" href="index.php">Se connecter</a></li>-->
			<li><a href="index.php">Accueil</a></li>
			<li><a href="?/eleves">Elèves</a></li>
			<li><a href="?/documents">Documents</a></li>
			<li><a href="?/parametres">Paramètres</a></li>
		</ul>
  </div>
</nav>

	<div id="section" class="col-lg-12">
		<?php if (isset($content)){ 
			echo $content;
		}
		else{
			echo "Il y a une erreur avec la page";
		}
		?>
	</div>

	<div id="footer">
		Copyright © W3Schools.com
	</div>

</body>
</html>
