<?php
// array contenente tutte le lettere minuscole
$minuscole = range('a', 'z');

// array contenente tutte le lettere maiuscole
$maiuscole = range('A', 'Z');

// array contenente i numeri da 0 a 9
$numeri = range(0, 9);

// array contenente alcuni caratteri speciali
$caratteriSpeciali = array('!', '@', '#', '$', '%', '&', '*', '(', ')');

session_start();
// variabile che può assumere valore 1 o 2 o 3
$_SESSION['checkBoxValue'] ;

$checkBoxValue = $_SESSION['checkBoxValue'];


// unione di tutti gli array
if($checkBoxValue == 1){
    $completo = array_merge( $numeri, $caratteriSpeciali);
}elseif($checkBoxValue == 2){
    $completo = array_merge($minuscole, $maiuscole,  $caratteriSpeciali);
}elseif($checkBoxValue == 3){
    $completo = array_merge($minuscole, $maiuscole, $numeri);
}elseif($checkBoxValue == null){
    $completo = array_merge($minuscole, $maiuscole, $numeri, $caratteriSpeciali);
}




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
