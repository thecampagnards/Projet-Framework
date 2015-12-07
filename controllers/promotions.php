<?php
require('modeles/promotions.php');

function promotions_controller(){
	//si post
	if(!empty($_POST)) {
		if($_POST['action'] == 'deletes') foreach (explode(",", $_POST['ids']) as $key => $id) {
			$SUCCESS = deletePromotion($id);
		}
		set("SUCCESS", $SUCCESS);
	}
	$promotions=getPromotions();
	set("title", "Promotions");
	set("subtitle", "Il y a ".count($promotions)." promotion(s)");
	set("promotions", $promotions);
	return html('promotions.html.php','layout/default_layout.html.php');
}