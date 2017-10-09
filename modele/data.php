<?php
include('../modele/connexion_sql.php');

//we collect the info enter by the user and insert into database

function get_infos($pseudo, $pass, $mail){
  $bdd= connexion();
  $req=$bdd->prepare('INSERT INTO membres (pseudo, pass, email, date_inscription) VALUES (:pseudo, :pass, :email, CURDATE())');

  $req->execute(array(
    'pseudo'=>$pseudo,
    'pass'=>$pass,
    'email'=>$mail
  ));
}

//we compare the info enter by the user to see if the same info already exist

function compare_pseudo($pseudo){
  $bdd=connexion();
  $req=$bdd->prepare('SELECT pseudo FROM membres WHERE pseudo=:pseudo');
  $req->execute(array(
    'pseudo'=>$pseudo
  ));
  return $req->fetch();
}

//we compare pseudo and password to check if the user is already register

function compare_pseudo_pass($pseudo, $password){
  $bdd=connexion();
  $req=$bdd->prepare('SELECT pseudo, pass FROM membres WHERE pseudo=:pseudo and pass=:pass');
  $req->execute(array(
    'pseudo'=>$pseudo,
    'pass'=>$password
  ));
  return $req->fetch();
}



 ?>
