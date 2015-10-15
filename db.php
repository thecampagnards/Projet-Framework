<?php

try

{

    $bdd = new PDO('mysql:host=localhost;dbname=projet_limonade;charset=utf8', 'root', 's3curit3');

}

catch (Exception $e)

{

        die('Erreur : ' . $e->getMessage());

}

?>
