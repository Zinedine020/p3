<?php
include "../db.php";

class Tafel {
    private $dbh;

    public function __construct() {
        $this->dbh = new DB('restaurant');
    }

    public function addTafel($tafelnummer, $bijzonderheden, $max_aantal_personen) {
        $sql = "INSERT INTO tafels (tafelnummer, bijzonderheden, max_aantal_personen) VALUES (?, ?, ?)";
        $placeholders = [$tafelnummer, $bijzonderheden, $max_aantal_personen];
        $stmt = $this->dbh->execute($sql, $placeholders);
        return $stmt;
    }

    public function getTafels() {
        $sql = "SELECT * FROM tafels";
        $stmt = $this->dbh->execute($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTafelById($tafel_id) {
        $sql = "SELECT * FROM tafels WHERE tafel_id = ?";
        $placeholders = [$tafel_id];
        $stmt = $this->dbh->execute($sql, $placeholders);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateTafel($tafel_id, $tafelnummer, $bijzonderheden, $max_aantal_personen) {
        $sql = "UPDATE tafels SET tafelnummer = ?, bijzonderheden = ?, max_aantal_personen = ? WHERE tafel_id = ?";
        $placeholders = [$tafelnummer, $bijzonderheden, $max_aantal_personen, $tafel_id];
        $stmt = $this->dbh->execute($sql, $placeholders);
        return $stmt;
    }

    public function deleteTafel($tafel_id) {
        $sql = "DELETE FROM tafels WHERE tafel_id = ?";
        $placeholders = [$tafel_id];
        $stmt = $this->dbh->execute($sql, $placeholders);
        return $stmt;
    }
}
?>
