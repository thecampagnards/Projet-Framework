<?php
//ajout de limonade
require('lib/limonade.php');
//ajout des defines
require('inc/config.inc.php');
//ajout des fonctions de base
require('modeles/index.php');


dispatch('/documents', documents_controller);
dispatch_post('/documents', documents_controller);
dispatch('/eleves', eleves_controller);
dispatch_post('/eleves', eleves_controller);
dispatch('/promotions', promotions_controller);
dispatch_post('/promotions', promotions_controller);
dispatch('/', index_controller);
dispatch('/parametres', parametres_controller);

dispatch('/csv/:doc', function(){

	if(params('doc')){
		if(params('doc') == 'documents') $data = getDocuments();
		elseif(params('doc') == 'eleves') $data = getEleves();

		if(isset($data)){
			header("Content-type: text/csv");
			foreach (getDocuments() as $key => $document) {
				foreach ($document as $key => $value) {
					echo  $value.';';
				}
				echo  "\n";
			}
		}
	}
	return;
});

run();
?>