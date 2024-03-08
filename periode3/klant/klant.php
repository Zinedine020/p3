<?php
include "../db.php";

class Klant {
    private $dbh;
    
    public function __construct() {
        $this->dbh = new DB('restaurant');
    }
    
    public function addKlant($naam, $email, $telefoon) {
        $sql = "INSERT INTO klanten (naam, email, telefoon) VALUES (?, ?, ?)";
        $placeholders = [$naam, $email, $telefoon];
        $stmt = $this->dbh->execute($sql, $placeholders);
        return $stmt;
    }
    
    public function getKlanten() {
        $sql = "SELECT * FROM klanten";
        $stmt = $this->dbh->execute($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getKlantById($klant_id) {
        $sql = "SELECT * FROM klanten WHERE klant_id = ?";
        $placeholders = [$klant_id];
        $stmt = $this->dbh->execute($sql, $placeholders);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function updateKlant($klant_id, $naam, $email, $telefoon) {
        $sql = "UPDATE klanten SET naam = ?, email = ?, telefoon = ? WHERE klant_id = ?";
        $placeholders = [$naam, $email, $telefoon, $klant_id];
        $stmt = $this->dbh->execute($sql, $placeholders);
        return $stmt;
    }
    
    public function deleteKlant($klant_id) {
        $sql = "DELETE FROM klanten WHERE klant_id = ?";
        $placeholders = [$klant_id];
        $stmt = $this->dbh->execute($sql, $placeholders);
        return $stmt;
    }
}
?>
