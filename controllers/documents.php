<?php
require('modeles/documents.php');

function documents_controller(){
	//si post
	if(!empty($_POST)) {
		var_dump($_POST);
	}

	$documents = getDocuments();
	set("title", "Documents");
	set("subtitle", 'Il y a '.count($documents).' document(s)');
	set("documents", $documents);
	return html('documents.html.php','layout/default_layout.html.php');
}