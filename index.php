<?php
require_once __DIR__ . '/functions.php';
// inizializiare numero lunghezza password scelto da utente
$passwordLength =  isset($_GET['lengthPassword']) ? intval($_GET['lengthPassword']) : 0;
// inizializiazione variabile consecuzione caratteri
$duplicatesChecked = isset($_GET['duplicates']) && $_GET['duplicates'] === 'si';

// variabile su true se si è selezionato
$duplicates = $duplicatesChecked ? true : false;


session_start();

// inizializzare la variabile checkbox che puo assumere valori 1 o 2 o 3
$_SESSION['checkBoxValue'] = isset($_GET['checkBoxValue']) ? $_GET['checkBoxValue'] : null;

// var_dump($_SESSION['checkBoxValue']);
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <!-- backgroung animation -->
    <div>
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
    </div>
    <!--/backgroung animation -->

    <div class="d-flex vh-100 align-items-center my-bg">
        <div class="container d-flex justify-content-center">
            <div class=" bg-dark bg-gradient border border-info border-3 rounded text-info p-5 text-center">
                <h2>STRONG PASSWORD GENERETOR</h2>
                <h4 class="text-secondary">Genera una password sicura</h4>
                <div class="bg-dark-subtle rounded text-dark p-3">
                    <form action="" method="GET">
                        <div class="form-row mb-3">
                            <div class=" col rounded bg-success">
                                <?php if ($passwordLength != 0) { ?>
                                    <p class="fs-3"><?php echo generatePassword($passwordLength, $completo, $duplicatesChecked) ?></p>
                                <?php } ?>
                            </div>
                            <div class="col mt-4 d-flex gap-5 text-start">
                                <label class="col-6" for="lengthPassword">Lunghezza password</label>
                                <input type="number" class="form-control" name="lengthPassword" id="lengthPassword" min="1" max="16" placeholder="Inserisci un numero da 1 a 16" value="<?php echo ($_GET['lengthPassword'])  ?>">
                            </div>
                            <div class="col mt-4 d-flex gap-5 text-start">
                                <label class="col-6" for="lengthPassword">Ripetizione carattere consecutivo</label>
                                <div class="d-flex gap-5">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="duplicates" id="duplicates1" value="si" <?php echo $duplicates ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="duplicates1">
                                            si
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="duplicates" id="duplicates2" value="no" <?php echo !$duplicates ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="duplicates2">
                                            no
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col text-start mt-3">
                                <label class="col-4">Esculudere :</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="checkBoxValue" id="inlineCheckbox1" value="1" <?php echo $_SESSION['checkBoxValue'] == 1 ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="inlineCheckbox1">Caratteri</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="checkBoxValue" id="inlineCheckbox2" value="2" <?php echo $_SESSION['checkBoxValue'] == 2 ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="inlineCheckbox2">Numeri</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="checkBoxValue" id="inlineCheckbox3" value="3" <?php echo $_SESSION['checkBoxValue'] == 3 ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="inlineCheckbox3">Simboli</label>
                                </div>

                            </div>
                            <div class="col d-flex justify-content-center gap-5">
                                <button type="submit" class="btn btn-outline-primary mt-4">Invia</button>
                                <button id="resetButton" class="btn btn-outline-secondary mt-4">Reset</button>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script>
        // funzione che resetta forum dal bottone reset
        document.getElementById('resetButton').addEventListener('click', function() {
            // rimuovere la selezione checked dal checkbox
            document.getElementById('inlineCheckbox1').checked = false;
            document.getElementById('inlineCheckbox2').checked = false;
            document.getElementById('inlineCheckbox3').checked = false;
            
            // rimuovere la selezione checked dal checkbox radio
            document.getElementById('duplicates1').checked = false;
            document.getElementById('duplicates2').checked = false;
            // svuota l'input di testo
            document.getElementById('lengthPassword').value = '';
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>