<?php
require('modeles/eleves.php');

function eleves_controller(){
	//si post
	if(!empty($_POST)) {

		if($_POST['action'] == 'edit') $SUCCESS = editEleve($_POST['id'], $_POST['identifiant'], $_POST['nom_fils'], $_POST['prenom_fils'], $_POST['ddn_fils'], $_POST['tel_mobile'], $_POST['courriel']);
		elseif($_POST['action'] == 'add') $SUCCESS = addEleve($_POST['identifiant'], $_POST['nom_fils'], $_POST['prenom_fils'], $_POST['ddn_fils'], $_POST['tel_mobile'], $_POST['courriel']);
		elseif($_POST['action'] == 'delete') $SUCCESS = deleteEleve($_POST['id']);
		elseif($_POST['action'] == 'deletes') foreach (explode(",", $_POST['ids']) as $key => $id) $SUCCESS = deleteEleve($id);
		set("SUCCESS", $SUCCESS);
	}

	$eleves = getEleves();
	set("title", "Elèves");
	set("subtitle", 'Il y a '.count($eleves).' élève(s)');

	set("eleves", $eleves);
	return html('eleves.html.php','layout/default_layout.html.php');
}