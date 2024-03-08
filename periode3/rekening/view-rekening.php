<?php
include "rekening.php"; // Inclusief de Rekening-klasse

// Maak een instantie van de Rekening-klasse
$rekening = new Rekening();

// Haal alle rekeningen op
$rekeningen = $rekening->getRekeningen();
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Rekeningen</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body> 

<div class="container"> 
    <h1>Rekeningen</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Klant ID</th>
                <th>Bedrag</th>
                <th>Datum</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rekeningen as $rekening): ?>
                <tr>
                    <td><?php echo $rekening['rekening_id']; ?></td>
                    <td><?php echo $rekening['klant_id']; ?></td>
                    <td><?php echo $rekening['bedrag']; ?></td>
                    <td><?php echo $rekening['datum']; ?></td>
                    <td>
                        <a href="edit-rekening.php?id=<?php echo $rekening['rekening_id']; ?>" class="btn btn-primary">Bewerken</a>
                        <a href="delete-rekening.php?id=<?php echo $rekening['rekening_id']; ?>" class="btn btn-danger">Verwijderen</a>
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
