<?php
include "rekening.php"; // Inclusief de Rekening-klasse

// Controleer of een rekening ID is meegegeven in de querystring
if (isset($_GET['id'])) {
    $rekening_id = $_GET['id'];

    // Maak een instantie van de Rekening-klasse
    $rekening = new Rekening();

    // Voer de verwijdering uit
    $result = $rekening->deleteRekening($rekening_id);

    if ($result) {
        // Redirect naar de view-rekening.php met een succesmelding
        header("Location: view-rekening.php?success=1");
        exit();
    } else {
        echo "Er is een fout opgetreden bij het verwijderen van de rekening.";
    }
} else {
    echo "Geen rekening ID opgegeven om te verwijderen.";
    exit();
}
?>
