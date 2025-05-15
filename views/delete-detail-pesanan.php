<?php
require_once __DIR__ . '/../models/DetailPesanan.php';

use models\DetailPesanan;

if (!isset($_GET['id'])) {
    header("Location: list-detail-pesanan.php");
    exit;
}

$detail_pesanan = DetailPesanan::find($_GET['id']);

if(!$detail_pesanan) {
    header("Location: list-detail-pesanan.php");
    exit;
}

DetailPesanan::delete($detail_pesanan['id']);
header("Location: list-detail-pesanan.php");