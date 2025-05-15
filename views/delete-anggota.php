<?php
require_once __DIR__ . '/../models/Anggota.php';

use models\Anggota;

if (!isset($_GET['id'])) {
    header("Location: list-anggota.php");
    exit;
}

$anggota = Anggota::find($_GET['id']);

if(!$anggota) {
    header("Location: list-anggota.php");
    exit;
}

Anggota::delete($anggota['id']);
header("Location: list-anggota.php");