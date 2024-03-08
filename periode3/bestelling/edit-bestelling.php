<?php
include "bestelling.php";

// Maak een instantie van de Bestelling class
$bestelling = new Bestelling();

// Controleer of een bestelling ID is meegegeven in de querystring
if (isset($_GET['id'])) {
    $bestelling_id = $_GET['id'];

    // Haal de bestellinggegevens op
    $bestellingData = $bestelling->getBestellingById($bestelling_id);

    // Controleer of de bestelling bestaat
    if ($bestellingData) {
        // Bestellinggegevens ophalen
        $klant_id = $bestellingData['klant_id'];
        $product_id = $bestellingData['product_id'];
        $aantal = $bestellingData['aantal'];
        $datum = $bestellingData['datum'];
        // Voer hier verdere verwerking uit indien nodig (bijvoorbeeld het invullen van formulier met bestaande gegevens)
    } else {
        echo "Geen bestelling gevonden met het opgegeven ID.";
        exit();
    }
} else {
    echo "Geen bestelling ID opgegeven om te bewerken.";
    exit();
}

// Verwerk formuliergegevens bij verzenden
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Haal de formuliergegevens op
    $klant_id = $_POST["klant_id"];
    $product_id = $_POST["product_id"];
    $aantal = $_POST["aantal"];
    $datum = $_POST["datum"];

    // Voer de update uit
    $result = $bestelling->updateBestelling($bestelling_id, $klant_id, $product_id, $aantal, $datum);

    if ($result) {
        // Redirect naar de view-bestelling.php met een succesmelding
        header("Location: view-bestelling.php?success=1");
        exit();
    } else {
        echo "Er is een fout opgetreden bij het bijwerken van de bestelling.";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Bestelling Bewerken</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body> 

<div class="container"> 
    <h1>Bestelling Bewerken</h1>
    <form action="edit-bestelling.php?id=<?php echo $bestelling_id; ?>" method="post">
        <div class="form-group">
            <label for="klant_id">Klant ID</label>
            <input type="text" class="form-control" id="klant_id" name="klant_id" value="<?php echo $klant_id; ?>" required disabled>
        </div>
        <div class="form-group">
            <label for="product_id">Product ID</label>
            <input type="text" class="form-control" id="product_id" name="product_id" value="<?php echo $product_id; ?>" required>
        </div>
        <div class="form-group">
            <label for="aantal">Aantal</label>
            <input type="number" class="form-control" id="aantal" name="aantal" value="<?php echo $aantal; ?>" required>
        </div>
        <div class="form-group">
            <label for="datum">Datum</label>
            <input type="date" class="form-control" id="datum" name="datum" value="<?php echo $datum; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Bijwerken</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
