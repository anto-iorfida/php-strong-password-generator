<?php
require_once __DIR__ . '/functions.php';
// inizializiare numero lunghezza password scelto da utente
$passwordLength =  isset($_GET['lengthPassword']) ? intval($_GET['lengthPassword']) : 0;


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

    <div class="d-flex vh-100 align-items-center">
        <div class="container d-flex justify-content-center">
            <div class=" bg-dark bg-gradient border border-info border-3 rounded text-info p-5 text-center">
                <h2>STRONG PASSWORD GENERETOR</h2>
                <h4 class="text-secondary">Genera una password sicura</h4>
                <div class="bg-dark-subtle rounded text-dark p-3">
                    <form action="" method="GET">
                        <div class="form-row mb-3">
                            <div class=" col rounded bg-success">
                                <?php if ($passwordLength != 0) { ?>
                                    <p class="fs-3"><?php echo generatePassword($passwordLength, $completo) ?></p>
                                <?php } ?>
                            </div>
                            <div class="col mt-4 d-flex gap-5">
                                <label for="lengthPassword">Lunghezza password</label>
                                <input type="number" class="form-control" name="lengthPassword" id="lengthPassword" min="1" max="16" placeholder="Inserisci un numero da 1 a 16">
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary mt-4">Invia</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>