<?php echo "<h1>$title</h1>";?> 

<div id="ban">
	<div class="alert alert-success" role="alert">...</div>
	<div class="alert alert-warning" role="alert">...</div>
	<div class="alert alert-danger" role="alert">...</div>
</div>

<div id="buttons-tab">
	<button type="button" class="btn btn-success">Ajouter</button>
	<button type="button" class="btn btn-danger">Supprimer</button>
</div>

<table class="table table-striped table-hover">
  <tr>
    <th>#</th>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Points</th>
    <th></th>
  </tr>
  <tr>
  <td><input type="checkbox" id="inlineCheckbox1" value="option1"></td>
    <td>Jill</td>
    <td>Smith</td>
    <td>50</td>
    <td>
	<button type="button" class="btn btn-default" aria-label="Left Align">
	  <span class="glyphicon  glyphicon glyphicon glyphicon-pencil" aria-hidden="true"></span>
	</button>
        <button type="button" class="btn btn-default" aria-label="Left Align">
	  <span class="glyphicon  glyphicon glyphicon-trash" aria-hidden="true"></span>
	</button>
    </td>
  </tr>
  <tr>
  <td><input type="checkbox" id="inlineCheckbox1" value="option1"></td>
    <td>Eve</td>
    <td>Jackson</td>
    <td>94</td>
    <td>
	<button type="button" class="btn btn-default" aria-label="Left Align">
	  <span class="glyphicon  glyphicon glyphicon glyphicon-pencil" aria-hidden="true"></span>
	</button>
        <button type="button" class="btn btn-default" aria-label="Left Align">
	  <span class="glyphicon  glyphicon glyphicon-trash" aria-hidden="true"></span>
	</button>
    </td>
  </tr>
</table> 
