<?php
namespace models;

require_once __DIR__ . '/../config/Connection.php';

use config\Connection;
use PDO;

class KartuDiskon {
    public static function get ()
    {
        $pdo = Connection::make();
        $sql = 'SELECT * FROM kartu_diskon';
        $statement = $pdo->query($sql);
        $statement->execute();
        return $statement->fetchALL(PDO::FETCH_ASSOC);
    }

    public static function create ($data)
    {
        $pdo = Connection::make();
        $sql = 'INSERT INTO kartu_diskon (nama, deskripsi, persen_diskon) VALUES (:nama, 
        :deskripsi, :persen_diskon)';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':nama', $data['nama']);
        $statement->bindParam(':deskripsi', $data['deskripsi']);
        $statement->bindParam(':persen_diskon', $data['persen_diskon']);

        return $statement->execute();
    }

    public static function find($id)
    {
        $pdo = Connection::make();
        $sql = 'SELECT *  FROM kartu_diskon WHERE id = :id';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    public static function update ($data)
    {
        $pdo = Connection::make();
        $sql = 'UPDATE kartu_diskon SET nama = :nama,  deskripsi = :deskripsi, persen_diskon = :persen_diskon WHERE id = :id';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':id', $data['id']);
        $statement->bindParam(':nama', $data['nama']);
        $statement->bindParam(':deskripsi', $data['deskripsi']);
        $statement->bindParam(':persen_diskon', $data['persen_diskon']);

        return $statement->execute();
    }

    public static function delete ($id)
    {
        $pdo = Connection::make();
        $sql = 'DELETE FROM kartu_diskon WHERE id = :id';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':id', $id);

        return $statement->execute();
    }
}