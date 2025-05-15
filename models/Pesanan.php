<?php
namespace models;

require_once __DIR__ . '/../config/Connection.php';

use config\Connection;
use PDO;

class Pesanan {
    public static function get ()
    {
        $pdo = Connection::make();
        $sql = 'SELECT * FROM pesanan';
        $statement = $pdo->query($sql);
        $statement->execute();
        return $statement->fetchALL(PDO::FETCH_ASSOC);
    }

    public static function create ($data)
    {
        $pdo = Connection::make();
        $sql = 'INSERT INTO pesanan (tanggal, diskon, status_bayar, anggota_id) VALUES (:tanggal, 
        :diskon, :status_bayar, :anggota_id)';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':tanggal', $data['tanggal']);
        $statement->bindParam(':diskon', $data['diskon']);
        $statement->bindParam(':status_bayar', $data['status_bayar']);
        $statement->bindParam(':anggota_id', $data['anggota_id']);

        return $statement->execute();
    }

    public static function find($id)
    {
        $pdo = Connection::make();
        $sql = 'SELECT *  FROM pesanan WHERE id = :id';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    public static function update ($data)
    {
        $pdo = Connection::make();
        $sql = 'UPDATE pesanan SET tanggal = :tanggal,  diskon = :diskon, status_bayar = :status_bayar WHERE id = :id';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':id', $data['id']);
        $statement->bindParam(':tanggal', $data['tanggal']);
        $statement->bindParam(':diskon', $data['diskon']);
        $statement->bindParam(':status_bayar', $data['status_bayar']);

        return $statement->execute();
    }

    public static function delete ($id)
    {
        $pdo = Connection::make();
        $sql = 'DELETE FROM pesanan WHERE id = :id';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':id', $id);

        return $statement->execute();
    }
}