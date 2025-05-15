<?php
require_once __DIR__ . '/../models/Produk.php';

use models\Produk;

if (!isset($_GET['id'])) {
    header("Location: list-produk.php");
    exit;
}

$produk = Produk::find($_GET['id']);

if(!$produk) {
    header("Location: list-produk.php");
    exit;
}

Produk::delete($produk['id']);
header("Location: list-produk.php");
