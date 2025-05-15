<?php
require_once __DIR__ . '/../models/Pegawai.php';

use models\Pegawai;

if (!isset($_GET['id'])) {
    header("Location: list-pegawai.php");
    exit;
}

$pegawai = Pegawai::find($_GET['id']);

if(!$pegawai) {
    header("Location: list-pegawai.php");
    exit;
}

Pegawai::delete($pegawai['id']);
header("Location: list-pegawai.php");
