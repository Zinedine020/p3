<?php
include_once "bestelling.php";
$bestelling = new Bestelling();
$klanten = $bestelling->selectKlanten(); // Aanpassing: Gebruik $bestelling in plaats van $factuur
$producten = $bestelling->selectProducten(); // Aanpassing: Gebruik $bestelling in plaats van $factuur
$tafels = $bestelling->selectTafels(); // Aanpassing: Gebruik $bestelling in plaats van $factuur

if (isset($_POST["add"])) {
    // htmlspecialchars is een functie die speciale tekens naar HTML-entiteiten omzet
    $klant_id = htmlspecialchars($_POST["klantnaam"]);
    $product_id = htmlspecialchars($_POST["producten"]);
    $tafel_id = htmlspecialchars($_POST["tafel"]);
    $datum = date("Y-m-d");
    $tijd = htmlspecialchars($_POST["tijd"]);

    // Haal de geselecteerde productprijs uit de database
    $product = $bestelling->selectProducten($product_id); // Aanpassing: Gebruik $bestelling in plaats van $factuur
    $prijs_per_stuk = $product["prijs_per_stuk"];
    $aantal = 1; // Standaard wordt één stuk toegevoegd aan de factuur

    // Voeg de bestelling toe aan de database
    $bestelling->addBestelling($klant_id, $product_id, $aantal, $datum); // Aanpassing: Gebruik $bestelling in plaats van $factuur
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<title>Factuur Toevoegen</title>
</head>
<body>
<h1 class="text-center">Factuur Toevoegen</h1>
<div class="d-grid gap-2 m-4 d-md-flex justify-content-md-center">
    <a href="view-factuur.php" class="btn btn-primary">Bekijk Factuur</a>
</div>
<form method="post">
    <div class="form-group px-5">
        <label for="klantnaam" class="form-label">Klantnaam</label>
        <select name="klantnaam" class="form-select">
            <?php foreach ($klanten as $klant) : ?>
                <option value="<?php echo $klant["klant_id"] ?>">
                    <?php echo $klant["naam"] ?>
                </option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group px-5">
        <label for="producten" class="form-label">Producten</label>
        <select name="producten" class="form-select">
            <?php foreach ($producten as $product) : ?>
                <option value="<?php echo $product["product_id"] ?>">
                    <?php echo $product["omschrijving"] ?>
                </option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group px-5">
        <label for="tafel" class="form-label">Tafel</label>
        <select name="tafel" class="form-select">
            <?php foreach ($tafels as $tafel) : ?>
                <option value="<?php echo $tafel["tafel_id"] ?>">
                    <?php echo $tafel["tafelnummer"] ?>
                </option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group px-5">
        <label for="tijd" class="form-label">Tijd</label>
        <select name="tijd" class="form-select">
            <option value="8">8:00 uur</option>
            <option value="10">10:00 uur</option>
            <option value="12">12:00 uur</option>
            <option value="14">14:00 uur</option>
        </select>
    </div>
    <div class="form-group pt-2 px-5">
        <button type="submit" class="btn btn-primary" name="add">Toevoegen</button>
    </div>
</form>
</body>
</html>
