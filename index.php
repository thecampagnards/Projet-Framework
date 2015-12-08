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

//generation des csv
dispatch('/csv/:doc', function(){

	if(params('doc')){
		if(params('doc') == 'documents') $datas = getDocuments();
		elseif(params('doc') == 'eleves') $datas = getEleves();
		elseif(params('doc') == 'promotions') $datas = getPromotion();

		if(isset($datas)){
			header("Content-type: text/csv");
			foreach ($datas as $key => $data) {
				foreach ($data as $key => $value) {
					echo  $value.';';
				}
				echo  "\n";
			}
		}
	}
	return;
});

//generation des pdf
dispatch('/pdf/:doc', function(){

	require('lib/fpdf/fpdf.php');
	class PDF extends FPDF{
		function BasicTable($header, $data, $width){
			$this->SetFont('','B');
			foreach($header as $col) $this->Cell($width,7,utf8_decode($col),1);
			$this->Ln();
			$this->SetFont('');
			foreach($data as $row){
				foreach($row as $col)
					$this->Cell($width,6,utf8_decode($col),1);
				$this->Ln();
			}
		}
	}

	$pdf = new PDF();
	$pdf->SetFont('Arial','',14);
	$pdf->AddPage('L');

	if(params('doc') == 'documents') {
		$header = array('ID', 'Rang', 'Promo', 'Libelle', 'Fichier');
		$datas = getDocuments();
		$width = 55;
	}
	elseif(params('doc') == 'eleves'){
		$header = array('ID', 'Identitfiant', 'Nom Fils', 'Prenom Fils', 'DDN Fils', 'Téléphone', 'Courriel', 'Date','IP');
		$datas = getEleves();
		$width = 31;
	}
	elseif(params('doc') == 'promotions'){
		$header = array('ID', 'Identitfiant', 'Nom Fils', 'Prenom Fils', 'DDN Fils', 'Téléphone', 'Courriel', 'Date','IP');
		$datas = getPromotion();
		$width = 31;
	}

	$pdf->BasicTable($header,$datas,$width);
	$pdf->Output();
});

//getnbdocumentbypromo
dispatch('/documents/count/:promo', function(){
	echo getNbDocumentsByPromo(params('promo'));
});
run();
?>