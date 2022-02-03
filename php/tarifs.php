<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Cinéma Rodia - Tarifs</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
  <link rel="stylesheet" href="../css/reset.css">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <header>
    <h1>Cinéma Rodia</h1>
    <?php 
      // On va dire à PHP de générer la navigation
      include 'templates/nav.php';
    ?>
  </header>
  <main>
    <section id="tarifs">
      <h2>Tarifs</h2>
        <div class="flex">

          <?php 
            // Un tableau associatif est un tableau dont on peut customiser
            // les indexes. Dans un tableau classique, les indexes sont des valeurs entières
            // Avec un tableau associatif on peut mettre ce que l'on veut 
            // (dans la limite de ce qui se fait en PHP)
            // Warning ::: La clé key peut être soit un integer, soit une chaîne de caractères. 
            //             La valeur value peut être de n'importe quel type.
            // $tarifs = [
            //   "uneCleCustom cdcd je suis ton frère " => "Une valeur", // index 0
            //   1 => "Une autre valeur", // index 1
            //   2 => true, // index 2
            //   3 => 12, // index,
            //   "true" => 'Hello word'
            //   // ...
            //   // de façon générale, on aura index => valeur
            //   // index => valeur
            // ];
              
            // Ceci...
            $unTableau = [1, 2];
            $unTableau = [
              0 =>1,  //uncle(0), une valeur (1)
              1 =>2
            ];
            // est identifique à ceci
            $unTableau = array(1, 2);
            
            // On a créé un tableau associatif : on peut customiser l'index du tableau
            $uneCle = 'Enfant';
            $tarifs = [
              // clé => laValeur (int, float, string, boolean, array, ...)
              'Tarif Plein' => 8.30, // clé/index (Tarif Plein), une valeur (8.3)
              "Tarif Réduit" => 6.80,
              "Tarif $uneCle" => 4.50,
              "Supplément 3D" => 1,
              // 0 => "Un autre élément"
            ];

            // La fonction var_dump permet d'afficher le type d'une variable
            // var_dump($tarifs);

          ?>

          <ul>
            <?php 
              // Je vais mettre en place une boucle PHP qui va nous permettre de générer
              // dynamiquement la liste des tarifs du cinéma.
              // On va lire chaque ligne du tableau, et à chaque ligne :
              // On va mettre : 
              // - l'index courant (clé) dans la variable $keyTarif
              // - la valeur courante dans la variable $valeurDuTarif
              // La fonction number_format permet de transformer les "." en ","
              foreach($tarifs as $keyTarif => $valeurDuTarif) {
                echo "<li>".$keyTarif. ' : '. number_format($valeurDuTarif, 2, ',', ' '). ' &euro;</li>';
              }
            ?>
          </ul>

          <?php 
            $abonnements = [
              // clé => laValeur (int, float, string, boolean, array, ...)
              'Abonnement 5 places' => "-10%",
              'Abonnement 5 places -25ans' => "-20%",
            ];
          ?>
          <ul>
            <?php 
              foreach ($abonnements as $key => $value) {
                echo '<li>'.$key. ' : ' . $value. '</li>';
              }
            ?>
          </ul>
        </div>
        <p>
          Tarif Réduit pour les personnes de + de 60 ans et de moins de 16 ans<br>
          Tarif Enfant pour les - de 14 ans
        </p>
      
      <h2>Selon votre âge</h2>
      <p>

        <?php
          $tarifEnfant = 4.5;
          $tarifReduit = 6.8;
          $tarifPlein = 8.3;
          // L'âge du capitaine
          $age = 43;
          if ($age < 14) {
              $montant = $tarifEnfant;
          } elseif($age < 16 || $age > 60) {
              // Si j'ai moins de 16 ans, ou alors si j'ai plus de 60 ans
              // Double pipe ==> OU Logique
              $montant = $tarifReduit;
          } else {
              $montant = $tarifPlein;
          }          
          // On affiche l'âge et le tarif du capitaine
          // grâce à echo.
          if ($age >= 2) {
            echo "$age ans : $montant";
          } else {
            echo "$age an : $montant";
          }

          // On va afficher des chiffres allant de 1 à 10
          // Une Boucle FOR
          // (valeur départ; condition d'arrêt; incrémente de 1)
          // for(Initialization; Condition; Incrementation)
          for ($age = 1; $age <= 99; $age++) {
              // On va calculer les tarifs pour les ages suivants :
              // 1, 2, 3, ....99 ans

             // $age++ ==> $age= $age+1 ==> incrémentation de 1
            if ($age < 14) {
                $montant = $tarifEnfant;
            } elseif($age < 16 || $age > 60) {
                $montant = $tarifReduit;
            } else {
                $montant = $tarifPlein;
            }

            // Etape 4 : pour chaque âge, calculer le tarif de la place, avec la réduction de l'abonnement
            // Calcul du montant sans réduction, déduit de $montant calculé juste avant
            // Cinq tickets au tarif "normal" est à égal au montant de base fois 5
            $montant5Places = $montant * 5;

            // Par défaut, si on achète 5 place, on a droit à une réduction de 10%
            $ristourne = 10;
            if ($age < 25) {
              // Si on a moins de 25 ans, on a droit à une ristourne de 20%
              $ristourne = 20;
            }

            // Maintenant que j'ai le %age de réduction, je peux calculer le tarif de l'abonnement
            $montant5PlacesAvecRistourne = $montant5Places - ($montant5Places*$ristourne)/100;

            // var_dump($montant5PlacesAvecRistourne);

            echo "<br>";
            // 20 ans : 6.5€ (Montant pour 5 places 30.6€)
            if ($age >= 2) {
              echo "$age ans : $montant € (Montant pour 5 places : $montant5PlacesAvecRistourne €)"; // 1 ans : 4.5
            } else {
              echo "$age an : $montant € (Montant pour 5 places : $montant5PlacesAvecRistourne €)"; // 1 ans : 4.5
            }
            // echo '$age ans : $montant'; // $age ans : $montant
            echo "<br>";
          }

        ?>

      </p>

      <h2>
        Consommation
      </h2>

      <?php
        // [...]
        $extras = [
          // => index 0 ==> $extra[0]
          [
            'Popcorn', // => sous-index 0 ==> $extra[0][0]
            'L', // => sous-index 1 ==> $extra[0][1]
            2.9 // => sous-index 2 ==> $extra[0][2]
          ],

          // ['Popcorn', 'L', 2.9 ],

          // => index 1
          [
            'Popcorn', // => sous-index 0
            'XL', // => sous-index 1
            4 // => sous-index 2
          ],
          // => index 2
          [
            'Chips', // => sous-index 0
            '50g', // => sous-index 1
            2.5 // => sous-index 2
          ],
          // => index 3
          [
            'M&M\'s', // => sous-index 0
            '100g', // => sous-index 1
            4 // => sous-index 2
          ],
          // => index 4
          [
            'Soda', // => sous-index 0
            '33cl', // => sous-index 1
            3.2 // => sous-index 2
          ],
          // => index 5
          [
            'Evian', // => sous-index 0
            '33cl', // => sous-index 1
            3 // => sous-index 2
          ]
        ]; 

      ?>

      <!-- On affiche la premiere consommation -->
      
      <ul>
      <?php 
        // $extras[0] renvoit un tableau
        // Et si je veux afficher le contenu d'un tableau, j'ouvre les  crochets et j'indique
        // un index
        // echo $extras[0][0]; // Ici j'affiche "Popcorn"
        // echo $extras[0][1]; // Ici j'affiche "L"
        // echo $extras[0][2]; // Ici j'affiche le prix "2.9"

        // Popcorn - L - 2.9
        // echo $extras[0][0].' - '. $extras[0][1]. ' - ' . $extras[0][2];

        $indexExtra = 0;
        while($indexExtra <= 5) {
          // 0 <= 5...qui est toujours vraie
          // Tant que la condition est respectée, alors on affiche nos consommations
          echo '<li>';
          echo $extras[$indexExtra][0].' - '. $extras[$indexExtra][1]. ' - ' . $extras[$indexExtra][2];
          echo '</li>';

          // On incrémente pour éviter une boucle infinie
          // $indexExtra++;
          $indexExtra = $indexExtra+1; // 0+1 = 1
        }
      ?>
      </ul>

    </section>
  </main>
  <footer>
    Cinéma Rodia - 42, avenue Foch, Haut-Cloques &copy; Tous droits réservés
  </footer>
</body>
</html>
