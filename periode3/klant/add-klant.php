<?php
include "klant.php"; // Inclusief de Klant-klasse

// Maak een instantie van de Klant-klasse
$klant = new Klant();

// Voeg een nieuwe klant toe als het formulier is verzonden
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $naam = $_POST["naam"];
    $email = $_POST["email"];
    $telefoon = $_POST["telefoon"];

    $result = $klant->addKlant($naam, $email, $telefoon);

    if ($result) {
        echo "Klant succesvol toegevoegd.";
    } else {
        echo "Er is een fout opgetreden bij het toevoegen van de klant.";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Klant Toevoegen</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Klant Toevoegen</h1>
    <form action="add-klant.php" method="post">
        <div class="form-group">
            <label for="naam">Naam</label>
            <input type="text" class="form-control" id="naam" name="naam" required>
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="telefoon">Telefoon</label>
            <input type="tel" class="form-control" id="telefoon" name="telefoon" required>
        </div>
        <button type="submit" class="btn btn-primary">Toevoegen</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
