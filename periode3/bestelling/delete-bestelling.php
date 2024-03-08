<?php
include "bestelling.php";

// Maak een instantie van de Bestelling class
$bestelling = new Bestelling();

// Controleer of een bestelling ID is meegegeven in de querystring
if (isset($_GET['id'])) {
    $bestelling_id = $_GET['id'];

    // Verwijder de bestelling
    $result = $bestelling->deleteBestelling($bestelling_id);

    if ($result) {
        // Redirect naar de view-bestelling.php met een succesmelding
        header("Location: view-bestelling.php?success=1");
        exit();
    } else {
        echo "Er is een fout opgetreden bij het verwijderen van de bestelling.";
    }
} else {
    echo "Geen bestelling ID opgegeven om te verwijderen.";
    exit();
}
?>
