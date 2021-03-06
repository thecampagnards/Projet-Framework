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
function editPromotion($id_old,$id, $libelle) {
	$bdd = connectDB();

	$sql = 'UPDATE document SET
	promo = :id
	WHERE promo = :id_old';

	$stmt = $bdd->prepare($sql);

	$stmt->bindParam(':id', $id, PDO::PARAM_STR);
	$stmt->bindParam(':id_old', $id_old, PDO::PARAM_STR);

	if($stmt->execute() or die(var_dump($stmt->ErrorInfo()))) {
		
		$sql = 'UPDATE promotions SET
		id = :id,
		libelle = :libelle
		WHERE id = :id_old';

		$stmt = $bdd->prepare($sql);

		$stmt->bindParam(':id', $id, PDO::PARAM_STR);
		$stmt->bindParam(':id_old', $id_old, PDO::PARAM_STR);

		$stmt->bindParam(':libelle', $libelle, PDO::PARAM_STR);

		if($stmt->execute() or die(var_dump($stmt->ErrorInfo()))) {
			return true;
		}
	}
	return false;
}

//fonction pour ajouter une promotion
function addPromotion($id, $libelle) {
	$bdd = connectDB();

	$sql = 'INSERT INTO promotions SET
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

	$sql = 'DELETE FROM promotions WHERE id = :id';
	$stmt = $bdd->prepare($sql);
	$stmt->bindParam(':id', $id, PDO::PARAM_STR);

	if($stmt->execute() or die(var_dump($stmt->ErrorInfo()))) {
		return true;
	}
	return false;
}

//si la promotion est en 1,2 ou 3,4,5 eme année
function checkPromotion($value){
	if(in_array(substr($value, -1),array("1", "2"))){
		return 1;
	}else if(in_array(substr($value, -1),array("3", "4", "5"))){
		return 2;
	}
	return false;
}