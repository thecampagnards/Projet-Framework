
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-bar-chart-o fa-fw"></i> Elèves inscrit

			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div id="elevesanalytique"></div>
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel .chat-panel -->
	</div>
	<!-- /.col-lg-4 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-6 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-file-text-o fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?php echo $nb_documents ?></div>
						<div>Documents!</div>
					</div>
				</div>
			</div>
			<a href="documents">
				<div class="panel-footer">
					<span class="pull-left">Voir les détails</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-6 col-md-6">
		<div class="panel panel-green">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-graduation-cap fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?php echo $nb_eleves ?></div>
						<div>Elèves!</div>
					</div>
				</div>
			</div>
			<a href="eleves">
				<div class="panel-footer">
					<span class="pull-left">Voir les détails</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
</div>

<script type="text/javascript" charset="utf-8">
$(function() {

//traitement des données qui va permettre d'afficher 0 visiteurs quand il n'y a pas de données
var result = [];
var previous = null;
var data = <?php echo(json_encode($graph_eleves)) ?>;
for (var i in data) {
  var item = data[i];
  if (previous != null){
    var donnees = new Date(item.date_analytique);
    for (var day = previous.getDate() + 1; day < donnees.getDate() ; day++){
      var date = previous;
      date.setDate(date.getDate() + 1);
      result.push({day: (date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + (date.getDate())) , value: 0 });
    }
  }
  result.push({day: item.date_analytique, value: item.value });
  previous = new Date(item.date_analytique);
}

//chargement du graphique
new Morris.Line({
  element: 'elevesanalytique',
  data: result,
  xkey: 'day',
  ykeys: ['value'],
  labels: ['Elève(s)']
});
});
</script>