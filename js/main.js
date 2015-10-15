$(document).ready( function () {
$('#table_id').dataTable( {
      	"aoColumnDefs": [
          { 'bSortable': false, 'aTargets': [ 0,5  ] }
       ],
	"order": [[ 1, "desc" ]]
});
} );
