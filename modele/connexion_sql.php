<?php
//connexion à la $bdd
function connexion(){
try {
  $bdd = new PDO('mysql:host=localhost;dbname=espaceMembre', 'root', 'gj7b!17LA');

} catch (Exception $e) {
  die('Erreur :'.$e->getMessage());
}
return $bdd;
}
