<?php
session_start();
$css_path = "./";
$css_file = "products.css";
include('partial/head.php');
include('partial/header.php');
?>
<body>
  <div class="container">

    <?php

	$file = "db/categories";
    $unserialized = unserialize(file_get_contents($file));
    ?>

    <div class="filter_box">
      <h2>Achetez la planète qui vous ressemble</h2>
      <form method='post' action='products-sorted.php'>
        <div class="categories">
           <?php
           foreach ($unserialized as $k => $v)
           {
            echo "<div class='title'>";
            echo "<h4>".$k."</h4>";
            echo "<hr>";
            foreach ($v as $elem)
              echo "<div class='check'><input type='checkbox' name='".$elem."' checked='checked'><p>".$elem."</p></div>";
            echo "</div>";

          } 
        ?>
        </div>
        <button type='submit' name='submit' value='Filtrer'/>Filtrer</button>
      </form>
    </div>

    <div class="products-list">
        <?php
        $db_planets = unserialize(file_get_contents("db/serialized"));
        // print_r ($db_planets);
        foreach ($db_planets as $planet)
        {
          echo "<a href='show_planet.php?planet=".$planet[1]."' title='".$planet[1]."'>";
          echo "<div class='card'>";
          echo "<div class='title'><h2>".$planet[1]."</h2></div>";
          echo "<img src='".$planet[6]."'>";
          echo "</div>";
          echo "</a>";
        }
        ?>

      </div>

    </div>
    <?php include('partial/footer.php'); ?>

  </body>
  </html>
