<?php
include "../db.php"; // Als db.php één niveau hoger is dan de huidige map

// Voeg een product toe
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

// Haal alle producten op
$stmt = $myDb->execute("SELECT * FROM producten");
$producten = $stmt->fetchAll(PDO::FETCH_ASSOC);
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

    <h2>Productenlijst</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Naam</th>
                <th>Omschrijving</th>
                <th>Prijs per stuk</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($producten as $product): ?>
                <tr>
                    <td><?php echo $product['product_id']; ?></td>
                    <td><?php echo $product['naam']; ?></td>
                    <td><?php echo $product['omschrijving']; ?></td>
                    <td><?php echo $product['prijs_per_stuk']; ?></td>
                    <td>
                        <a href="edit-product.php?id=<?php echo $product['product_id']; ?>" class="btn btn-primary">Bewerken</a>
                        <a href="delete-product.php?id=<?php echo $product['product_id']; ?>" class="btn btn-danger">Verwijderen</a>
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
