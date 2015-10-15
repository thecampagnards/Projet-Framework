<?php 
require_once 'db.php';
echo "<h1>$title</h1>";?> 

<div id="ban">
	<div class="alert alert-success" role="alert">...</div>
	<div class="alert alert-warning" role="alert">...</div>
	<div class="alert alert-danger" role="alert">...</div>
</div>

<div id="buttons-tab">
	<button type="button" class="btn btn-success">Ajouter</button>
	<button type="button" class="btn btn-danger">Supprimer</button>
</div>

<table id="table_id" class="table table-striped table-hover display">
  <tr>
    <th>#</th>
    <th>rang</th>
    <th>promo</th>
    <th>libelle</th>
    <th>fichier</th>
    <th></th>
  </tr>

<?php $reponse = $bdd->query('SELECT * FROM document ORDER BY rang');
while ($donnees = $reponse->fetch()){ ?>
  <tr>
    <td><input type="checkbox" id="inlineCheckbox1" value="<?php echo $donnees['id']; ?>"></td>
    <td><?php echo $donnees['rang']; ?></td>
    <td><?php echo $donnees['promo']; ?></td>
    <td><?php echo $donnees['libelle']; ?></td>
    <td><?php echo $donnees['fichier']; ?></td>
    <td>
	<button type="button" class="btn btn-default" aria-label="<?php echo $donnees['id']; ?>">
	  <span class="glyphicon  glyphicon glyphicon glyphicon-pencil" aria-hidden="true"></span>
	</button>
        <button type="button" class="btn btn-default" aria-label="<?php echo $donnees['id']; ?>">
	  <span class="glyphicon  glyphicon glyphicon-trash" aria-hidden="true"></span>
	</button>
    </td>
  </tr>
  <?php }
  $reponse->closeCursor(); // Termine le traitement de la requête
  ?>

</table> 
