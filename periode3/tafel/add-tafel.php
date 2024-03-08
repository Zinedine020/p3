<?php
include "tafels.php"; // Inclusief de Tafel-klasse

// Maak een instantie van de Tafel-klasse
$tafel = new Tafel();

// Voeg een nieuwe tafel toe als het formulier is verzonden
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tafelnummer = $_POST["tafelnummer"];
    $bijzonderheden = $_POST["bijzonderheden"];
    $max_personen = $_POST["max_personen"];

    // Voer de functie uit om de tafel toe te voegen
    $result = $tafel->addTafel($tafelnummer, $bijzonderheden, $max_personen);

    if ($result) {
        echo "Tafel succesvol toegevoegd.";
    } else {
        echo "Er is een fout opgetreden bij het toevoegen van de tafel.";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Tafel Toevoegen</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Tafel Toevoegen</h1>
    <form action="add-tafel.php" method="post">
        <div class="form-group">
            <label for="tafelnummer">Tafelnummer</label>
            <input type="text" class="form-control" id="tafelnummer" name="tafelnummer" required>
        </div>
        <div class="form-group">
            <label for="bijzonderheden">Bijzonderheden</label>
            <textarea class="form-control" id="bijzonderheden" name="bijzonderheden"></textarea>
        </div>
        <div class="form-group">
            <label for="max_personen">Max aantal personen</label>
            <input type="number" class="form-control" id="max_personen" name="max_personen" required>
        </div>
        <button type="submit" class="btn btn-primary">Toevoegen</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
