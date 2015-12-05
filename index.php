<?php
//ajout de limonade
require('lib/limonade.php');
//ajout des defines
require('inc/config.inc.php');
//ajout des fonctions de base
require('modeles/index.php');


dispatch('/documents', documents_controller);
dispatch_post('/documents', documents_controller);
dispatch('/eleves', eleves_controller);
dispatch_post('/eleves', eleves_controller);
dispatch('/promotions', promotions_controller);
dispatch_post('/promotions', promotions_controller);
dispatch('/', index_controller);
dispatch('/parametres', parametres_controller);

run();
?>