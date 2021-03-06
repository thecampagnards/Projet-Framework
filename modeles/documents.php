<?php

//fonction pour récupérer les documents
function getDocuments() {
	$bdd = connectDB();
	$sql = 'SELECT * FROM document ORDER BY rang';
	$res = $bdd->prepare($sql);
	$res->execute();
	return $res->fetchAll(PDO::FETCH_ASSOC);
}

//fonction pour récupérer les documents
function getNbDocumentsByPromo($promo = '') {
	$bdd = connectDB();
	$sql = 'SELECT COUNT(promo) FROM document WHERE promo = :promo GROUP BY promo';
	$res = $bdd->prepare($sql);
	$res->bindParam(':promo', $promo, PDO::PARAM_STR);
	$res->execute();
	return $res->fetchColumn();
}

//fonction pour editer un document
function editDocument($id, $rang, $promo, $libelle, $fichier) {
	$bdd = connectDB();

	$sql = 'SELECT * FROM document WHERE id = :id';
	$res = $bdd->prepare($sql);
	$res->bindParam(':id', $id, PDO::PARAM_INT);
	$res->execute();
	$rang_old = $res->fetch(PDO::FETCH_ASSOC)['rang'];

	//on change de rang
	$sql = 'UPDATE document SET rang = :rang_old WHERE rang = :rang';
	$stmt = $bdd->prepare($sql);
	$stmt->bindParam(':rang_old', $rang_old, PDO::PARAM_INT);
	$stmt->bindParam(':rang', $rang, PDO::PARAM_INT);
	$stmt->execute() ;

	$sql = 'UPDATE document SET
	id = :id,
	rang = :rang,
	promo = :promo,
	libelle = :libelle';
	if(isset($fichier) && !empty($fichier)) if($fichier_chemin = addFile($fichier,$promo)) {
		$sql .= ', fichier = :fichier';
	}
	$sql .= ' WHERE id = :id';

	$stmt = $bdd->prepare($sql);

	if(isset($fichier_chemin) && !empty($fichier_chemin)) {
		$stmt->bindParam(':fichier', $fichier_chemin, PDO::PARAM_STR);
	}

	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->bindParam(':rang', $rang, PDO::PARAM_INT);
	$stmt->bindParam(':promo', $promo, PDO::PARAM_STR);
	$stmt->bindParam(':libelle', $libelle, PDO::PARAM_STR);

	if($stmt->execute() or die(var_dump($stmt->ErrorInfo()))) {
		return true;
	}
	return false;
}

//fonction pour ajouter un document
function addDocument($rang, $promo, $libelle, $fichier) {

	$bdd = connectDB();

	$rang_old = getNbDocumentsByPromo($promo) + 1;

	//on change de rang
	if($rang_old != $rang){
		$sql = 'UPDATE document SET rang = :rang_old WHERE rang = :rang';
		$stmt = $bdd->prepare($sql);
		$stmt->bindParam(':rang_old', $rang_old, PDO::PARAM_INT);
		$stmt->bindParam(':rang', $rang, PDO::PARAM_INT);
		$stmt->execute();
	}

	$sql = 'INSERT INTO document SET
	rang = :rang,
	promo = :promo,
	libelle = :libelle';

	if(isset($fichier) && !empty($fichier)) if($fichier_chemin = addFile($fichier,$promo)) {
		$sql .= ', fichier = :fichier';
	}

	$stmt = $bdd->prepare($sql);

	if(isset($fichier_chemin) && !empty($fichier_chemin)) {
		$stmt->bindParam(':fichier', $fichier_chemin, PDO::PARAM_STR);
	}

	$stmt->bindParam(':rang', $rang, PDO::PARAM_INT);
	$stmt->bindParam(':promo', $promo, PDO::PARAM_STR);
	$stmt->bindParam(':libelle', $libelle, PDO::PARAM_STR);

	if($stmt->execute() or die(var_dump($stmt->ErrorInfo()))) {
		return true;
	}
	return false;
}

//fonction pour supprimer un document
function deleteDocument($id) {
	$bdd = connectDB();

	$sql = 'DELETE FROM document WHERE id = :id';
	$stmt = $bdd->prepare($sql);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);

	if($stmt->execute() or die(var_dump($stmt->ErrorInfo()))) {
		return true;
	}
	return false;
}

//fonction pour ajouter un fichier
function addFile($fichier,$promo) {

	if ($fichier['error'] == UPLOAD_ERR_OK) {
		$source = $fichier['tmp_name'];
		$upload_dir = '';

		if(strpos($promo,'A1') || strpos($promo,'A2')) $upload_dir = 'A12/';
		else if(strpos($promo,'A3') || strpos($promo,'A4')|| strpos($promo,'A5')) $upload_dir = 'A345/';
		if (file_exists(FILES_DIR.$upload_dir) && is_writable(FILES_DIR.$upload_dir)) {
			move_uploaded_file($fichier['tmp_name'],FILES_DIR.$upload_dir.$fichier['name']);
			return $upload_dir.$fichier['name'];
		}
	}
	return false;
}