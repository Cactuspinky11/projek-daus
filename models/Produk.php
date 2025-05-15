<?php

namespace models;

require_once __DIR__ . '/../config/Connection.php';

use config\Connection;
use PDO;

class Produk
{
    public static function get()
    {
        $pdo = Connection::make();
        $sql = 'SELECT * FROM produk';
        $statement = $pdo->query($sql);
        return $statement->fetchALL(PDO::FETCH_ASSOC);
    }

    public static function create($data)
    {
        $pdo = Connection::make();
        $sql = 'INSERT INTO produk (kode, nama, deskripsi, harga, stok, jenis_produk_id) VALUES (:kode, :nama, :deskripsi, :harga, :stok, :jenis_produk_id)';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':kode', $data['kode']);
        $statement->bindParam(':nama', $data['nama']);
        $statement->bindParam(':deskripsi', $data['deskripsi']);
        $statement->bindParam(':harga', $data['harga']);
        $statement->bindParam(':stok', $data['stok']);
        $statement->bindParam(':jenis_produk_id', $data['jenis_produk_id']);

        return $statement->execute();
    }

    public static function find($id)
    {
        $pdo = Connection::make();
        $sql = 'SELECT *  FROM produk WHERE id = :id';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    public static function update($data)
    {
        $pdo = Connection::make();
        $sql = 'UPDATE produk SET kode = :kode, nama = :nama, deskripsi = :deskripsi, harga = :harga, stok = :stok, jenis_produk_id = :jenis_produk_id WHERE id = :id';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':id', $data['id']);
        $statement->bindParam(':kode', $data['kode']);
        $statement->bindParam(':nama', $data['nama']);
        $statement->bindParam(':deskripsi', $data['deskripsi']);
        $statement->bindParam(':harga', $data['harga']);
        $statement->bindParam(':stok', $data['stok']);
        $statement->bindParam(':jenis_produk_id', $data['jenis_produk_id']);

        return $statement->execute();
    }

    public static function delete($id)
    {
        $pdo = Connection::make();
        $sql = 'DELETE FROM produk WHERE id = :id';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':id', $id);

        return $statement->execute();
    }
}
