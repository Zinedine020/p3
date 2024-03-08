<?php
include "../db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verwerk de bewerkingsgegevens
    $tafel_id = $_POST["tafel_id"];
    $nieuw_tafelnummer = $_POST["nieuw_tafelnummer"];
    $nieuwe_bijzonderheden = $_POST["nieuwe_bijzonderheden"];
    $nieuw_max_aantal_personen = $_POST["nieuw_max_aantal_personen"];

    $stmt = $myDb->execute("UPDATE tafels SET tafelnummer = ?, bijzonderheden = ?, max_aantal_personen = ? WHERE tafel_id = ?", [$nieuw_tafelnummer, $nieuwe_bijzonderheden, $nieuw_max_aantal_personen, $tafel_id]);
    if ($stmt) {
        // Redirect naar de weergave van tafels met een succesmelding
        header("Location: view-tafel.php?success=1");
        exit();
    } else {
        echo "Er is een fout opgetreden bij het bijwerken van de tafel.";
    }
} else {
    // Controleer of tafel-id is ingesteld in de querystring
    if (isset($_GET['id'])) {
        $tafel_id = $_GET['id'];
        $stmt = $myDb->execute("SELECT * FROM tafels WHERE tafel_id = ?", [$tafel_id]);
        $tafel = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$tafel) {
            echo "Geen tafel gevonden om te bewerken.";
            exit();
        }
    } else {
        echo "Geen tafel-id opgegeven om te bewerken.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Tafel bewerken</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body> 

<div class="container"> 
    <h1>Tafel bewerken</h1>
    <form action="edit-tafel.php" method="post">
        <input type="hidden" name="tafel_id" value="<?php echo $tafel['tafel_id']; ?>">
        <div class="form-group">
            <label for="nieuw_tafelnummer">Nieuw tafelnummer</label>
            <input type="text" class="form-control" id="nieuw_tafelnummer" name="nieuw_tafelnummer" value="<?php echo $tafel['tafelnummer']; ?>" required>
        </div>
        <div class="form-group">
            <label for="nieuwe_bijzonderheden">Nieuwe bijzonderheden</label>
            <textarea class="form-control" id="nieuwe_bijzonderheden" name="nieuwe_bijzonderheden"><?php echo $tafel['bijzonderheden']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="nieuw_max_aantal_personen">Nieuw maximaal aantal personen</label>
            <input type="number" class="form-control" id="nieuw_max_aantal_personen" name="nieuw_max_aantal_personen" value="<?php echo $tafel['max_aantal_personen']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Bijwerken</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
