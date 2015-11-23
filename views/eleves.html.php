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
<br/>
<!-- Tableau de données-->
<table id="table_id" class="table table-striped table-hover display table-bordered">
    <thead>
    <tr>
      <th><input type="checkbox" name="select-all" id="select-all" /></th>
      <th class="sorting">identifiant</th>
      <th class="sorting">nom_fils</th>
      <th class="sorting">prenom_fils</th>
      <th class="sorting">ddn_fils</th>
      <th class="sorting">tel_mobile</th>
      <th class="sorting">courriel</th>
      <th class="sorting">date</th>
      <th class="sorting">ip</th>
      <th class="sorting">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($eleves as $key => $eleve): ?>
    <tr>
      <td><input type="checkbox" value="<?php echo $eleve['id']; ?>"></td>
      <td><?php echo $eleve['identifiant']; ?></td>
      <td><?php echo $eleve['nom_fils']; ?></td>
      <td><?php echo $eleve['prenom_fils']; ?></td>
      <td><?php echo $eleve['ddn_fils']; ?></td>
      <td><?php echo $eleve['tel_mobile']; ?></td>
      <td><?php echo $eleve['courriel']; ?></td>
      <td><?php echo $eleve['date']; ?></td>
      <td><?php echo $eleve['ip']; ?></td>
      <td>
      	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModalMod<?php echo $eleve['id']; ?>" aria-label="<?php echo $eleve['id']; ?>">
      	  <span class="glyphicon  glyphicon glyphicon glyphicon-pencil" aria-hidden="true"></span>
      	</button>
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModalDel<?php echo $eleve['id']; ?>" aria-label="<?php echo $eleve['id']; ?>">
      	  <span class="glyphicon  glyphicon glyphicon-trash" aria-hidden="true"></span>
      	</button>
      </td>
    </tr>
    <!-- Modal Modifier-->
    <div class="modal fade" id="myModalMod<?php echo $eleve['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="eleve">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Modifier le eleve <?php echo $eleve['identifiant']; ?></h4>
          </div>
          <div class="modal-body">
            <?php echo $eleve['identifiant']; ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
            <button type="button" class="btn btn-primary">Enregistrer</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Supprimer-->
    <div class="modal fade" id="myModalDel<?php echo $eleve['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="eleve">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Supprimer le eleve <?php echo $eleve['identifiant']; ?></h4>
          </div>
          <div class="modal-body">
            <?php echo $eleve['identifiant']; ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
            <button type="button" class="btn btn-primary">Supprimer</button>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
    </tbody>
</table> 