<?php
// array contenente tutte le lettere minuscole
$minuscole = range('a', 'z');

// array contenente tutte le lettere maiuscole
$maiuscole = range('A', 'Z');

// array contenente i numeri da 0 a 9
$numeri = range(0, 9);

// array contenente alcuni caratteri speciali
$caratteriSpeciali = array('!', '@', '#', '$', '%', '&', '*', '(', ')');

// unione di tutti gli array
$completo = array_merge($minuscole, $maiuscole, $numeri, $caratteriSpeciali);




// funzione che genera la password con lunghezza desiderata
function generatePassword($passwordLength, $completo)
{
    
    $chiaviCasuali = array_rand($completo, $passwordLength);
    $password = '';
    foreach ($chiaviCasuali as $chiave) {
        $password .= $completo[$chiave];
    }
    return $password;
}
?>