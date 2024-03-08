<?php
include "../db.php"; // Als db.php één niveau hoger is dan de huidige map

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $stmt = $myDb->execute("DELETE FROM producten WHERE product_id = ?", [$product_id]);
    if ($stmt) {
        echo "Product succesvol verwijderd!";
    } else {
        echo "Er is een fout opgetreden bij het verwijderen van het product.";
    }
} else {
    echo "Product-id niet opgegeven.";
}
?>
