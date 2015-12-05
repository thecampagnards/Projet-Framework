<?php

function index_controller(){
	set("title", "Acceuil");
	set("subtitle", "");
	set("nb_documents", count(getDocuments()));
	set("nb_eleves", count(getEleves()));
	set("graph_eleves", getGraphEleves());
	return html('index.html.php','layout/default_layout.html.php');
}