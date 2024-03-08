<?php
include "klant.php";

// Controleer of klant-id is ingesteld in de querystring
if (isset($_GET['id'])) {
    $klant_id = $_GET['id'];

    // Maak een instantie van de Klant class
    $klant = new Klant();

    // Verwijder de klant
    $klant->deleteKlant($klant_id);

    // Stuur de gebruiker terug naar view-klant.php met een succesmelding
    header("Location: view-klant.php?success=2");
    exit();
} else {
    // Als geen klant-id is opgegeven, geef een melding weer
    echo "Geen klant-id opgegeven om te verwijderen.";
    exit();
}
?>
