<?php
include "reservering.php"; // Inclusief de Reservering-klasse

// Controleer of een reserverings-ID is meegegeven in de querystring
if (isset($_GET['id'])) {
    $reservering_id = $_GET['id'];

    // Maak een instantie van de Reservering-klasse
    $reservering = new Reservering();

    // Haal de reserveringsgegevens op
    $reserveringData = $reservering->getReserveringById($reservering_id);

    // Controleer of de reservering bestaat
    if ($reserveringData) {
        // Reserveringsgegevens ophalen
        $klant_id = $reserveringData['klant_id'];
        $tafel_id = $reserveringData['tafel_id'];
        $datum = $reserveringData['datum'];
        $tijd = $reserveringData['tijd'];
        $aantal_personen = $reserveringData['aantal_personen'];
        // Voer hier verdere verwerking uit indien nodig (bijvoorbeeld het invullen van formulier met bestaande gegevens)
    } else {
        echo "Geen reservering gevonden met het opgegeven ID.";
        exit();
    }
} else {
    echo "Geen reservering ID opgegeven om te bewerken.";
    exit();
}

// Verwerk formuliergegevens bij verzenden
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Haal de formuliergegevens op
    $klant_id = $_POST["klant_id"];
    $tafel_id = $_POST["tafel_id"];
    $datum = $_POST["datum"];
    $tijd = $_POST["tijd"];
    $aantal_personen = $_POST["aantal_personen"];

    // Voer de update uit
    $result = $reservering->updateReservering($reservering_id, $klant_id, $tafel_id, $datum, $tijd, $aantal_personen);

    if ($result) {
        // Redirect naar de view-reservering.php met een succesmelding
        header("Location: view-reservering.php?success=1");
        exit();
    } else {
        echo "Er is een fout opgetreden bij het bijwerken van de reservering.";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Reservering Bewerken</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body> 

<div class="container"> 
    <h1>Reservering Bewerken</h1>
    <form action="edit-reservering.php?id=<?php echo $reservering_id; ?>" method="post">
        <div class="form-group">
            <label for="klant_id">Klant ID</label>
            <input type="text" class="form-control" id="klant_id" name="klant_id" value="<?php echo $klant_id; ?>" required>
        </div>
        <div class="form-group">
            <label for="tafel_id">Tafel ID</label>
            <input type="text" class="form-control" id="tafel_id" name="tafel_id" value="<?php echo $tafel_id; ?>" required>
        </div>
        <div class="form-group">
            <label for="datum">Datum</label>
            <input type="date" class="form-control" id="datum" name="datum" value="<?php echo $datum; ?>" required>
        </div>
        <div class="form-group">
            <label for="tijd">Tijd</label>
            <input type="time" class="form-control" id="tijd" name="tijd" value="<?php echo $tijd; ?>" required>
        </div>
        <div class="form-group">
            <label for="aantal_personen">Aantal Personen</label>
            <input type="number" class="form-control" id="aantal_personen" name="aantal_personen" value="<?php echo $aantal_personen; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Bijwerken</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
