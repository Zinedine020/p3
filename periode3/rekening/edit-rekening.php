<?php
include "rekening.php"; // Inclusief de Rekening-klasse

// Controleer of een rekening ID is meegegeven in de querystring
if (isset($_GET['id'])) {
    $rekening_id = $_GET['id'];

    // Maak een instantie van de Rekening-klasse
    $rekening = new Rekening();

    // Haal de rekeninggegevens op
    $rekeningData = $rekening->getRekeningById($rekening_id);

    // Controleer of de rekening bestaat
    if ($rekeningData) {
        // Rekeninggegevens ophalen
        $klant_id = $rekeningData['klant_id'];
        $bedrag = $rekeningData['bedrag'];
        $datum = $rekeningData['datum'];
        // Voer hier verdere verwerking uit indien nodig (bijvoorbeeld het invullen van formulier met bestaande gegevens)
    } else {
        echo "Geen rekening gevonden met het opgegeven ID.";
        exit();
    }
} else {
    echo "Geen rekening ID opgegeven om te bewerken.";
    exit();
}

// Verwerk formuliergegevens bij verzenden
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Haal de formuliergegevens op
    $klant_id = $_POST["klant_id"];
    $bedrag = $_POST["bedrag"];
    $datum = $_POST["datum"];

    // Maak een instantie van de Rekening-klasse
    $rekening = new Rekening();

    // Voer de update uit
    $result = $rekening->updateRekening($rekening_id, $klant_id, $bedrag, $datum);

    if ($result) {
        // Redirect naar de view-rekening.php met een succesmelding
        header("Location: view-rekening.php?success=1");
        exit();
    } else {
        echo "Er is een fout opgetreden bij het bijwerken van de rekening.";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Rekening Bewerken</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body> 

<div class="container"> 
    <h1>Rekening Bewerken</h1>
    <form action="edit-rekening.php?id=<?php echo $rekening_id; ?>" method="post">
        <div class="form-group">
            <label for="klant_id">Klant ID</label>
            <input type="text" class="form-control" id="klant_id" name="klant_id" value="<?php echo $klant_id; ?>" required>
        </div>
        <div class="form-group">
            <label for="bedrag">Bedrag</label>
            <input type="number" step="0.01" class="form-control" id="bedrag" name="bedrag" value="<?php echo $bedrag; ?>" required>
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
