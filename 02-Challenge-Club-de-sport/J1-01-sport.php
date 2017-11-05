<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>O'clock United</title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>

        <div class="container">
            <h1>O'clock United Football Club</h1>
            <h2>Section enfants (de 6 à 14 ans)</h2>

            <?php
            /*
            1.1
            (créer une variable $age et lui assigner une valeur de votre choix.)

            écrire le script qui indique la catégorie selon $age:
            "Trop jeune" si moins de 6 ans
            "Poussin" de 6 à 7 ans
            "Pupille" de 8 à 9 ans
            "Minime" de 10 à 11 ans
            "Cadet" après 12 ans
            "Trop âgé" à partir de 15 ans

            1.2
            Récupérer la valeur de l'âge grâce à un paramètre GET dans l'URL

            1.3
            Ajouter un formulaire HTML avec un INPUT "age" permettant d'entrer un entier, et un bouton de type "submit"
            */

            // Valeur par défaut de la variable $age
            $age = '-';

            // On teste si l'utilisateur a entrée une valeur dans l'input et qu'elle n'est pas vide
            if (isset($_GET['age']) && !empty($_GET['age'])) {
                $age = $_GET['age'];
            }

            // On teste la valeur entrée dans le champ
            // Si le champ est vide
            if ($age === '-') {
                $categorie = 'Renseignez l\'âge de votre enfant';
            }
            // Si la valeur n'est pas un nombre
            elseif (!is_numeric($age) || $age < 0) {
                $categorie = 'erreur';
            }
            // Sinon on associe l'âge indiqué à la bonne catégorie
            elseif ($age < 6) {
                $categorie = 'Trop jeune';
            }
            elseif ($age <= 7) {
                $categorie = 'Poussin';
            }
            elseif ($age <= 9) {
                $categorie = 'Pupille';
            }
            elseif ($age <= 11) {
                $categorie = 'Minime';
            }
            elseif ($age <= 14) {
                $categorie = 'Cadet';
            }
            else {
                $categorie = 'Trop âgé';
            }

            ?>

            <p>Age de l'enfant : <?= $age?></p>
            <p id="categorie">Catégorie : <?= $categorie?></p>

            <hr>

            <form method="get">
                <label for="age">Quel est l'âge de votre enfant ?</label>
                <input type="text" name="age" placeholder="âge de l'enfant">
                <input type="submit" value="Calculer">
            </form>
        </div>

        <img src="images/bart.png" alt="bart soccer">

    </body>
</html>
