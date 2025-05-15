<?php

namespace models;

require_once __DIR__ . '/../config/Connection.php';

use config\Connection;
use PDO;

class Pembayaran
{
    public static function get()
    {
        $pdo = Connection::make();
        $sql = 'SELECT * FROM pembayaran';
        $statement = $pdo->query($sql);
        return $statement->fetchALL(PDO::FETCH_ASSOC);
    }

    public static function create($data)
    {
        $pdo = Connection::make();
        $sql = 'INSERT INTO pembayaran (jumlah_bayar, tanggal, pesanan_id) VALUES (:jumlah_bayar, 
        :tanggal, :pesanan_id)';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':jumlah_bayar', $data['jumlah_bayar']);
        $statement->bindParam(':tanggal', $data['tanggal']);
        $statement->bindParam(':pesanan_id', $data['pesanan_id']);

        return $statement->execute();
    }

    public static function find($id)
    {
        $pdo = Connection::make();
        $sql = 'SELECT *  FROM pembayaran WHERE id = :id';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    public static function update($data)
    {
        $pdo = Connection::make();
        $sql = 'UPDATE pembayaran SET jumlah_bayar = :jumlah_bayar,  tanggal = :tanggal, pesanan_id = :pesanan_id WHERE id = :id';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':id', $data['id']);
        $statement->bindParam(':jumlah_bayar', $data['jumlah_bayar']);
        $statement->bindParam(':tanggal', $data['tanggal']);
        $statement->bindParam(':pesanan_id', $data['pesanan_id']);

        return $statement->execute();
    }

    public static function delete($id)
    {
        $pdo = Connection::make();
        $sql = 'DELETE FROM pembayaran WHERE id = :id';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':id', $id);

        return $statement->execute();
    }
}
