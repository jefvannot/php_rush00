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
       <?php
        if ($_SESSION['flag_log'] == "KO")
            {
                echo "<div class='error-login'>";
                echo "<p>Votre e-mail ou votre mot de passe n'est pas bon</p>";
                $_SESSION['flag_log'] = "";
                echo "</div>";
            }
       ?> 
        <h1>Connexion</h1>
        <form action="users.php" method="post">
            <input type="email" name="mail" placeholder="E-mail" class="" value="">
            <input type="password" name="passwd" placeholder="Mot de passe" class="">
            <button type="submit" class="btn btn-default">Connection</button>
            <input type="hidden" name="from" value="login">
            <!-- <input type="hidden" name="success" value="index"> -->
            <p>Tu n'es pas encore inscrit ? <a href="signup.php">Inscris toi</a></p>
        </form>
    </div>
    
    </div>
    <?php include('partial/footer.php'); ?>
</body>
</html>