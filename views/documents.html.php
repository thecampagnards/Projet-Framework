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
<div class="panel-body">
  <div class="dataTable_wrapper">
    <table class="table table-striped table-bordered table-hover" id="table_id">
      <thead>
        <tr>
          <th><input type="checkbox" name="select-all" id="select-all" /></th>
          <th class="sorting">Rang</th>
          <th class="sorting">Promo</th>
          <th class="sorting">Libelle</th>
          <th class="sorting">Fichier</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($documents as $key => $document): ?>
          <tr>
            <td><input type="checkbox" value="<?php echo $document['id']; ?>"></td>
            <td><?php echo $document['rang']; ?></td>
            <td><?php echo $document['promo']; ?></td>
            <td><?php echo $document['libelle']; ?></td>
            <td><?php echo $document['fichier']; ?></td>
            <td>
             <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModalMod<?php echo $document['id']; ?>" aria-label="<?php echo $document['id']; ?>">
               <span class="glyphicon  glyphicon glyphicon glyphicon-pencil" aria-hidden="true"></span>
             </button>
             <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModalDel<?php echo $document['id']; ?>" aria-label="<?php echo $document['id']; ?>">
               <span class="glyphicon  glyphicon glyphicon-trash" aria-hidden="true"></span>
             </button>
           </td>
         </tr>
         <!-- Modal Modifier-->
         <div class="modal fade" id="myModalMod<?php echo $document['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modifier le document <?php echo $document['libelle']; ?></h4>
              </div>
              <div class="modal-body">
                <?php echo $document['libelle']; ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-primary">Enregistrer</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal Supprimer-->
        <div class="modal fade" id="myModalDel<?php echo $document['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Supprimer le document <?php echo $document['libelle']; ?></h4>
              </div>
              <div class="modal-body">
                <?php echo $document['libelle']; ?>
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
</div>                            
</div>

