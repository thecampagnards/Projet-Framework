<?php
require('modeles/parametres.php');

function parametres_controller(){
	//si post
	if(!empty($_POST)) {

		set("SUCCESS", $SUCCESS);
		
	}
	set("title", "Paramètres");
	set("subtitle", 'Editer vos paramètres');
	return html('parametres.html.php','layout/default_layout.html.php');
}