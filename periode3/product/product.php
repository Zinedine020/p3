<?php
include "../db.php";
include "../navbar.php";
class Product {
    private $dbh;
    
    public function __construct() {
        $this->dbh = new DB('restaurant');
    }
    
    public function addProduct($naam, $omschrijving, $prijs_per_stuk) {
        $sql = "INSERT INTO producten (naam, omschrijving, prijs_per_stuk) VALUES (?, ?, ?)";
        $placeholders = [$naam, $omschrijving, $prijs_per_stuk];
        $stmt = $this->dbh->execute($sql, $placeholders);
        return $stmt;
    }
    
    public function getProducten() {
        $sql = "SELECT * FROM producten";
        $stmt = $this->dbh->execute($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getProductById($product_id) {
        $sql = "SELECT * FROM producten WHERE product_id = ?";
        $placeholders = [$product_id];
        $stmt = $this->dbh->execute($sql, $placeholders);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function updateProduct($product_id, $naam, $omschrijving, $prijs_per_stuk) {
        $sql = "UPDATE producten SET naam = ?, omschrijving = ?, prijs_per_stuk = ? WHERE product_id = ?";
        $placeholders = [$naam, $omschrijving, $prijs_per_stuk, $product_id];
        $stmt = $this->dbh->execute($sql, $placeholders);
        return $stmt;
    }
    
    public function deleteProduct($product_id) {
        $sql = "DELETE FROM producten WHERE product_id = ?";
        $placeholders = [$product_id];
        $stmt = $this->dbh->execute($sql, $placeholders);
        return $stmt;
    }
}
?>
