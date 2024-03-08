<?php
include "../db.php"; // Include db.php om toegang te krijgen tot de database

// Include de Tafel klasse om tafelgegevens op te halen
include "tafels.php"; // Include tafel.php om toegang te krijgen tot de Tafel-klasse

// Instantieer een object van de Tafel-klasse
$tafel = new Tafel();

// Roep de methode getTafels aan
$tafels = $tafel->getTafels();

// Loop door de tafels en toon ze
?>



<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Tafeloverzicht</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
<?php include "navbar.php"; ?>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tafelnummer</th>
            <th>Bijzonderheden</th>
            <th>Max. aantal personen</th>
            <th>Acties</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($tafels as $tafel): ?>
            <tr>
                <td><?php echo $tafel['tafel_id']; ?></td>
                <td><?php echo $tafel['tafelnummer']; ?></td>
                <td><?php echo $tafel['bijzonderheden']; ?></td>
                <td><?php echo $tafel['max_aantal_personen']; ?></td>
                <td>
                    <a href="edit-tafel.php?id=<?php echo $tafel['tafel_id']; ?>" class="btn btn-primary">Bewerken</a>
                    <a href="delete-tafel.php?id=<?php echo $tafel['tafel_id']; ?>" class="btn btn-danger" onclick="return confirm('Weet je zeker dat je deze tafel wilt verwijderen?')">Verwijderen</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
