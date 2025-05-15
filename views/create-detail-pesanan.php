<?php
require_once __DIR__ . '/../models/DetailPesanan.php';
require_once __DIR__ . '/../models/Pesanan.php';
require_once __DIR__ . '/../models/Produk.php';

use models\DetailPesanan;
use models\Pesanan;
use models\Produk;

if(isset($_POST['submit'])){
    $data = [
        'pesanan_id' => $_POST['pesanan_id'],
        'produk_id' => $_POST['produk_id'],
        'jumlah' => $_POST['jumlah'],
    ];
    
    DetailPesanan::create($data);
    header("Location: list-detail-pesanan.php");
    exit;
}

$list_detail_pesanan = DetailPesanan::get();
$list_pesanan = Pesanan::get();
$list_produk = Produk::get();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Praktikum 06</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="../public/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="dashboard.php">Praktikum 06</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Main Menu</div>
                            <a class="nav-link" href="list-detail-pesanan.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                                User
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Azhar Maulana Achmad
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Add User</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="list-detail-pesanan.php">User</a></li>
                            <li class="breadcrumb-item active">Add User</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Add User
                            </div>
                            <div class="card-body">
                                <form action="create-detail-pesanan.php"method="POST">
                                    <div class="mb-3">
                                        <label for="jumlah" class="form-label">Jumlah</label>
                                        <input type="text" class="form-control" id="jumlah" 
                                        name="jumlah" required>
                                    </div>
                                    <div class="mb-3">
                                    <label for="pesanan_id" class="form-label">Pesanan Id</label>
                                    <select class="form-select" id="pesanan_id" name="pesanan_id" required>
                                        <option value="">-- Pilih Pesanan Id --</option>
                                        <?php foreach ($list_pesanan as $item) : ?>
                                            <option value="<?= $item['id'] ?>"><?= htmlspecialchars($item['id']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="produk_id" class="form-label">Produk Id</label>
                                    <select class="form-select" id="produk_id" name="produk_id" required>
                                        <option value="">-- Pilih Produk Id --</option>
                                        <?php foreach ($list_produk as $item) : ?>
                                            <option value="<?= $item['id'] ?>"><?= htmlspecialchars($item['id']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                    <a href="list-detail-pesanan.php" class="btn btn-secondary"><i class="fas 
                                    fa-arrow-left"></i> Back</a>
                                    <button type="submit" name="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i></i> Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; PW2 <?= date('Y') ?></div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../public/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="../public/js/datatables-simple-demo.js"></script>
    </body>
</html>