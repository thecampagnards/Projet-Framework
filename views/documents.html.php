<!--Alertes pour affichers les resultats des actions-->
<?php if(isset($SUCCESS) && $SUCCESS): ?>
  <div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Mise à jour :</strong> Les documents ont bien été mise à jour.
  </div>
<?php elseif(isset($SUCCESS) && !$SUCCESS): ?>
  <div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Erreur :</strong> Il y a eu un problème lors de la mise à jour.
  </div>
<?php endif ?>
<div class="alert alert-info" role="alert"><strong>Informations : </strong>le csv doit être</div>
<form class="form-horizontal" action="documents" method="POST" enctype="multipart/form-data">
  <input type="hidden" name="action" value="csv">
  <label for="InputFichier">Csv à importer</label>
  <input id="InputFichier"  name="csv" placeholder="CSV" type="file" class="file" required>
  <br/>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>

<div id="buttons-tab">
	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalAdd">Ajouter</button>
	<button type="button" class="btn btn-danger">Supprimer</button>
</div>
<br/>

<!-- Tableau de données-->
<div class="panel panel-default">
  <div class="panel-heading">
    Table de données
  </div>
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
                 <form class="form-horizontal" action="documents" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="id" value="<?php echo $document['id']; ?>">
                  <input type="hidden" name="action" value="edit">
                  <div class="form-group">
                    <label for="InputRang">Rang</label>
                    <input type="number" class="form-control" id="InputRang" placeholder="Rang" name="rang" value="<?php echo $document['rang']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="InputPromotion">Promotion</label>
                    <input type="text" class="form-control" id="InputPromotion" placeholder="Promotion" name="promo" value="<?php echo $document['promo']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="InputLibelle">Libelle</label>
                    <input type="text" class="form-control" id="InputLibelle" placeholder="Libelle" name="libelle" value="<?php echo $document['libelle']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="InputFichier">Fichier</label>
                    <input id="InputFichier"  name="fichier" placeholder="Fichier" type="file" class="file form-control" value="<?php echo $document['fichier']; ?>">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                  </div>
                </form>
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
                Voulez vous supprimer <?php echo $document['libelle']; ?> ?
                <form class="form-horizontal" action="documents" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="id" value="<?php echo $document['id']; ?>">
                  <input type="hidden" name="action" value="delete">
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Supprimer</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </tbody>
  </table> 
  <!-- Modal ajouter-->
  <div class="modal fade" id="myModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content col-md-12">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Supprimer le document <?php echo $document['libelle']; ?></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="documents" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="action" value="add">
            <div class="form-group">
              <label for="InputRang">Rang</label>
              <input type="text" class="form-control" id="InputRang" placeholder="Rang" name="rang">
            </div>
            <div class="form-group">
              <label for="InputPromotion">Promotion</label>
              <input type="text" class="form-control" id="InputPromotion" placeholder="Promotion" name="promo">
            </div>
            <div class="form-group">
              <label for="InputLibelle">Libelle</label>
              <input type="text" class="form-control" id="InputLibelle" placeholder="Libelle" name="libelle">
            </div>
            <div class="form-group">
              <label for="InputFichier">Fichier</label>
              <input id="InputFichier"  name="fichier" placeholder="Fichier" type="file" class="file form-control">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
              <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>                            
</div>
</div>