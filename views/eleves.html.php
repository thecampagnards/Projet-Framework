<!--Alertes pour affichers les resultats des actions-->
<?php if(isset($SUCCESS) && $SUCCESS): ?>
  <div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Mise à jour :</strong> Les élèves ont bien été mise à jour.
  </div>
<?php elseif(isset($SUCCESS) && !$SUCCESS): ?>
  <div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Erreur :</strong> Il y a eu un problème lors de la mise à jour.
  </div>
<?php endif ?>

<div id="buttons-tab">
	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalAdd">Ajouter</button>
	<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModalDelAll" id="buttonDelAll" disabled="disabled">Supprimer</button>
	<div class="dropdown">
	  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
	   Télécharger les données
	    <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
	    <li><a href="pdf/eleves" target="_blank">PDF</a></li>
	    <li><a href="csv/eleves" download="eleves.csv">CSV</a></li>
	  </ul>
	</div>
</div>
<br/>
<!-- Tableau de données-->
<div class="panel panel-default">
  <div class="panel-heading">
    Tableau des élèves
  </div>
  <div class="panel-body">
    <div class="dataTable_wrapper">
			<table id="table_id" class="table table-striped table-hover display table-bordered">
				<thead>
					<tr>
						<th><input type="checkbox" name="select-all" id="select-all" /></th>
						<th class="sorting">Identifiant</th>
						<th class="sorting">Nom</th>
						<th class="sorting">Prenom</th>
						<th class="sorting">Date de naissance</th>
						<th class="sorting">Téléphone</th>
						<th class="sorting">Mail</th>
						<th class="sorting">Date inscription</th>
						<th class="sorting">Adresse Ip</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($eleves as $key => $eleve): ?>
					<tr>
						<td><input type="checkbox" value="<?php echo $eleve['id']; ?>" name="id"></td>
						<td><?php echo $eleve['identifiant']; ?> </td>
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
							<div class="modal-content col-md-12">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Modifier le eleve <?php echo $eleve['identifiant']; ?></h4>
								</div>
								<form class="form-horizontal" action="eleves" method="POST">
									<div class="modal-body">
										<input type="hidden" name="id" value="<?php echo $eleve['id']; ?>">
										<input type="hidden" name="action" value="edit">
										<div class="form-group">
											<label for="InputRang">Identifiant ENT<font color="red">*</font></label>
											<input type="text" class="form-control" id="InputRang" placeholder="Identifiant" name="identifiant" value="<?php echo $eleve['identifiant']; ?>">
										</div>
										<div class="form-group">
											<label for="InputRang">Nom<font color="red">*</font></label>
											<input type="text" class="form-control" id="InputRang" placeholder="Nom" name="nom_fils" value="<?php echo $eleve['nom_fils']; ?>">
										</div>
										<div class="form-group">
											<label for="InputRang">Prénom<font color="red">*</font></label>
											<input type="text" class="form-control" id="InputRang" placeholder="Prénom" name="prenom_fils" value="<?php echo $eleve['prenom_fils']; ?>">
										</div>
										<div class="form-group">
											<label for="InputRang">Date de naissance<font color="red">*</font></label>
											<input type="date" class="form-control" id="InputRang" placeholder="Date de naissance" name="ddn_fils" value="">
										</div>
										<div class="form-group">
											<label for="InputRang">Téléphone<font color="red">*</font></label>
											<input type="tel" class="form-control" id="InputRang" placeholder="Téléphone mobile" name="tel_mobile" value="<?php echo $eleve['tel_mobile']; ?>">
										</div>
										<div class="form-group">
											<label for="InputRang">Mail<font color="red">*</font></label>
											<input type="email" class="form-control" id="InputRang" placeholder="Adresse mail" name="courriel" value="<?php echo $eleve['courriel']; ?>">
										</div>
										<p class="champsoblig">* champs obligatoire</p>
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
					<div class="modal fade" id="myModalDel<?php echo $eleve['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="eleve">
							<div class="modal-content col-md-12">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Voulez vous supprimer l'élève <?php echo $eleve['prenom_fils'].' '.$eleve['nom_fils']; ?> ?</h4>
								</div>
								<form class="form-horizontal" action="eleves" method="POST">
									<input type="hidden" name="action" value="delete">
									<input type="hidden" name="id" value="<?php echo $eleve['id']; ?>">
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
							<h4 class="modal-title" id="myModalLabel">Ajouter un élève</h4>
						</div>
						<form class="form-horizontal" action="eleves" method="POST">
							<div class="modal-body">

								<input type="hidden" name="action" value="add">
								<div class="form-group">
									<label for="InputRang">Identifiant ENT<font color="red">*</font></label>
									<input type="text" class="form-control" id="InputRang" placeholder="Identifiant" name="identifiant">
								</div>
								<div class="form-group">
									<label for="InputRang">Nom<font color="red">*</font></label>
									<input type="text" class="form-control" id="InputRang" placeholder="Nom" name="nom_fils">
								</div>
								<div class="form-group">
									<label for="InputRang">Prénom<font color="red">*</font></label>
									<input type="text" class="form-control" id="InputRang" placeholder="Prénom" name="prenom_fils">
								</div>
								<div class="form-group">
									<label for="InputRang">Date de naissance<font color="red">*</font></label>
									<input type="date" class="form-control" id="InputRang" placeholder="Date de naissance" name="ddn_fils">
								</div>
								<div class="form-group">
									<label for="InputRang">Téléphone<font color="red">*</font></label>
									<input type="tel" class="form-control" id="InputRang" placeholder="Téléphone mobile" name="tel_mobile">
								</div>
								<div class="form-group">
									<label for="InputRang">Mail<font color="red">*</font></label>
									<input type="email" class="form-control" id="InputRang" placeholder="Adresse mail" name="courriel">
								</div>
								<p class="champsoblig">* champs obligatoire</p>
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
              <h4 class="modal-title" id="myModalLabel">Voulez-vous supprimer le(s) élèves(s) suivant(s) ?</h4>
            </div>
            <form class="form-horizontal" action="eleves" method="POST">
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