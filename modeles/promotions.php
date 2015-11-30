<?php

//fonction pour récupérer les promotions
function getPromotions() {
  $bdd = connectDB();
  $sql = 'SELECT * FROM promotions ORDER BY id';
  $res = $bdd->prepare($sql);
  $res->execute();
  return $res->fetchAll(PDO::FETCH_ASSOC);
}

//fonction pour editer une promotion
function editPromotion($id, $libelle) {
	$bdd = connectDB();

	$sql = 'UPDATE promotion SET
	id = :id,
	libelle = :libelle,
	WHERE id = :id';

	$stmt = $bdd->prepare($sql);

	$stmt->bindParam(':id', $id, PDO::PARAM_STR);
	$stmt->bindParam(':libelle', $libelle, PDO::PARAM_STR);

	if($stmt->execute() or die(var_dump($stmt->ErrorInfo()))) {
		return true;
	}
	return false;
}

//fonction pour ajouter une promotion
function addPromotion($id, $libelle) {
	$bdd = connectDB();

	$sql = 'INSERT INTO promotion SET
	id = :id,
	libelle = :libelle';

	$stmt = $bdd->prepare($sql);

	$stmt->bindParam(':id', $id, PDO::PARAM_STR);
	$stmt->bindParam(':libelle', $libelle, PDO::PARAM_STR);

	if($stmt->execute() or die(var_dump($stmt->ErrorInfo()))) {
		return true;
	}
	return false;
}

//fonction pour supprimer une promotion
function deletePromotion($id) {
	$bdd = connectDB();

	$sql = 'DELETE FROM promotion WHERE id = :id';
	$stmt = $bdd->prepare($sql);
	$stmt->bindParam(':id', $id, PDO::PARAM_STR);

	if($stmt->execute() or die(var_dump($stmt->ErrorInfo()))) {
		return true;
	}
	return false;
}
