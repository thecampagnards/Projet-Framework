$(document).ready( function () {
  $('#table_id').dataTable( {
   "aoColumnDefs": [{ 'bSortable': false, 'aTargets': [ 0, $('#table_id thead tr th').length-1 ] }],
   "order": [[ 1, "asc" ]],
   "iDisplayLength": 50,
   "language": {
    "sProcessing":     "Traitement en cours...",
    "sSearch":         "Rechercher&nbsp;:",
    "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
    "sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
    "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
    "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
    "sInfoPostFix":    "",
    "sLoadingRecords": "Chargement en cours...",
    "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
    "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
    "oPaginate": {
      "sFirst":      "Premier",
      "sPrevious":   "Pr&eacute;c&eacute;dent",
      "sNext":       "Suivant",
      "sLast":       "Dernier"
    },
    "oAria": {
      "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
      "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
    }
  }
});

// Listen for click on toggle checkbox
$('#select-all').click(function(event) {   
  if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
          this.checked = true;                        
        });
      }
      else {
       $(':checkbox').each(function() {
        this.checked = false;
      });
     }
   });	
});

//fonction liste item supp
$('#buttonDelAll').click(function(event) {
  var values=[];   
  $(':checkbox').each(function() {
    if(this.checked)
      values.push($(this).parent().parent().find(".dispDelAll").html());
  });
  $('#listDelAll').html('');
  $('input[name=ids]').val(values);
  $.each(values, function(index, value){
    if(value !== undefined)
      $('#listDelAll').append("<li>"+value+"</li>");
  });
}); 

$(':checkbox').click(function() {
  $('#buttonDelAll').attr('disabled','disabled');
  $(':checkbox').each(function() {
    if(this.checked) $('#buttonDelAll').removeAttr('disabled'); 
  });
});

$(document).on('ready', function() {
  $("#InputFichier").fileinput({
    allowedFileExtensions : ['csv'],
    language: 'fr',
    maxFileSize: 10000,
    required: true,
    showRemove: false,
    showUpload: false,
    maxFileCount: 1
  });
});

$(document).on('ready', function() {
  $("input[type='file']").fileinput({
    allowedFileExtensions : ['pdf', 'doc', 'docx'],
    language: 'fr',
    maxFileSize: 10000,
    showRemove: false,
    showUpload: false,
    maxFileCount: 1
  });
});

$(document).on('ready', function() {
  $("#file-add").fileinput({
    allowedFileExtensions : ['pdf', 'doc', 'docx'],
    language: 'fr',
    maxFileSize: 10000,
    required: true,
    showRemove: false,
    showUpload: false,
    maxFileCount: 1
  });
});

//requete http pour avoir le nombre de fichier d'une promo pour le rang
$('select[name="promo"]').change(function() {

  var rang = $(this).parent().parent();
  rang.find('div select[name="rang"]').html('');

  var value_rang = rang.find('div span').attr('rang');
  var value_promo = rang.find('div span').attr('promo');

  var promo = $(this);
  if($(this).val() === '' ) $(this).val("all");
  console.log($(this).val());

  $.get( "./documents/count/"+$(this).val(), function(data, status){
    if(promo.val() !== value_promo) data ++;
    for (var i = 1; i <= data; i++) {
      rang.find('div select[name="rang"]').append('<option value="'+i+'">'+i+'</option>');
    };
  });
});