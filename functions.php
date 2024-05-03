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
function generatePassword($passwordLength, $completo, $duplicatesChecked)
{

    $password = '';

    // creare ciclo while per non avere doppioni
    while (strlen($password) < $passwordLength) {
        // generare più indici casuale da completo di caratteri
        $randomIndex = array_rand($completo);

        // in questa variabile ci sono i caratteri, presi dalla variabile $completo, casuali con duplicati 
        $charRandon = $completo[$randomIndex];
        // se il check e impostato su si e quindi e true allora non c'è il filtro ,quindi ci sono duplicati
        if ($duplicatesChecked) {
            $password .= $charRandon;
        } else {
            // verificare se il carattere casuale è già presente nella password
            if (strpos($password, $charRandon) === false) {
                // se  carattere non è presente, aggiungiungere alla password
                $password .= $charRandon;
            }
        }
    }
    return $password;
}
