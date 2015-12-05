$(document).ready( function () {
  $('#table_id').dataTable( {
   "aoColumnDefs": [{ 'bSortable': false, 'aTargets': [ 0, $('#table_id thead tr th').length-1 ] }],
   "order": [[ 1, "asc" ]],
   'iDisplayLength': 50
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
      values.push($(this).closest("td input[name='id']").val());
    });
  $('#listDelAll').html('');
  $('input[name=ids]').val(values);
  $.each(values, function(index, value){
    if(value !== undefined)
      $('#listDelAll').append("<li>"+value+"</li>");
  });
});   


$(".file").fileinput({
  allowedFileExtensions : ['pdf', 'doc', 'odf','docx'],
  initialPreview: [
    //"<img src='"+ $(this).val() +"' class='file-preview-image' />",
    ],
    initialCaption: [
    //console.log($(this).val()),
    ],
    maxFileSize: 10000,
    required: true,
    showRemove: false,
    showUpload: false,
    maxFileCount: 1
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
  $("#file").fileinput({
    allowedFileExtensions : ['csv'],
    language: 'fr',
    maxFileSize: 10000,
    required: true,
    showRemove: false,
    showUpload: false,
    maxFileCount: 1
  });
});

$( "#downloadcsv" ).click(function() {
  window.location = 'routes.ods';
});