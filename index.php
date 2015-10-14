<php
require_once 'lib/limonade.php';

dispatch('/documents', function(){
	set("title", "Documents");
	return html('documents.html.php','layout/default_layout.html.php');
});

dispatch('/eleves', function(){
	set("title", "Elèves");
	return html('eleves.html.php','layout/default_layout.html.php');
});
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