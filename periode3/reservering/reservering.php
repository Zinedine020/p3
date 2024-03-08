<?php
include "../db.php";
include "../navbar.php";
class Reservering {
    private $dbh;

    public function __construct() {
        $this->dbh = new DB('restaurant');
    }

    public function addReservering($klant_id, $tafel_id, $datum, $tijd, $aantal_personen) {
        $sql = "INSERT INTO reserveringen (klant_id, tafel_id, datum, tijd, aantal_personen) VALUES (?, ?, ?, ?, ?)";
        $placeholders = [$klant_id, $tafel_id, $datum, $tijd, $aantal_personen];
        $stmt = $this->dbh->execute($sql, $placeholders);
        return $stmt;
    }

    public function getReserveringen() {
        $sql = "SELECT * FROM reserveringen";
        $stmt = $this->dbh->execute($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getReserveringById($reservering_id) {
        $sql = "SELECT * FROM reserveringen WHERE reservering_id = ?";
        $placeholders = [$reservering_id];
        $stmt = $this->dbh->execute($sql, $placeholders);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateReservering($reservering_id, $klant_id, $tafel_id, $datum, $tijd, $aantal_personen) {
        $sql = "UPDATE reserveringen SET klant_id = ?, tafel_id = ?, datum = ?, tijd = ?, aantal_personen = ? WHERE reservering_id = ?";
        $placeholders = [$klant_id, $tafel_id, $datum, $tijd, $aantal_personen, $reservering_id];
        $stmt = $this->dbh->execute($sql, $placeholders);
        return $stmt;
    }

    public function deleteReservering($reservering_id) {
        $sql = "DELETE FROM reserveringen WHERE reservering_id = ?";
        $placeholders = [$reservering_id];
        $stmt = $this->dbh->execute($sql, $placeholders);
        return $stmt;
    }
}
?>
