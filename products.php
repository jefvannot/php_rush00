<?php
$css_file = "products.css";
include('partial/head.php');
include('partial/header.php');
?>
<body>
  <div class="container">

    <?php
    $path = "private";
    $file = $path."/categories";
    $unserialized = unserialize(file_get_contents($file));
    ?>

    <div>
      <p>Catégories :</p>
      <form method='post' action='check-box-boutique.php'>

        <?php
        foreach ($unserialized as $key=>$value)
        {
          foreach ($value as $elem)
            echo "<input type='checkbox' name='".$elem."' checked='checked'> ".$elem."<br/>";
        } 
        ?>
        <input type='submit' name = 'submit' value='Valider' />
      </form>
    </div>

    <div class="products-list">
        <?php
        $db_planets = unserialize(file_get_contents("./db/serialized"));
        // print_r ($db_planets);
        foreach ($db_planets as $planet)
        {
          echo "<div class='card'>";
          echo "<div class='title'><h2>".$planet[1]."</h2></div>";
          echo "<img src='".$planet[8]."'>";
          echo "</div>";
        }
        ?>

      </div>

    </div>
    <?php include('partial/footer.php'); ?>

  </body>
  </html>