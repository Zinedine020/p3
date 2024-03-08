<?php
include "db.php";

class Artikel {
    private $dbh;
    private $table = "arikel";

    public function __construct(DB $dbh) {
        $this->dbh = $dbh;
    }

    public function insertArtikel($naam, $prijs) {
        return $this->dbh->execute("INSERT INTO $this->table VALUES (null, ?, ?)", [$naam, $prijs]);
    }

    public function updateArtikel($naam, $prijs, $id) {
        return $this->dbh->execute("UPDATE $this->table SET naam = ?, prijs = ? WHERE artikelCode = ?", [$naam, $prijs, $id]);
    }

    public function deleteArtikel($id) {
        return $this->dbh->execute("DELETE FROM $this->table WHERE artikelCode = ?", [$id]);
    }

    public function getAllArtikel() {
        return $this->dbh->execute("SELECT * FROM $this->table")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOneArtikel($id) {
        return $this->dbh->execute("SELECT * FROM $this->table WHERE artikelCode = ?", [$id])->fetch(PDO::FETCH_ASSOC);
    }
}

?>
