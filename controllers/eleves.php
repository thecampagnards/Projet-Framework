<?php
require('modeles/eleves.php');

function eleves_controller(){
	//si post
	if(!empty($_POST)) {

	}

	$eleves = getEleves();
	set("title", "Elèves");
	set("subtitle", 'Il y a '.count($eleves).' élève(s)');

	set("eleves", $eleves);
	return html('eleves.html.php','layout/default_layout.html.php');
}