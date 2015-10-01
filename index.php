<?php
require_once 'lib/limonade.php';

dispatch('/documents', function(){
	return html('documents.html.php');
});

dispatch('/eleves', function(){
	return html('eleves.html.php');
});
run();
?>
