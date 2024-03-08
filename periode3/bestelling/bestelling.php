<?php
include_once "../db.php";

class Bestelling {
    private $dbh;

    public function __construct() {
        $this->dbh = new DB('restaurant');
    }

    public function selectKlanten() {
        $sql = "SELECT * FROM klanten";
        return $this->dbh->execute($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectProducten() {
        $sql = "SELECT * FROM producten";
        return $this->dbh->execute($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectTafels() {
        $sql = "SELECT * FROM tafels";
        return $this->dbh->execute($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addBestelling($klant_id, $product_id, $aantal, $datum) {
        $sql = "INSERT INTO bestellingen (klant_id, product_id, aantal, datum) VALUES (?, ?, ?, ?)";
        $placeholders = [$klant_id, $product_id, $aantal, $datum];
        return $this->dbh->execute($sql, $placeholders);
    }
}
    ?>