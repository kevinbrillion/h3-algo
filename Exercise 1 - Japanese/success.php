<?php
// Consignes : afficher les caractères japonais un par un en renvenant à la ligne

// Ma solution spécifique aux caractères japonais
$leTexte = file_get_contents('texte-hiragana.txt');
var_dump($leTexte);
$pattern = "/[\x{3041}-\x{3096}\x{30A0}-\x{30FF}\x{3400}-\x{4DB5}\x{4E00}-\x{9FCB}\x{F900}-\x{FA6A}]/u";
preg_match_all($pattern, $leTexte, $matches);
echo implode(PHP_EOL, $matches[0]);

define("MASK_UTF8_1B_INVERSE", 0b10000000);
define("MASK_UTF8_2B", 0b11100000);
define("MASK_UTF8_2B_CONTROL", 0b11000000);
define("MASK_UTF8_3B", 0b11110000);
define("MASK_UTF8_3B_CONTROL", 0b11100000);
define("MASK_UTF8_4B", 0b11111000);
define("MASK_UTF8_4B_CONTROL", 0b11110000);
define("MASK_UTF8_FILLER", 0b11000000);
define("MASK_UTF8_FILLER_CONTROL", 0b10000000);
define("ITERATIONS", 1000000);

sol4(); // La bonne solution

//Correction - 4 solutions
// Solution 1
function sol1(){
    $leTexte = file_get_contents('texte-hiragana.txt');
    var_dump($leTexte);
        $index = 0;
        $byteCountDown = 0;
        // tant que je n'ai pas traité tous les caractères, je boucle
        while ($index < strlen($leTexte)) {
            // stockage de l'octet courant dans une variable pour eviter
            // de le rechercher dans le tableau associatif à chaque test
            $currentByte = $leTexte[$index];
            $currentOrd = ord($currentByte);
            if ((~$currentOrd & MASK_UTF8_1B_INVERSE) == MASK_UTF8_1B_INVERSE) {
                $byteCountDown = 0;
            } elseif (($currentOrd & MASK_UTF8_2B) == MASK_UTF8_2B &&
                ($currentOrd & MASK_UTF8_2B_CONTROL) == 0
            ) {
                $byteCountDown = 1;
            } elseif (($currentOrd & MASK_UTF8_3B) == MASK_UTF8_3B &&
                ($currentOrd & MASK_UTF8_3B_CONTROL) == 0
            ) {
                $byteCountDown = 2;
            } elseif (($currentOrd & MASK_UTF8_4B) == MASK_UTF8_4B &&
                ($currentOrd & MASK_UTF8_4B_CONTROL) == 0
            ) {
                $byteCountDown = 3;
            }
            echo $currentByte;
            if ($byteCountDown > 0 ) {
                $byteCountDown--;
            } else {
                // affichage du retour à la ligne
                echo PHP_EOL;
            }
            // incrementation de l'index pour parcourir le tableau
            $index = $index + 1;
        }
    }
// Solution 2
function sol2(){
    $leTexte = file_get_contents('texte-hiragana.txt');
    var_dump($leTexte);
        $index = 0;
        $longueurDeLaChaine = strlen($leTexte);
        $byteCountDown = 0;
        while ($index < $longueurDeLaChaine) {
            // stockage de l'octet courant dans une variable pour eviter
            // de le rechercher dans le tableau associatif à chaque test
            $currentByte = $leTexte[$index];
            $currentOrd = ord($currentByte);
            if ((~$currentOrd & MASK_UTF8_1B_INVERSE) == MASK_UTF8_1B_INVERSE) {
                $byteCountDown = 0;
            } elseif (($currentOrd & MASK_UTF8_2B) == MASK_UTF8_2B &&
                ($currentOrd & MASK_UTF8_2B_CONTROL) == 0
            ) {
                $byteCountDown = 1;
            } elseif (($currentOrd & MASK_UTF8_3B) == MASK_UTF8_3B &&
                ($currentOrd & MASK_UTF8_3B_CONTROL) == 0
            ) {
                $byteCountDown = 2;
            } elseif (($currentOrd & MASK_UTF8_4B) == MASK_UTF8_4B &&
                ($currentOrd & MASK_UTF8_4B_CONTROL) == 0
            ) {
                $byteCountDown = 3;
            }
            echo $currentByte;
            if ($byteCountDown > 0 ) {
                $byteCountDown--;
            } else {
                // affichage du retour à la ligne
                echo PHP_EOL;
            }
            // incrementation de l'index pour parcourir le tableau
            $index = $index + 1;
        }
    }
// Solution 3
function sol3(){
    $leTexte = file_get_contents('texte-hiragana.txt');
    var_dump($leTexte);
        $index = 0;
        $longueurDeLaChaine = strlen($leTexte);
        $byteCountDown = 0;
        while ($index < $longueurDeLaChaine) {
            // stockage de l'octet courant dans une variable pour eviter
            // de le rechercher dans le tableau associatif à chaque test
            $currentByte = $leTexte[$index];
            $currentOrd = ord($currentByte);
            if ((~$currentOrd & MASK_UTF8_1B_INVERSE) == MASK_UTF8_1B_INVERSE) {
                $byteCountDown = 0;
            } elseif (($currentOrd & MASK_UTF8_2B) == MASK_UTF8_2B_CONTROL) {
                $byteCountDown = 1;
            } elseif (($currentOrd & MASK_UTF8_3B) == MASK_UTF8_3B_CONTROL) {
                $byteCountDown = 2;
            } elseif (($currentOrd & MASK_UTF8_4B) == MASK_UTF8_4B_CONTROL) {
                $byteCountDown = 3;
            }
            echo $currentByte;
            if ($byteCountDown > 0 ) {
                $byteCountDown--;
            } else {
                // affichage du retour à la ligne
                echo PHP_EOL;
            }
            // incrementation de l'index pour parcourir le tableau
            $index = $index + 1;
        }
    }
// Solution 4
function sol4(){
    $leTexte = file_get_contents('texte-hiragana.txt');
    var_dump($leTexte);
        $index = 0;
        $longueurDeLaChaine = strlen($leTexte);
        $byteCountDown = 0;
        while ($index < $longueurDeLaChaine) {
            // stockage de l'octet courant dans une variable pour eviter
            // de le rechercher dans le tableau associatif à chaque test
            $currentByte = $leTexte[$index];
            $currentOrd = ord($currentByte);
            if (($currentOrd & MASK_UTF8_FILLER) == MASK_UTF8_FILLER_CONTROL) {
                // filler, do nothing
            } elseif (($currentOrd & MASK_UTF8_3B) == MASK_UTF8_3B_CONTROL) {
                $byteCountDown = 2;
            } elseif ((~$currentOrd & MASK_UTF8_1B_INVERSE) == MASK_UTF8_1B_INVERSE) {
                $byteCountDown = 0;
            } elseif (($currentOrd & MASK_UTF8_2B) == MASK_UTF8_2B_CONTROL) {
                $byteCountDown = 1;
            } elseif (($currentOrd & MASK_UTF8_4B) == MASK_UTF8_4B_CONTROL) {
                $byteCountDown = 3;
            }
            echo $currentByte;
            if ($byteCountDown > 0 ) {
                $byteCountDown--;
            } else {
                // affichage du retour à la ligne
                echo PHP_EOL;
            }
            // incrementation de l'index pour parcourir le tableau
            $index = $index + 1;
        }
    }