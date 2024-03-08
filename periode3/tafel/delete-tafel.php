<?php
include "../db.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    // Verwerk het verwijderen van de tafel
    $tafel_id = $_GET['id'];
    $stmt = $myDb->execute("DELETE FROM tafels WHERE tafel_id = ?", [$tafel_id]);
    if ($stmt) {
        // Redirect naar de weergave van tafels met een succesmelding
        header("Location: view-tafel.php?success=1");
        exit();
    } else {
        echo "Er is een fout opgetreden bij het verwijderen van de tafel.";
    }
} else {
    echo "Geen tafel-id opgegeven om te verwijderen.";
}
?>
