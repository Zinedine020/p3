<?php
include "../db.php"; // Als db.php één niveau hoger is dan de huidige map

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $naam = $_POST["naam"];
    $omschrijving = $_POST["omschrijving"];
    $prijs_per_stuk = $_POST["prijs_per_stuk"];

    $stmt = $myDb->execute("INSERT INTO producten (naam, omschrijving, prijs_per_stuk) VALUES (?, ?, ?)", [$naam, $omschrijving, $prijs_per_stuk]);
    if ($stmt) {
        echo "Product succesvol toegevoegd!";
    } else {
        echo "Er is een fout opgetreden bij het toevoegen van het product.";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Producten</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body> 

<div class="container"> 
    <h1>Producten</h1>
    <h2>Product toevoegen</h2>
    <form action="add-product.php" method="post">
        <div class="form-group">
            <label for="naam">Naam</label>
            <input type="text" class="form-control" id="naam" name="naam" required>
        </div>
        <div class="form-group">
            <label for="omschrijving">Omschrijving</label>
            <textarea class="form-control" id="omschrijving" name="omschrijving" required></textarea>
        </div>
        <div class="form-group">
            <label for="prijs_per_stuk">Prijs per stuk</label>
            <input type="number" step="0.01" class="form-control" id="prijs_per_stuk" name="prijs_per_stuk" required>
        </div>
        <button type="submit" class="btn btn-primary">Toevoegen</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
