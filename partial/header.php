<header>
    <div class="logo">
        <a href="index.php"><img src="img/planet-logo.png" alt=""></a>
    </div>
    <div class="menu">
        <a href="products.php">Nos produits</a>
        <a href="about.php">Qui sommes-nous ?</a>
        <a href="contact.php">Contact</a>
    </div>
    <div class="login">
        <div class="basket">
            <a href="basket.php">
                <img src="img/shop_logo.png" alt="">
                <p>0 articles</p>
            </a>
        </div>
        <!-- <div><a href="signup.php">Inscription</a></div> -->
        <!-- <div><a href="login.php">Connexion</a></div> -->
        <?php
            if (isset($_SESSION['logged_on_user']) && !empty($_SESSION['logged_on_user'])) {
        ?>

            <div class="user">
                <p>Bonjour <?php echo $_SESSION['logged_on_user']; ?></p>
                <img src="img/caret-down.svg" alt="">
                <ul class="choice">
                    <li><a href="modif_profil.php">Modifier mon profil</a></li>
                    <li><a href="modif_pwd.php">Modifier mon mot de passe</a></li>
                    <li><a href="delete.php">Supprimer mon compte</a></li>
                </ul>
            </div>

                <!-- echo '<div><p class="user_firstname">Bonjour '.$_SESSION['logged_on_user'].'</p></div>'; -->
            <div><a href="logout.php">Déconnexion</a></div>


        <?php
            } else {
                echo '<div><a href="signup.php">Inscription</a></div>';
                echo '<div><a href="login.php">Connexion</a></div>';
            }
        ?>
    </div>
</header>


