<?php
// Inclusief de Reservering-klasse
include "reservering.php";

// Controleer of de reservering ID is meegegeven in de querystring
if (isset($_GET['id'])) {
    // Instantieer de Reservering-klasse
    $reservering = new Reservering();

    // Haal de reservering ID op uit de querystring
    $reservering_id = $_GET['id'];

    // Probeer de reservering te verwijderen
    $result = $reservering->deleteReservering($reservering_id);

    if ($result) {
        // Redirect naar de view-reservering.php met een succesmelding
        header("Location: view-reservering.php?success=1");
        exit();
    } else {
        echo "Er is een fout opgetreden bij het verwijderen van de reservering.";
    }
} else {
    echo "Geen reservering ID opgegeven om te verwijderen.";
}
?>
