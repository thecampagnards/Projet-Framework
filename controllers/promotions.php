<?php
require('modeles/promotions.php');

function promotions_controller(){
	//si post
	if(!empty($_POST)) {
		if($_POST['action'] == 'edit') $SUCCESS = editPromotion($_POST['id_old'],$_POST['id'], $_POST['libelle']);
		elseif($_POST['action'] == 'add') $SUCCESS = addPromotion($_POST['id'], $_POST['libelle']);
		elseif($_POST['action'] == 'delete') $SUCCESS = deletePromotion($_POST['id']);
		elseif($_POST['action'] == 'deletes') foreach (explode(",", $_POST['ids']) as $key => $id) $SUCCESS = deletePromotion($id);
		elseif($_POST['action'] == 'csv'){
			if(isset($_FILES['csv']) && !empty($_FILES['csv']) && $_FILES["csv"]["type"] != "application/vnd.ms-excel"){
				$handle = fopen($_FILES['csv']['tmp_name'], "r");
				while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
					$SUCCESS = addPromotion($data[0], $data[1]);
				}
			}			
		}
		set("SUCCESS", $SUCCESS);
	}
	$promotions=getPromotions();
	set("title", "Promotions");
	set("subtitle", "Il y a ".count($promotions)." promotion(s)");
	set("promotions", $promotions);
	return html('promotions.html.php','layout/default_layout.html.php');
}