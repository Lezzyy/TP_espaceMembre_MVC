<?php
require('../modele/get_infos.php');
include('../vue/index.php');

if(isset($_POST['pseudo']) AND isset($_POST['password']) AND isset($_POST['mail'])==1){
  $_POST['pseudo']=htmlspecialchars($_POST['pseudo']);
  $_POST['password']=htmlspecialchars($_POST['password']);
  $_POST['mail'] = htmlspecialchars($_POST['mail']);
  if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail'])){
    get_infos($_POST);
  }else {
    echo 'veuillez entrer une adresse mail valide';
  }
}




 ?>
