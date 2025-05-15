<?php
require_once __DIR__ . '/../models/KartuDiskon.php';

use models\KartuDiskon;

if (!isset($_GET['id'])) {
    header("Location: list-kartu-diskon.php");
    exit;
}

$diskon = KartuDiskon::find($_GET['id']);

if(!$diskon) {
    header("Location: list-kartu-diskon.php");
    exit;
}

KartuDiskon::delete($diskon['id']);
header("Location: list-kartu-diskon.php");
