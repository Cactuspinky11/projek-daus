<?php
namespace models;

require_once __DIR__ . '/../config/Connection.php';

use config\Connection;
use PDO;

class Anggota {
    public static function get ()
    {
        $pdo = Connection::make();
        $sql = 'SELECT * FROM anggota';
        $statement = $pdo->query($sql);
        return $statement->fetchALL(PDO::FETCH_ASSOC);
    }

    public static function create ($data)
    {
        $pdo = Connection::make();
        $sql = 'INSERT INTO anggota (status_aktif, pegawai_id, kartu_diskon_id) VALUES (:status_aktif, 
        :pegawai_id, :kartu_diskon_id)';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':status_aktif', $data['status_aktif']);
        $statement->bindParam(':pegawai_id', $data['pegawai_id']);
        $statement->bindParam(':kartu_diskon_id', $data['kartu_diskon_id']);

        return $statement->execute();
    }

    public static function find($id)
    {
        $pdo = Connection::make();
        $sql = 'SELECT *  FROM anggota WHERE id = :id';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    public static function update ($data)
    {
        // var_dump($data);
        // die;
        $pdo = Connection::make();
        $sql = 'UPDATE anggota SET status_aktif = :status_aktif,  pegawai_id = :pegawai_id, kartu_diskon_id = :kartu_diskon_id WHERE id = :id';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':id', $data['id']);
        $statement->bindParam(':status_aktif', $data['status_aktif']);
        $statement->bindParam(':pegawai_id', $data['pegawai_id']);
        $statement->bindParam(':kartu_diskon_id', $data['kartu_diskon_id']);

        return $statement->execute();
    }

    public static function delete ($id)
    {
        $pdo = Connection::make();
        $sql = 'DELETE FROM anggota WHERE id = :id';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':id', $id);

        return $statement->execute();
    }
    public static function getUnregistered($excludeId = null)
{
    $pdo = Connection::make();
    $sql = 'SELECT p.* FROM pegawai p 
            LEFT JOIN anggota a ON p.id = a.pegawai_id 
            WHERE a.pegawai_id IS NULL OR p.id = :excludeId';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['excludeId' => $excludeId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

}