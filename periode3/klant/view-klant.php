<?php
include "klant.php";

// Maak een instantie van de Klant class
$klant = new Klant();

// Haal alle klanten op
$klanten = $klant->getKlanten();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Klanten</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body> 

<div class="container"> 
    <h1>Klanten</h1>
    <a href="add-klant.php" class="btn btn-primary mb-3">Klant Toevoegen</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Naam</th>
                <th>E-mail</th>
                <th>Telefoon</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($klanten as $klant): ?>
                <tr>
                    <td><?php echo $klant['klant_id']; ?></td>
                    <td><?php echo $klant['naam']; ?></td>
                    <td><?php echo $klant['email']; ?></td>
                    <td><?php echo $klant['telefoon']; ?></td>
                    <td>
                        <a href="edit-klant.php?id=<?php echo $klant['klant_id']; ?>" class="btn btn-primary">Bewerken</a>
                        <a href="delete-klant.php?id=<?php echo $klant['klant_id']; ?>" class="btn btn-danger">Verwijderen</a>
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
