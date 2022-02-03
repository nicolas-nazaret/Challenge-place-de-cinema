<?php 
  $pageTitle ='En salle';
?>
<?php include 'templates/header.php';?>
<main>
  <section>
    <p>
      <?php

      // On va créér un tableau de films
      // Etape 7 : On transforme le tableau de films en tableau associatif
      // Clé fait référence au Nom du film, et la Valeur le fichier associé au film
      $films = [
        "Interstellar" => "film1.php", // index 0

        "Retour vers le futur" => "film2.php", // index 1

        "Einstein 1" => "film3.php", // index 2

        "Batman et Joker" => "film1.php", // index 3

        "Jurassic Park" => "film1.php", // index 4,

        "2001 L'odysée" => "film1.php", // index 5

        "Avatar" => "film1.php", // index 6,

        "Les affranchis" => "film1.php", // index 7

        "Le Hobbit" => "film1.php", // index 8

        "Le diner des cons" => "film1.php", // index 9

        // index 10
        "Pas d'accord" => "film1.php"
      ];

      foreach ($films as $nomDuFilm => $urlDuFilm) {
        // <a href="film1.php">InterStellar</a>
        echo "<a href='$urlDuFilm'>$nomDuFilm</a>";
        echo '<br>';
      }

      // On affiche le premier film (Interstellar)
      // echo '<br>'.$films[0].'<br>';

      // La function count permet de compte le nombre d'éléments d'un tableau ($film)
      // $totalFilm = count($films); // on renvoie 11

      // // On affiche tous les films de la liste
      // for ($numeroDuFilm = 0; $numeroDuFilm < $totalFilm; $numeroDuFilm++) {
      //     // echo '<br>'.$films[0].'<br>';
      //     // echo '<br>'.$films[1].'<br>';
      //     // echo '<br>'.$films[2].'<br>';
      //     // ...
      //     // echo '<br>'.$films[9].'<br>';
      //     // echo '<br>'.$films[$indexFilm].'<br>';
      //     // echo $numeroDuFilm;
      //     echo '<br>'.$films[$numeroDuFilm].'<br>';
      // }

      ?>
    </p>

    <h2>Salles</h2>
    <?php
    // Le code PHP commence ici
    $rooms = [
      'Athéna', // => index 0
      'Dyonisos', // => index 1
      'Hadès', // => index 2
      'Zeus' // => index 3
    ];
    // PHP s'arrête ici...
    ?>
    <!-- Emmet : ul>li -->
    <ul>
      <?php
      // Une boucle FOR permet d'afficher tous les éléments d'un tableau en les parcourant
      // un à un ($indexSalle++ revient à faire $indexSalle = $indexSalle+1)
      for ($indexSalle = 0; $indexSalle <= 3; $indexSalle++) {

        // echo $rooms[0]; // Au premier Tour, $indexSalle = 0
        // echo $rooms[1]; // Au 2e Tour, $indexSalle = 0+1 = 1
        // echo $rooms[2]; // Au 3e Tour, $indexSalle = 1+1 = 2
        // echo $rooms[3]; // Au 4e Tour, $indexSalle = 2+1 = 3
        //echo '<li>'.$rooms[$indexSalle].'</li>'; // <li>Athena</li>
        echo "<li>$rooms[$indexSalle]</li>"; // <li>Athena</li>
      }
      ?>
    </ul>

  </section>
</main>

<?php
include 'templates/footer.php';
?>