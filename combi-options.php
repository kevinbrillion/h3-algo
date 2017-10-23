<?php
define('OPT_KLINGON',1);
define('OPT_ROMULAN',2);
define('OPT_GORN',4);
define('OPT_VULCAN',8);
define('OPT_HUMAN',16);
/**
 * @param $options
 */
function starTrekText($options)
{
    if (($options & OPT_KLINGON) == OPT_KLINGON) {
        echo "klingon k'Plah".PHP_EOL;
    }
    if (($options & OPT_ROMULAN) == OPT_ROMULAN) {
        echo "Vulcans gone bad".PHP_EOL;
    }
    if (($options & OPT_GORN) == OPT_GORN) {
        echo "Slitherin 4tw".PHP_EOL;
    }
}

//starTrekText(OPT_KLINGON|OPT_GORN);
starTrekText(OPT_ROMULAN);