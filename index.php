<?php
//ajout de limonade
require('lib/limonade.php');
//ajout des defines
require('inc/config.inc.php');
//ajout des fonctions de base
require('modeles/index.php');


dispatch('/documents', documents_controller);
dispatch('/eleves', eleves_controller);

dispatch('/', function(){
	set("title", "Accueil");
	return html('default.html.php','layout/default_layout.html.php');
});
dispatch('/parametres', function(){
	set("title", "Paramètres");
	return html('parametres.html.php','layout/default_layout.html.php');
});
run();
?>
