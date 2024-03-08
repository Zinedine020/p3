<?php
include "reservering.php"; // Inclusief de Reservering-klasse

// Maak een instantie van de Reservering-klasse
$reservering = new Reservering();

// Voeg een nieuwe reservering toe als het formulier is verzonden
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $klant_id = $_POST["klant_id"];
    $tafel_id = $_POST["tafel_id"];
    $datum = $_POST["datum"];
    $tijd = $_POST["tijd"];
    $aantal_personen = $_POST["aantal_personen"];

    $result = $reservering->addReservering($klant_id, $tafel_id, $datum, $tijd, $aantal_personen);

    if ($result) {
        echo "Reservering succesvol toegevoegd.";
    } else {
        echo "Er is een fout opgetreden bij het toevoegen van de reservering.";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Reservering Toevoegen</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Reservering Toevoegen</h1>
    <form action="add-reservering.php" method="post">
        <div class="form-group">
            <label for="klant_id">Klant ID</label>
            <input type="text" class="form-control" id="klant_id" name="klant_id" required>
        </div>
        <div class="form-group">
            <label for="tafel_id">Tafel ID</label>
            <input type="text" class="form-control" id="tafel_id" name="tafel_id" required>
        </div>
        <div class="form-group">
            <label for="datum">Datum</label>
            <input type="date" class="form-control" id="datum" name="datum" required>
        </div>
        <div class="form-group">
            <label for="tijd">Tijd</label>
            <input type="time" class="form-control" id="tijd" name="tijd" required>
        </div>
        <div class="form-group">
            <label for="aantal_personen">Aantal Personen</label>
            <input type="number" class="form-control" id="aantal_personen" name="aantal_personen" required>
        </div>
        <button type="submit" class="btn btn-primary">Toevoegen</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
