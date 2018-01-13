<?php
    session_start();

    if (isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo'])) {
        header('Location: index.php');
        exit();
    }
    $css_file = "signup_login.css";
    include('partial/head.php');
    include('partial/header.php');
?>
<body>
    <div class="container">
        <div class="log-box">
        <h1>Inscription</h1>
        <form action="signup_check.php" method="post">
            <input type="text" name="nom" placeholder="Prenom" class="">
            <input type="text" name="prenom" placeholder="Nom" class="">
            <input type="email" name="mail" placeholder="E-mail" class="">
            <input type="password" name="passwd1" placeholder="Mot de passe" class="">
            <input type="password" name="passwd2" placeholder="Vérification du mot de passe" class="">
            <button type="submit" class="btn btn-default" value="send">S'inscrire</button>
            <!-- <input type="hidden" name="from" value="register"> -->
            <!-- <input type="hidden" name="success" value="login"> -->
            <p>Tu es déjà inscrit ? <a href="login.php">Connecte toi</a></p>
        </form>
    </div>
    </div>
    <?php include('partial/footer.php'); ?>
</body>
</html>

<?php
  if ($_SESSION['flag_champs'] == "KO")
  {
    echo "<p id='error'>Erreur : vous devez remplir tous les champs\n</p>";
    $_SESSION['flag_champs'] = NULL;
  }
  else if ($_SESSION['flag_mail'] == "KO")
  {
      echo "<p id='error'>Erreur : un compte existe déjà avec cette adresse mail\n</p>";
    $_SESSION['flag_mail'] = NULL;
  }
  else if ($_SESSION['flag_passwd'] == "KO")
  {
      echo "<p id='error'>Erreur : veuillez recopier votre mot de passe a l'identique\n</p>";
    $_SESSION['flag_passwd'] = NULL;
  }
  else if ($_SESSION['flag_user_created'] == "OK")
    {
      echo "<div id='inscription-ok'>Inscription terminée !<br/><br/><a href='connexion/connexion.php'>Connectez-Vous! :)</a></div>";
      $_SESSION['flag_user_created'] = NULL;
    }

?>
