<?php
require_once 'lib/limonade.php';

dispatch('/documents', function(){
	return html('templates/documents.html.php','layout/default_layout.html.php');
});

dispatch('/eleves', function(){
	return html('templates/eleves.html.php','layout/default_layout.html.php');
});
dispatch('/', function(){
	return html('templates/default.html.php','layout/default_layout.html.php');
});
dispatch('/parametres', function(){
	return html('templates/parametres.html.php','layout/default_layout.html.php');
});
run();
?>
