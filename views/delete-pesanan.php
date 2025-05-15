<?php
require_once __DIR__ . '/../models/Pesanan.php';

use models\Pesanan;

if (!isset($_GET['id'])) {
    header("Location: list-pesanan.php");
    exit;
}

$pesanan = Pesanan::find($_GET['id']);

if(!$pesanan) {
    header("Location: list-pesanan.php");
    exit;
}

Pesanan::delete($pesanan['id']);
header("Location: list-pesanan.php");
