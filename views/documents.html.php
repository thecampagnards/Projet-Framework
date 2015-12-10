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
<div class="alert alert-info" role="alert"><strong>Informations : </strong>le csv doit être sous la forme rang;promo;libelle;fichier; et la première ligne ne doit pas être vide. Puis ajouter le fichier manuellement dans le dossier des documents.</div>
<form class="form-horizontal" action="documents" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="action" value="csv">
	<label for="InputFichier">Csv à importer</label>
	<input id="InputFichier" name="csv" placeholder="CSV" type="file" class="file-loading" required>
	<br/>
	<button type="submit" class="btn btn-primary">Enregistrer</button>
</form>
<br/>
<label>Actions</label>
<div id="buttons-tab">
	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalAdd">Ajouter</button>
	<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModalDelAll" id="buttonDelAll" disabled="disabled">Supprimer</button>
	<div class="dropdown">
		<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			Télécharger les données
			<span class="caret"></span>
		</button>
		<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
			<li><a href="pdf/documents" target="_blank">PDF</a></li>
			<li><a href="csv/documents" download="documents.csv">CSV</a></li>
		</ul>
	</div>
</div>
<br/>

<!-- Tableau de données-->
<div class="panel panel-default">
	<div class="panel-heading">
		Tableau des documents
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
							<td><input class="IDDelAll" type="checkbox" value="<?php echo $document['id']; ?>"></td>
							<td><?php echo $document['rang']; ?></td>
							<td><?php echo $document['promo']; ?></td>
							<td><?php echo $document['libelle']; ?></td>
							<td class="dispDelAll"><a target="_blank" href="<?php echo FILES_DIR.$document['fichier']; ?>"><?php echo $document['fichier']; ?></a></td>
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
								<div class="modal-content col-md-12">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel">Modifier le document <?php echo $document['libelle']; ?></h4>
									</div>
									<form class="form-horizontal" action="documents" method="POST" enctype="multipart/form-data">
										<div class="modal-body">									
											<input type="hidden" name="id" value="<?php echo $document['id']; ?>">
											<input type="hidden" name="action" value="edit">
											<div class="form-group">
												<label>Promotion</label>
												<input type="text" class="form-control" placeholder="Promotion" name="promo" value="<?php echo $document['promo'] ?>" disabled>
											</div>
											<div class="form-group">
												<label>Libelle<font color="red">*</font></label>
												<input type="text" class="form-control" placeholder="Libelle" name="libelle" value="<?php echo $document['libelle']; ?>" required>
											</div>
											<div class="form-group">
												<label>Rang<font color="red">*</font></label>
												<span promo="<?php echo $document['promo']; ?>" rang="<?php echo $document['rang']; ?>"></span>
												<select class="form-control" name="rang">
												</select>
											</div>
											<div class="form-group">
												<label>Fichier</label>
												<input name="fichier" placeholder="Fichier" type="file" class="file-loading">
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
						<div class="modal fade" id="myModalDel<?php echo $document['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content col-md-12">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel">Voulez-vous supprimer le document <?php echo $document['libelle']; ?></h4>
									</div>
									<form class="form-horizontal" action="documents" method="POST" enctype="multipart/form-data">
										<input type="hidden" name="id" value="<?php echo $document['id']; ?>">
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
		</div>
	</div>
	<!-- Modal ajouter-->
	<div class="modal fade" id="myModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content col-md-12">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Ajouter un nouveau document</h4>
				</div>
				<form class="form-horizontal" action="documents" method="POST" enctype="multipart/form-data">
					<div class="modal-body">					
						<input type="hidden" name="action" value="add">
						<div class="form-group">
							<label>Promotion<font color="red">*</font></label>
							<select class="form-control" name="promo">
								<option value= "">Toutes les promotions</option>
								<?php foreach ($promotions as $key => $promotion): ?>
									<option value="<?php echo $promotion['id'] ?>" ><?php echo $promotion['libelle'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label>Libelle<font color="red">*</font></label>
							<input type="text" class="form-control" placeholder="Libelle" name="libelle" required>
						</div>
						<div class="form-group">
							<label>Rang<font color="red">*</font></label>
							<select class="form-control" name="rang">
							</select>
						</div>
						<div class="form-group">
							<label>Fichier<font color="red">*</font></label>
							<input id="file-add" name="fichier" placeholder="Fichier" type="file" class="file-loading" required>
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
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Voulez-vous supprimer le(s) document(s) suivant(s) ?</h4>
				</div>
				<form class="form-horizontal" action="documents" method="POST">
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