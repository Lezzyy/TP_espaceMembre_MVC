<?php
if (isset($pseudo) and isset($pass) and isset($mail)==1) {
  $pseudo = $_POST['pseudo'];
  $password = $_POST['password'];
  $pass= sha1($password);
  $mail = $_POST('mail');
  $comparePseudo=compare_pseudo($pseudo);

    $pseudo=htmlspecialchars($pseudo);
    $pass=htmlspecialchars($pass);
    $mail = htmlspecialchars($mail);

    if (!empty($pseudo) and !empty($pass) and ($mail)) {
      $pseudo=strtolower($pseudo);

        if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail) OR $pseudo == $comparePseudo['pseudo']) {
            if($pseudo==compare_pseudo($pseudo)){
              var_dump(compare_pseudo($pseudo));
              $_SESSION['erreur']["pseudo"]="erreur";
              echo "Ce pseudo n'est pas disponible, veuillez en choisir un autre";
            // get_infos($_POST);
            // header('Location:connexionCtrl.php');
          }
            if(!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail)) {
              $_SESSION['erreur']["mail"]="erreur";
              echo "Veuillez entrer une adresse mail valide";
            }
        } else {
          get_infos($pseudo, $pass, $mail);
          include('connexionCtrl.php');
        }
    }
}
?>
