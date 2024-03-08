<?php
include "rekening.php"; // Inclusief de Rekening-klasse
include "../navbar.php";

// Maak een instantie van de Rekening-klasse
$rekening = new Rekening();

// Voeg een nieuwe rekening toe als het formulier is verzonden
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $klant_id = $_POST["klant_id"];
    $bedrag = $_POST["bedrag"];
    $datum = $_POST["datum"];

    $result = $rekening->addRekening($klant_id, $bedrag, $datum);

    if ($result) {
        echo "Rekening succesvol toegevoegd.";
    } else {
        echo "Er is een fout opgetreden bij het toevoegen van de rekening.";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Rekening Toevoegen</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Rekening Toevoegen</h1>
    <form action="add-rekening.php" method="post">
        <div class="form-group">
            <label for="klant_id">Klant ID</label>
            <input type="text" class="form-control" id="klant_id" name="klant_id" required>
        </div>
        <div class="form-group">
            <label for="bedrag">Bedrag</label>
            <input type="number" step="0.01" class="form-control" id="bedrag" name="bedrag" required>
        </div>
        <div class="form-group">
            <label for="datum">Datum</label>
            <input type="date" class="form-control" id="datum" name="datum" required>
        </div>
        <button type="submit" class="btn btn-primary">Toevoegen</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
