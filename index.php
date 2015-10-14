<?php
require_once 'lib/limonade.php';

dispatch('/documents', function(){
	set("title", "Documents");
	set("texte", "Exemple4");
	return html('documents.html.php','layout/default_layout.html.php');
});

dispatch('/eleves', function(){
	return html('eleves.html.php','layout/default_layout.html.php');
});
dispatch('/', function(){
	return html('default.html.php','layout/default_layout.html.php');
});
dispatch('/parametres', function(){
	return html('parametres.html.php','layout/default_layout.html.php');
});
run();
?>
