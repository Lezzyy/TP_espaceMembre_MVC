<?php
require('../modele/data.php');
include('../vue/template/headerVue.php');
include('../vue/indexVue.php');
include('../vue/template/footer.php');

if (isset($_POST['pseudo']) AND isset($_POST['password']) AND isset($_POST['mail'])){

//we securise the data enter by the user

  $_POST['pseudo']=htmlspecialchars($_POST['pseudo']);
  $_POST['password']=htmlspecialchars($_POST['password']);
  $pseudo = strtolower($_POST['pseudo']);
  $password = sha1($_POST['password']);
  $mail = htmlspecialchars($_POST['mail']);
  $comparePseudo=compare_pseudo($pseudo);

// we verify that the input aren't empty

  if(!empty($pseudo) OR !empty($mail)){

//we check if the pseudo are already used and we check if the email adress is ok

    if($pseudo==$comparePseudo['pseudo'] OR !preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail)) {

// if the pseudo is already used -> error message
      if($pseudo==$comparePseudo['pseudo']){

        ?>

        <div class="container text-center">
          <p>Votre pseudo est déjà utilisé, veuillez changer</p><br>
        </div>

<?php
// if the email adress isn't ok -> error message

    }
      if(!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail)){
?>
        <div class="container text-center">
          <p>Veuillez entrer une adresse mail valide</p><br>
        </div>

<?php
    }
}
//if all the info are ok -> insertion into date base and redirection to the connexion page

  else{
    get_infos($pseudo, $password, $mail);
    header("Location: connexionCtrl.php");
    }
  }
}
?>
