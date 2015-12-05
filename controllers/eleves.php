<?php
require('modeles/eleves.php');

function eleves_controller(){
	//si post
	if(isset($_GET['csv']) && $_GET['csv']){
		echo 'test';
		return;
	}
	if(!empty($_POST)) {
		echo '<pre>';

		var_dump($_POST);
		echo '<br/>';
		var_dump($_FILES);

		if($_POST['action'] == 'edit') $SUCCESS = editDocument($_POST['id'], $_POST['rang'], $_POST['promo'], $_POST['libelle'], $_FILES['fichier']);
		elseif($_POST['action'] == 'add') $SUCCESS = addDocument($_POST['rang'], $_POST['promo'], $_POST['libelle'], $_FILES['fichier']);
		elseif($_POST['action'] == 'delete') $SUCCESS = deleteDocument($_POST['id']);
	}

	$eleves = getEleves();
	set("title", "Elèves");
	set("subtitle", 'Il y a '.count($eleves).' élève(s)');

	set("eleves", $eleves);
	return html('eleves.html.php','layout/default_layout.html.php');
}