<?php
include "klant.php";

// Controleer of klant-id is ingesteld in de querystring
$klant_id = isset($_GET['id']) ? $_GET['id'] : null;

if ($klant_id) {
    // Maak een instantie van de Klant class
    $klant = new Klant();

    // Haal de klantgegevens op om weer te geven in het formulier
    $klantData = $klant->getKlantById($klant_id);

    // Controleer of een klant is gevonden met de opgegeven klant-id
    if ($klantData) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Haal de nieuwe gegevens op uit het formulier
            $naam = isset($_POST["naam"]) ? $_POST["naam"] : null;
            $email = isset($_POST["email"]) ? $_POST["email"] : null;
            $telefoon = isset($_POST["telefoon"]) ? $_POST["telefoon"] : null;

            if ($naam && $email && $telefoon) {
                // Update de klantgegevens
                $klant->updateKlant($klant_id, $naam, $email, $telefoon);

                // Stuur de gebruiker terug naar view-klant.php met een succesmelding
                header("Location: view-klant.php?success=1");
                exit();
            } else {
                echo "Vul alle verplichte velden in.";
            }
        }
    } else {
        // Als geen klant is gevonden met de opgegeven klant-id, geef een melding weer
        echo "Geen klant gevonden om te bewerken.";
        exit();
    }
} else {
    // Als geen klant-id is opgegeven, geef een melding weer
    echo "Geen klant-id opgegeven om te bewerken.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Klant Bewerken</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1>Klant Bewerken</h1>
    <form action="edit-klant.php?id=<?php echo $klant_id; ?>" method="post">
        <div class="form-group">
            <label for="naam">Naam</label>
            <input type="text" class="form-control" id="naam" name="naam" value="<?php echo isset($klantData['naam']) ? $klantData['naam'] : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($klantData['email']) ? $klantData['email'] : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="telefoon">Telefoon</label>
            <input type="text" class="form-control" id="telefoon" name="telefoon" value="<?php echo isset($klantData['telefoon']) ? $klantData['telefoon'] : ''; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Bijwerken</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
