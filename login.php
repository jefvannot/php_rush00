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
        <h1>Connexion</h1>
        <form action="controller/people.php" method="POST">
            <input type="email" name="email" placeholder="E-mail" class="" value="">
            <input type="password" name="password" placeholder="Mot de passe" class="">
            <button type="submit" class="btn btn-default">Connection</button>
            <input type="hidden" name="from" value="login">
            <input type="hidden" name="success" value="index">
            <p>Tu n'es pas encore inscrit ? <a href="register.php">Inscris toi</a></p>
        </form>
    </div>

</body>
</html>