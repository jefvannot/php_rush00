<?php
    session_start();

    $css_file = "signup_login.css";
    include('partial/head.php');
    include('partial/header.php');
?>
<body>
    <div class="container">
        <div class="log-box">

<?php
  if ($_SESSION['flag_empty_fields'] == "ON")
  {
      echo "<div class='error-login'><p>Veuillez remplir tous les champs çi-dessous\n</p></div>";
    $_SESSION['flag_empty_fields'] = NULL;
  }
  if ($_SESSION['flag_bad_passwd'] == "ON")
  {
      echo "<div class='error-login'><p>Votre mot de passe actuel n'est pas le bon</p></div>";
      $_SESSION['flag_bad_passwd'] = NULL;
  }
  if ($_SESSION['flag_cmp_passwd'] == "KO")
  {
      echo "<div class='error-login'><p>Les deux nouveaux mots de passe ne correspondent pas\n</p></div>";
    $_SESSION['flag_cmp_passwd'] = NULL;
  }
?>
        <h1>Mon mot se passe</h1>
        <form action="users.php" method="post">
            <h4>Mot de passe actuel</h4>
            <input type="password" name="oldpwd" class="<?php echo isset($_GET['oldpwd']) ? 'error' : '' ; ?>">
            <h4>Nouveau mot de passe</h4>
            <input type="password" name="newpwd1" class="<?php echo isset($_GET['newpwd1']) ? 'error' : '' ; ?>">
            <h4>Vérification du nouveau mot de passe</h4>
            <input type="password" name="newpwd2" class="<?php echo isset($_GET['newpwd2']) ? 'error' : '' ; ?>">
            <button type="submit" class="btn btn-default" value="send">Modifier mon mot de passe</button>
            <!-- <input type="submit" name = "submit" value="Envoyer" /> -->
            <input type="hidden" name="action" value="passwd_update">
            <!-- <input type="hidden" name="success" value="login"> -->
        </form>
    </div>
    </div>
    <?php include('partial/footer.php'); ?>
</body>
</html>

