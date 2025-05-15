<?php
require_once __DIR__ . '/../models/JenisProduk.php';

use models\JenisProduk;

if (!isset($_GET['id'])) {
    header("Location: list-jenis-produk.php");
    exit;
}

$jenis_produk = JenisProduk::find($_GET['id']);

if(!$jenis_produk) {
    header("Location: list-jenis-produk.php");
    exit;
}

JenisProduk::delete($jenis_produk['id']);
header("Location: list-jenis-produk.php");