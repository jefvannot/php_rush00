<?php
    session_start();

    if (isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo'])) {
        header('Location: index.php');
        exit();
    }
    $css_file = "signup_login.css";
    include('partial/head.php');
?>
<body>
    <div class="container">
        <h1>Inscription</h1>
        <form action="controller/people.php" method="POST">
            <input type="text" name="firstname" placeholder="Prenom" class="<?php echo isset($_GET['firstname']) ? 'error' : '' ; ?>">
            <input type="text" name="lastname" placeholder="Nom" class="<?php echo isset($_GET['lastname']) ? 'error' : '' ; ?>">
            <input type="password" name="password" placeholder="Mot de passe" class="<?php echo isset($_GET['password']) ? 'error' : '' ; ?>">
            <input type="password" name="password2" placeholder="Vérification du mot de passe" class="<?php echo isset($_GET['password']) ? 'error' : '' ; ?>">
            <input type="email" name="email" placeholder="E-mail" class="<?php echo isset($_GET['email']) ? 'error' : '' ; ?>">
            <button type="submit" class="btn btn-default">S'inscrire</button>
            <input type="hidden" name="from" value="register">
            <input type="hidden" name="success" value="login">
            <p>Tu es déjà inscrit ? <a href="login.php">Connecte toi</a></p>
        </form>
    </div>
</body>
</html>