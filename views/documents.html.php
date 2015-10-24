<?php 
require_once 'db.php';
echo '<h1>'.$title.'<small id="nb_lignes"></small></h1>';?> 
<!--Alertes pour affichers les resultats des actions-->
<div id="ban">
  <div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> This alert box could indicate a successful or positive action.
  </div>
    <div class="alert alert-warning">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Warning!</strong> This alert box could indicate a successful or positive action.
  </div>
    <div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Danger!</strong> This alert box could indicate a successful or positive action.
  </div>
</div>

<div id="buttons-tab">
	<button type="button" class="btn btn-success">Ajouter</button>
	<button type="button" class="btn btn-danger">Supprimer</button>
</div>
<!-- Tableau de données-->
<table id="table_id" class="table table-striped table-hover display table-bordered">
    <thead>
    <tr>
      <th><input type="checkbox" name="select-all" id="select-all" /></th>
      <th class="sorting">rang</th>
      <th class="sorting">promo</th>
      <th class="sorting">libelle</th>
      <th class="sorting">fichier</th>
      <th></th>
    </tr>
    </thead>
    <tbody>
    <?php $reponse = $bdd->query('SELECT * FROM document ORDER BY rang');
    while ($donnees = $reponse->fetch()){ ?>
    <tr>
      <td><input type="checkbox" value="<?php echo $donnees['id']; ?>"></td>
      <td><?php echo $donnees['rang']; ?></td>
      <td><?php echo $donnees['promo']; ?></td>
      <td><?php echo $donnees['libelle']; ?></td>
      <td><?php echo $donnees['fichier']; ?></td>
      <td>
      	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModalMod<?php echo $donnees['id']; ?>" aria-label="<?php echo $donnees['id']; ?>">
      	  <span class="glyphicon  glyphicon glyphicon glyphicon-pencil" aria-hidden="true"></span>
      	</button>
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModalDel<?php echo $donnees['id']; ?>" aria-label="<?php echo $donnees['id']; ?>">
      	  <span class="glyphicon  glyphicon glyphicon-trash" aria-hidden="true"></span>
      	</button>
      </td>
    </tr>
    <!-- Modal Modifier-->
    <div class="modal fade" id="myModalMod<?php echo $donnees['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Modifier le document <?php echo $donnees['libelle']; ?></h4>
          </div>
          <div class="modal-body">
            <?php echo $donnees['libelle']; ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
            <button type="button" class="btn btn-primary">Enregistrer</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Supprimer-->
    <div class="modal fade" id="myModalDel<?php echo $donnees['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Supprimer le document <?php echo $donnees['libelle']; ?></h4>
          </div>
          <div class="modal-body">
            <?php echo $donnees['libelle']; ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
            <button type="button" class="btn btn-primary">Supprimer</button>
          </div>
        </div>
      </div>
    </div>
    <?php }
    $reponse->closeCursor();
    ?>
    </tbody>
</table> 