<?php
session_start();
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

    <div class="filter_box">
      <h2>Quelle planète choisir ?</h2>
      <form method='post' action='products2.php'>
        <div class="categories">
           <?php
           foreach ($unserialized as $k => $v)
           {
            echo "<div class='title'>";
            echo "<h4>".$k."</h4>";
            echo "<hr>";
            foreach ($v as $elem)
              //NOTE : Les espaces dans le "lieu" sont problématiques pour la filtration (j'ai essayé 2-3 trucs mais rien ne passe) 
              //Si tu en connais pas l'idéal serait de se débarasser des espaces, on à qu'à faire proche, loin, et ailleurs ou du genre.
            	if(isset($_POST[$elem]))
            	{
            		  echo "<div class='check'><input type='checkbox' name='".$elem."' checked='checked'><p>".$elem."</p></div>";
          		}
          		else
          		{
          			echo "<div class='check'><input type='checkbox' name='".$elem."'><p>".$elem."</p></div>";
          		}
            echo "</div>";

          } 
        ?>
        </div>
        <input type='submit' name = 'submit' value='Filtrer' />
      </form>
    </div>

    <div class="products-list">
        <?php
        $db_planets = unserialize(file_get_contents("./db/serialized"));
        // print_r ($db_planets);
        foreach ($db_planets as $planet)
        { 
          if(isset($_POST[$planet[4]]))
          {
            if(isset($_POST[$planet[6]]))
              //NOTE : Voire note d'au dessus. Evidemment le probleme se répercute ici (il faudrait un troisième if mais je l'ai temporairement enlevé).
            {
              echo "<a href='show_planet.php?planet=".$planet[1]."' title='".$planet[1]."'>";
              echo "<div class='card'>";
              echo "<div class='title'><h2>".$planet[1]."</h2></div>";
              echo "<img src='".$planet[7]."'>";
              echo "</div>";
              echo "</a>";
            }
          }
        }
        ?>

      </div>

    </div>
    <?php include('partial/footer.php'); ?>

  </body>
  </html>