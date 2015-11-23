<?php

//fonction pour se connecter à la base de donnée
function connectDB() {
  $bdd = new PDO('mysql:host='.SQL_HOST.';dbname='.SQL_DATABASE, SQL_USER, SQL_PASS);
  $bdd->exec('SET NAMES utf8');
  return $bdd;
}