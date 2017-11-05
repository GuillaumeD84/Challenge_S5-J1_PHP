<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>O'ssurance</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,900" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<?php

		// 1. Créer les variables qui vont contenir les informations du client.
		// 2. Ecrire le script qui permet de déterminer à quel palier peut prétendre un client, selon ses informations (et donc à quel couleur de tarif).
		// 3. Afficher le résultat, par ex. "Votre client a droit au tarif Vert".
		// 4. Bonus : afficher le résultat de trois manières différentes : via `if`, `switch` et `array()`.

        // Valeurs par défault
        $age = '';
        $driverLicenceAge = '';
        $nbAccident = '';
        $insuranceSeniority = '';

        $level = '?';
        $tariff = '?';

        // On test les 4 valeurs entrées par l'utilisateur
        if (isset($_GET['age']) && is_numeric($_GET['age'])) {
            $age = $_GET['age'];
        }
        else {
            $age = 'error';
        }

        if (isset($_GET['driverLicenceAge']) && is_numeric($_GET['driverLicenceAge'])) {
            $driverLicenceAge = $_GET['driverLicenceAge'];
        }
        else {
            $driverLicenceAge = 'error';
        }

        if (isset($_GET['accidentResponsible']) && is_numeric($_GET['accidentResponsible'])) {
            $nbAccident = $_GET['accidentResponsible'];
        }
        else {
            $nbAccident = 'error';
        }

        if (isset($_GET['insuranceSeniority']) && is_numeric($_GET['insuranceSeniority'])) {
            $insuranceSeniority = $_GET['insuranceSeniority'];
        }
        else {
            $insuranceSeniority = 'error';
        }


        // Si les 4 valeurs entrée son 'valides', i.e. des nombres
        if ($age != 'error' && $driverLicenceAge != 'error' && $nbAccident != 'error' && $insuranceSeniority != 'error') {

            // On calcul le pallier
            $level = 1;

            if ($age > 25) {
                $level++;
            }
            if ($driverLicenceAge > 2) {
                $level++;
            }
            if ($insuranceSeniority > 5) {
                $level++;
            }

            $level -= $nbAccident;

            // On est pas obligé de mettre le level à 0 pour notre test avec if (ou switch) mais on utilisera cette valeur pour générer une classe afin de changer la couleur du tarif dans le HTML
            // Petite astuce pour obtenir d'une valeur soit 0, soit sa valeur si elle est positive. Donc tant que $level est supérieure à 0 on récupère $level sinon 0
            $level = max(0, $level);

            // On détermine la grille tarifaire d'après le pallier obtenu
            // Avec un if
            if ($level === 1) {
                $tariff = 'Rouge';
            }
            elseif ($level === 2) {
                $tariff = 'Orange';
            }
            elseif ($level === 3) {
                $tariff = 'Vert';
            }
            elseif ($level === 4) {
                $tariff = 'Bleu';
            }
            else {
                $tariff = 'Refus d\'assurer';
            }

            // Avec un switch
            switch ($level) {
                case 1:
                    $tariff = 'Rouge';
                    break;
                case 2:
                    $tariff = 'Orange';
                    break;
                case 3:
                    $tariff = 'Vert';
                    break;
                case 4:
                    $tariff = 'Bleu';
                    break;
                default:
                    $tariff = 'Refus d\'assurer';
            }

            // Avec un tableau
            $table = ['Refus d\'assurer', 'Rouge', 'Orange', 'Vert', 'Bleu'];
            // print_r($table[$level]);

        }

		?>

        <div class="container">
            <h1>O'ssurance</h1>
            <h2>Calcul du tarif de votre client</h2>

            <p>Selon les informations fournies,
                <form method="get">
                    <ul>
                        <li>
                            <label for="age">Age : </label>
                            <input type="text" name="age">
                            ans <?php if ($age != 'error'): ?>
                                (<?= $age?>)
                            <?php endif; ?>
                        </li>
                        <li>
                            <label for="driverLicenceAge">Années de permis : </label>
                            <input type="text" name="driverLicenceAge">
                            ans <?php if ($driverLicenceAge != 'error'): ?>
                                (<?= $driverLicenceAge?>)
                            <?php endif; ?>
                        </li>
                        <li>
                            <label for="accidentResponsible">Accidents de son fait : </label>
                            <input type="text" name="accidentResponsible">
                            <?php if ($nbAccident != 'error'): ?>
                                (<?= $nbAccident?>)
                            <?php endif; ?>
                        </li>
                        <li>
                            <label for="insuranceSeniority">Ancienneté chez nous : </label>
                            <input type="text" name="insuranceSeniority">
                            ans <?php if ($insuranceSeniority != 'error'): ?>
                                (<?= $insuranceSeniority?>)
                            <?php endif; ?>
                        </li>
                    </ul>

                    <input type="submit" value="Calculer">
                </form>

            </p>

            <p>Votre client à droit au tarif <span class="tarif<?php echo $level;?>"><b><?php echo $tariff;?></b></span> (pallier <?php echo $level;?>)</p>
        </div>

	</body>
</html>
