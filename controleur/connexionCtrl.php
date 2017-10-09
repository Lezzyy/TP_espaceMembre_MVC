<?php
include_once('../modele/data.php');
include('../vue/template/headerVue.php');
include('../vue/connexionVue.php');

if(isset($_POST['pseudo']) AND isset($_POST['password'])){

// we securised all the info enter by the user

  $pseudo=htmlspecialchars($_POST['pseudo']);
  $pass=htmlspecialchars($_POST['password']);
  $pseudo=strtolower($pseudo);
  $password=sha1($pass);

  $checkIdentify=compare_pseudo_pass($pseudo, $password);

//we verify that the inputs aren't empty

  if(!empty($pseudo) AND !empty($password)){

//we check if the pseudo and password already exist in database and connect the user if it's ok

    if($pseudo==$checkIdentify['pseudo'] AND $password==$checkIdentify['pass']){
      session_start();
      $_SESSION['pseudo']=ucfirst($pseudo);
?>

<div class="container text-center">
  <p>Vous êtes connecté</p><br>
  <p>Bienvenue <?php echo $_SESSION['pseudo']; ?></p>
</div>
<?php
    }

//if the pseudo and password doesn't exist in database -> error message

    else{

?>
<div class="container text-center">
  <p>Mauvais identifiant, veuillez réessayer</p><br>
  <p>ou vous enregistrer</p>
  <form class="" action="indexCtrl.php" method="post">
    <input type="submit" name="" value="Sign in">
  </form>
</div>
<?php
    }
  }
}
?>
