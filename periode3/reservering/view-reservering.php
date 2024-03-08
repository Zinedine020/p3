<?php
include "reservering.php"; // Inclusief de Reservering-klasse

// Maak een instantie van de Reservering-klasse
$reservering = new Reservering();

// Haal alle reserveringen op
$reserveringen = $reservering->getReserveringen();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Reserveringen</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body> 

<div class="container"> 
    <h1>Reserveringen</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Klant ID</th>
                <th>Tafel ID</th>
                <th>Datum</th>
                <th>Tijd</th>
                <th>Aantal Personen</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reserveringen as $reservering): ?>
                <tr>
                    <td><?php echo $reservering['reservering_id']; ?></td>
                    <td><?php echo $reservering['klant_id']; ?></td>
                    <td><?php echo $reservering['tafel_id']; ?></td>
                    <td><?php echo $reservering['datum']; ?></td>
                    <td><?php echo $reservering['tijd']; ?></td>
                    <td><?php echo $reservering['aantal_personen']; ?></td>
                    <td>
                        <a href="edit-reservering.php?id=<?php echo $reservering['reservering_id']; ?>" class="btn btn-primary">Bewerken</a>
                        <a href="delete-reservering.php?id=<?php echo $reservering['reservering_id']; ?>" class="btn btn-danger">Verwijderen</a>
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
