<?php
include "bestelling.php"; // Inclusief de Bestelling-klasse

// Maak een instantie van de Bestelling-klasse
$bestelling = new Bestelling();

// Haal alle bestellingen op
$bestellingen = $bestelling->getBestellingen();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Bestellingen</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body> 

<div class="container"> 
    <h1>Bestellingen</h1>
    <a href="add-bestelling.php" class="btn btn-primary mb-3">Bestelling Toevoegen</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Klant ID</th>
                <th>Product ID</th>
                <th>Aantal</th>
                <th>Datum</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bestellingen as $bestelling): ?>
                <tr>
                    <td><?php echo $bestelling['bestelling_id']; ?></td>
                    <td><?php echo $bestelling['klant_id']; ?></td>
                    <td><?php echo $bestelling['product_id']; ?></td>
                    <td><?php echo $bestelling['aantal']; ?></td>
                    <td><?php echo $bestelling['datum']; ?></td>
                    <td>
                        <a href="edit-bestelling.php?id=<?php echo $bestelling['bestelling_id']; ?>" class="btn btn-primary">Wijzigen</a>
                        <a href="delete-bestelling.php?id=<?php echo $bestelling['bestelling_id']; ?>" class="btn btn-danger">Verwijderen</a>
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
