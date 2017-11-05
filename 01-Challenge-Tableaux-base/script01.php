<h1>Manipulation de tableau</h1>

<?php
// Définition d'un tableau vide
$bonbons = []; // Ou $bonbons = array();

// La balise HTML <pre> permet d'afficher du texte préformatté. Très pratique pour les var_dump et print_r
echo '<pre>';
print_r($bonbons);
echo '</pre>';


// On push 2 bonbons dans le tableau
$bonbons[] = 'Haribo';
$bonbons[] = 'Carambar';

// On ajoute deux autres bonbons via un index
$bonbons[2] = 'Mi-Cho-Ko';
$bonbons[3] = 'Krema';

print_r('Premier élément du tableau : '.$bonbons[0]);
echo '<br>';
print_r('Troisième élément du tableau : '.$bonbons[2]);
echo '<br>';

// On push un nouveau bonbon
$bonbons[] = 'Dragibus';
print_r('Nouveau bonbon : '.$bonbons[4]);

?>

<pre><?php print_r($bonbons);?></pre>
