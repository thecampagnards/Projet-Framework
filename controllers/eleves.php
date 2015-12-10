<?php
require('modeles/eleves.php');

function eleves_controller(){
	//si post
	if(!empty($_POST)) {

		if($_POST['action'] == 'edit') $SUCCESS = editEleve($_POST['id'], $_POST['identifiant'], $_POST['nom_fils'], $_POST['prenom_fils'], $_POST['ddn_fils'], $_POST['tel_mobile'], $_POST['courriel']);
		elseif($_POST['action'] == 'add') $SUCCESS = addEleve($_POST['identifiant'], $_POST['nom_fils'], $_POST['prenom_fils'], $_POST['ddn_fils'], $_POST['tel_mobile'], $_POST['courriel']);
		elseif($_POST['action'] == 'delete') $SUCCESS = deleteEleve($_POST['id']);
		elseif($_POST['action'] == 'deletes') foreach (explode(",", $_POST['ids']) as $key => $id) $SUCCESS = deleteEleve($id);
		elseif($_POST['action'] == 'csv'){
			if(isset($_FILES['csv']) && !empty($_FILES['csv']) && $_FILES["csv"]["type"] != "application/vnd.ms-excel"){
				$handle = fopen($_FILES['csv']['tmp_name'], "r");
				while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
					if(count($data) != 6){
						$SUCCESS = false;
						break;
					}
					$SUCCESS = addEleve($data[0], $data[1], $data[2], $data[3], $data[4], $data[5]);
				}
			}			
		}
		set("SUCCESS", $SUCCESS);
	}

	$eleves = getEleves();
	set("title", "Elèves");
	set("subtitle", 'Il y a '.count($eleves).' élève(s)');

	set("eleves", $eleves);
	return html('eleves.html.php','layout/default_layout.html.php');
}