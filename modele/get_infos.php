<?php
include('../modele/connexion_sql.php');

function get_infos($membres){
  $bdd= connexion();
  $req=$bdd->prepare('INSERT INTO membres (pseudo, pass, email, date_inscription) VALUES (:pseudo, :pass, :email, CURDATE())');
$pseudo=$membres['pseudo'];
$password=$membres['password'];
$pass=sha1($password);
$mail=$membres['mail'];

  $req->execute(array(
    'pseudo'=>$pseudo,
    'pass'=>$pass,
    'email'=>$mail
  ));
}

function show_infos($membres){
  $bdd = connexion();
$donnees = $bdd->query('SELECT pseudo from membres')
$donnees = $req->fetch();
return $donnees;
}


 ?>
