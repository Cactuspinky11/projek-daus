<?php
require_once __DIR__ . '/../models/Pembayaran.php';

use models\Pembayaran;

if (!isset($_GET['id'])) {
    header("Location: list-pembayaran.php");
    exit;
}

$pembayaran = Pembayaran::find($_GET['id']);

if(!$pembayaran) {
    header("Location: list-pembayaran.php");
    exit;
}

Pembayaran::delete($pembayaran['id']);
header("Location: list-pembayaran.php");