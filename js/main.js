$(document).ready( function () {
$('#table_id').dataTable( {
	"aoColumnDefs": [{ 'bSortable': false, 'aTargets': [ 0,5  ] }],
	"order": [[ 1, "asc" ]],
	"fnDrawCallback" : function(settings) {
     	 $("#nb_lignes").html(' /Liste de '+settings.aoData.length+' éléments');
	},
	'iDisplayLength': 10
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