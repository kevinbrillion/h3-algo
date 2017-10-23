<?php
$contenuDuFichier = file_get_contents('texte-hiragana.txt');
var_dump($contenuDuFichier);
$pattern = "/[\x{3041}-\x{3096}\x{30A0}-\x{30FF}\x{3400}-\x{4DB5}\x{4E00}-\x{9FCB}\x{F900}-\x{FA6A}]/u";
preg_match_all($pattern, $contenuDuFichier, $matches);
echo implode(PHP_EOL, $matches[0]);