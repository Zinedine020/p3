<?php
include "../db.php";
class Rekening {
    private $dbh;

    public function __construct() {
        $this->dbh = new DB('restaurant');
    }

    public function addRekening($klant_id, $bedrag, $datum) {
        $sql = "INSERT INTO rekeningen (klant_id, bedrag, datum) VALUES (?, ?, ?)";
        $placeholders = [$klant_id, $bedrag, $datum];
        $stmt = $this->dbh->execute($sql, $placeholders);
        return $stmt;
    }

    public function getRekeningen() {
        $sql = "SELECT * FROM rekeningen";
        $stmt = $this->dbh->execute($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRekeningById($rekening_id) {
        $sql = "SELECT * FROM rekeningen WHERE rekening_id = ?";
        $placeholders = [$rekening_id];
        $stmt = $this->dbh->execute($sql, $placeholders);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateRekening($rekening_id, $klant_id, $bedrag, $datum) {
        $sql = "UPDATE rekeningen SET klant_id = ?, bedrag = ?, datum = ? WHERE rekening_id = ?";
        $placeholders = [$klant_id, $bedrag, $datum, $rekening_id];
        $stmt = $this->dbh->execute($sql, $placeholders);
        return $stmt;
    }

    public function deleteRekening($rekening_id) {
        $sql = "DELETE FROM rekeningen WHERE rekening_id = ?";
        $placeholders = [$rekening_id];
        $stmt = $this->dbh->execute($sql, $placeholders);
        return $stmt;
    }
}
?>
