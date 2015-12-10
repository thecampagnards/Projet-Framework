<!--Alertes pour affichers les resultats des actions-->
<?php if(isset($SUCCESS) && $SUCCESS): ?>
  <div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Mise à jour :</strong> Les promotions ont bien été mise à jour.
  </div>
<?php elseif(isset($SUCCESS) && !$SUCCESS): ?>
  <div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Erreur :</strong> Il y a eu un problème lors de la mise à jour.
  </div>
<?php endif ?>
<div class="alert alert-info" role="alert"><strong>Informations : </strong>le csv doit être sous la forme id_promo;libellé; et la première ligne ne doit pas être vide.</div>
<form class="form-horizontal" action="promotions" method="POST" enctype="multipart/form-data">
  <input type="hidden" name="action" value="csv">
  <label for="InputFichier">Csv à importer</label>
  <input id="InputFichier" name="csv" placeholder="CSV" type="file" class="file-loading" required>
  <br/>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>
<br/>

<div id="buttons-tab">
  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalAdd">Ajouter</button>
  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModalDelAll" id="buttonDelAll" disabled="disabled">Supprimer</button>
<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
     Télécharger les données
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
      <li><a href="pdf/promotions" target="_blank">PDF</a></li>
      <li><a href="csv/promotions" download="promotions.csv">CSV</a></li>
    </ul>
  </div>
</div>
<br/>
<!-- Tableau de données-->
<div class="panel panel-default">
  <div class="panel-heading">
    Tableau des promotions
  </div>
  <div class="panel-body">
    <div class="dataTable_wrapper">
      <table class="table table-striped table-bordered table-hover" id="table_id">
        <thead>
          <tr>
            <th><input type="checkbox" name="select-all" id="select-all" /></th>
            <th class="sorting">Promo</th>
            <th class="sorting">Libelle</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($promotions as $key => $promotion): ?>
          <tr>
            <td><input class="IDDelAll" type="checkbox" value="<?php echo $promotion['id']; ?>"></td>
            <td><?php echo $promotion['id']; ?></td>
            <td class="dispDelAll"><?php echo $promotion['libelle']; ?></td>
            <td>
             <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModalMod<?php echo $promotion['id']; ?>" aria-label="<?php echo $promotion['id']; ?>">
               <span class="glyphicon  glyphicon glyphicon glyphicon-pencil" aria-hidden="true"></span>
             </button>
             <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModalDel<?php echo $promotion['id']; ?>" aria-label="<?php echo $promotion['id']; ?>">
               <span class="glyphicon  glyphicon glyphicon-trash" aria-hidden="true"></span>
             </button>
           </td>
          </tr>
          <!-- Modal Modifier-->
          <div class="modal fade" id="myModalMod<?php echo $promotion['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="promotion">
              <div class="modal-content col-md-12">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Modifier la promotion <?php echo $promotion['id']; ?></h4>
                </div>
                <form class="form-horizontal" action="promotions" method="POST" enctype="multipart/form-data">
                  <div class="modal-body">
                    <input type="hidden" name="id_old" value="<?php echo $promotion['id']; ?>">
                    <input type="hidden" name="action" value="edit">
                    <div class="form-group">
                      <label for="InputPromotion">Promotion<font color="red">*</font></label>
                      <input type="text" class="form-control" id="InputPromotion" placeholder="Promotion" name="id" value="<?php echo $promotion['id']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="InputLibelle">Libelle<font color="red">*</font></label>
                      <input type="text" class="form-control" id="InputLibelle" placeholder="Libelle" name="libelle" value="<?php echo $promotion['libelle']; ?>">
                    </div>
                    <p class="champsoblig">* champs obligatoires</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- Modal Supprimer-->
          <div class="modal fade" id="myModalDel<?php echo $promotion['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="promotion">
              <div class="modal-content col-md-12">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Voulez vous supprimer <?php echo $promotion['libelle']; ?> ?</h4>
                </div>  
                <form class="form-horizontal" action="promotions" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="id" value="<?php echo $promotion['id']; ?>">
                  <input type="hidden" name="action" value="delete">
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                  </div>
                </form>
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
              <h4 class="modal-title" id="myModalLabel">Ajouter une promotion</h4>
            </div>
            <form class="form-horizontal" action="promotions" method="POST" enctype="multipart/form-data">
              <div class="modal-body">
                <input type="hidden" name="action" value="add">
                <div class="form-group">
                  <label for="InputPromotion">Promotion<font color="red">*</font></label>
                  <input type="text" class="form-control" id="InputPromotion" placeholder="Promotion" name="id">
                </div>
                <div class="form-group">
                  <label for="InputLibelle">Libelle<font color="red">*</font></label>
                  <input type="text" class="form-control" id="InputLibelle" placeholder="Libelle" name="libelle">
                </div>
                <p class="champsoblig">* champs obligatoires</p>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary">Ajouter</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Modal Supprimer-->
      <div class="modal fade" id="myModalDelAll" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content col-md-12">
            <div class="modal-header">
              <button type="button" class= "close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Voulez-vous supprimer le(s) promotion(s) suivante(s) ?</h4>
            </div>
            <form class="form-horizontal" action="promotions" method="POST">
              <input type="hidden" name="action" value="deletes">
              <input type="hidden" name="ids">
              <div class="modal-body">
                <ul id="listDelAll">
                </ul>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-danger">Supprimer</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>