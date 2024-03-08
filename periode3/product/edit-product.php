<?php
include "../db.php"; // Als db.php één niveau hoger is dan de huidige map

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST["product_id"];
    $naam = $_POST["naam"];
    $omschrijving = $_POST["omschrijving"];
    $prijs_per_stuk = $_POST["prijs_per_stuk"];

    $stmt = $myDb->execute("UPDATE producten SET naam = ?, omschrijving = ?, prijs_per_stuk = ? WHERE product_id = ?", [$naam, $omschrijving, $prijs_per_stuk, $product_id]);
    if ($stmt) {
        // Product succesvol bijgewerkt, stuur gebruiker terug naar product.php met een succesmelding
        header("Location: view-product.php?success=1");
        exit(); // Stop de verdere uitvoering van de script
    } else {
        echo "Er is een fout opgetreden bij het bijwerken van het product.";
    }
} else {
    // Controleer of product-id is ingesteld in de querystring
    if (isset($_GET['id'])) {
        $product_id = $_GET['id'];
        $stmt = $myDb->execute("SELECT * FROM producten WHERE product_id = ?", [$product_id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        // Controleer of een product is gevonden met de opgegeven product-id
        if (!$product) {
            echo "Geen product gevonden om te bewerken.";
            exit(); // Stop de uitvoering van de pagina
        }
    } else {
        // Als geen product-id is opgegeven, geef een melding weer en stop de uitvoering van de pagina
        echo "Geen product-id opgegeven om te bewerken.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Product bewerken</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body> 

<div class="container"> 
    <h1>Product bewerken</h1>
    <form action="edit-product.php" method="post">
        <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
        <div class="form-group">
            <label for="naam">Naam</label>
            <input type="text" class="form-control" id="naam" name="naam" value="<?php echo isset($product['naam']) ? $product['naam'] : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="omschrijving">Omschrijving</label>
            <textarea class="form-control" id="omschrijving" name="omschrijving" required><?php echo isset($product['omschrijving']) ? $product['omschrijving'] : ''; ?></textarea>
        </div>
        <div class="form-group">
            <label for="prijs_per_stuk">Prijs per stuk</label>
            <input type="number" step="0.01" class="form-control" id="prijs_per_stuk" name="prijs_per_stuk" value="<?php echo isset($product['prijs_per_stuk']) ? $product['prijs_per_stuk'] : ''; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Bijwerken</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>
</html>
