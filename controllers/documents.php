<?php
require('modeles/documents.php');

function documents_controller(){

	if(isset($_GET['csv']) && $_GET['csv']){
		header("Content-type: text/csv");
		foreach (getDocuments() as $key => $document) {
			foreach ($document as $key => $value) {
			echo  $value.';';
			}
			echo  "\n";
		}
		return;
	}

	//si post
	if(!empty($_POST)) {

		if($_POST['action'] == 'edit') $SUCCESS = editDocument($_POST['id'], $_POST['rang'], $_POST['promo'], $_POST['libelle'], $_FILES['fichier']);
		elseif($_POST['action'] == 'add') $SUCCESS = addDocument($_POST['rang'], $_POST['promo'], $_POST['libelle'], $_FILES['fichier']);
		elseif($_POST['action'] == 'delete') $SUCCESS = deleteDocument($_POST['id']);
		elseif($_POST['action'] == 'csv'){
			if(isset($_FILES['csv']) && !empty($_FILES['csv']) && $_FILES["csv"]["type"] != "application/vnd.ms-excel"){
				$handle = fopen($_FILES['csv']['tmp_name'], "r");
				while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
					$SUCCESS = addDocument($data[0], $data[1], $data[2], $data[3]);
				}
			}
			set("SUCCESS", $SUCCESS);
		}
	}

	$documents = getDocuments();
	set("title", "Documents");
	set("subtitle", 'Il y a '.count($documents).' document(s)');
	set("documents", $documents);
	set("promotions", getPromotions());
	return html('documents.html.php','layout/default_layout.html.php');
}