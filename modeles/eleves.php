<?php

//fonction pour récupérer les eleves
function getEleves() {
  $bdd = connectDB();
  $sql = 'SELECT * FROM data ORDER BY date';
  $res = $bdd->prepare($sql);
  $res->execute();
  return $res->fetchAll(PDO::FETCH_ASSOC);
}
function getGraphEleves(){
  $bdd = connectDB();
  $sql = "SELECT date, COUNT(*) AS value, DATE_FORMAT(date,'%Y-%m-%d') AS date_analytique FROM data GROUP BY date";
  $res = $bdd->prepare($sql);
  $res->execute();
  return $res->fetchAll(PDO::FETCH_ASSOC);
}

//fonction pour editer un eleve
function editEleve($id, $identfiant, $nom_fils, $prenom_fils, $ddn_fils, $tel_mobile, $courriel, $date, $ip) {
	$bdd = connectDB();

	$sql = 'UPDATE data SET
	id = :id,
	identfiant = :identfiant,
	nom_fils = :nom_fils,
	prenom_fils = :prenom_fils,
	ddn_fils = :ddn_fils,
	tel_mobile = :tel_mobile,
	courriel = :courriel,
	date = :date,
	ip = :ip
	WHERE id = :id';

	$stmt = $bdd->prepare($sql);

	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->bindParam(':identfiant', identfiant, PDO::PARAM_STR);
	$stmt->bindParam(':nom_fils', nom_fils, PDO::PARAM_STR);
	$stmt->bindParam(':prenom_fils', prenom_fils, PDO::PARAM_STR);
	$stmt->bindParam(':ddn_fils', ddn_fils, PDO::PARAM_STR);
	$stmt->bindParam(':tel_mobile', tel_mobile, PDO::PARAM_STR);
	$stmt->bindParam(':courriel', courriel, PDO::PARAM_STR);
	$stmt->bindParam(':date', date, PDO::PARAM_STR);
	$stmt->bindParam(':ip', ip, PDO::PARAM_STR);

	if($stmt->execute() or die(var_dump($stmt->ErrorInfo()))) {
		return true;
	}
	return false;
}

//fonction pour ajouter un eleve
function addEleve($rang, $promo, $libelle, $fichier) {
	$bdd = connectDB();

	$sql = 'INSERT INTO data SET
	id = :id,
	identfiant = :identfiant,
	nom_fils = :nom_fils,
	prenom_fils = :prenom_fils,
	ddn_fils = :ddn_fils,
	tel_mobile = :tel_mobile,
	courriel = :courriel,
	date = :date,
	ip = :ip';

	$stmt = $bdd->prepare($sql);

	$stmt->bindParam(':identfiant', identfiant, PDO::PARAM_STR);
	$stmt->bindParam(':nom_fils', nom_fils, PDO::PARAM_STR);
	$stmt->bindParam(':prenom_fils', prenom_fils, PDO::PARAM_STR);
	$stmt->bindParam(':ddn_fils', ddn_fils, PDO::PARAM_STR);
	$stmt->bindParam(':tel_mobile', tel_mobile, PDO::PARAM_STR);
	$stmt->bindParam(':courriel', courriel, PDO::PARAM_STR);
	$stmt->bindParam(':date', date, PDO::PARAM_STR);
	$stmt->bindParam(':ip', ip, PDO::PARAM_STR);

	if($stmt->execute() or die(var_dump($stmt->ErrorInfo()))) {
		return true;
	}
	return false;
}

//fonction pour supprimer un eleve
function deleteEleve($id) {
	$bdd = connectDB();

	$sql = 'DELETE FROM data WHERE id = :id';
	$stmt = $bdd->prepare($sql);
	$stmt->bindParam(':id', $id, PDO::PARAM_STR);

	if($stmt->execute() or die(var_dump($stmt->ErrorInfo()))) {
		return true;
	}
	return false;
}
