<?php
// if(isset($_SESSION['pseudo'])){
//   echo '<form action="../controleur/decoCtrl.php" method="POST">';
//   echo '<input type="submit" value="Se déconnecter">';
//   echo '</form>';
// } else{
//   echo "Connectez-vous";
// }
?>

<div class="container subscribe" id="subscribe">
  <h1 class="text-center">Connexion</h1>
    <form class="" action="../controleur/connexionCtrl.php" method="post">
      <h3>Entrez votre pseudo :</h3>
      <input type="text" name="pseudo" value="" placeholder="pseudo" required="required"><br>
      <h3>Entrez votre mot de passe :</h3>
      <input type="password" name="password" value="" placeholder="password" required="required"><br>
      <input type="submit" name="" value="Se connecter">
    </form>
  </div>
  </body>
</html>
