<?php
require_once __DIR__ . '/../models/produk.php';

use models\Produk;

if(!isset($_GET['id'])){
    header("Location: list-produk.php");
    exit;
}

$produk = Produk::find($_GET['id']);

if(!$produk){
    header("Location: list-produk.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Project 01</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="../public/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="dashboard.php">Project 01</a>
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
                            <a class="nav-link" href="list-produk.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                                Detail Produk
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Muhammad Firdaus
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Detail Produk</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="list-produk.php">Detail Produk</a></li>
                            <li class="breadcrumb-item active">Detail Produk</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Detail Produk
                            </div>
                            <div class="card-body">
                                <table class="table table-boarder">
                                    <tr>
                                        <th>Kode</th>
                                        <td><?= $produk['kode'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nama</th>
                                        <td><?= $produk['nama'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Deskripsi</th>
                                        <td><?= $produk['deskripsi'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Harga</th>
                                        <td><?= $produk['harga'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Stok</th>
                                        <td><?= $produk['stok'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Produk Id</th>
                                        <td><?= $produk['jenis_produk_id'] ?></td>
                                    </tr>
                                </table>

                                <div class="mt-3">
                                    <a href="list-produk.php" class="btn btn-secondary"><i class="fas 
                                    fa-arrow-left"></i> Back</a>
                                    <a href="edit-produk.php?id=<?= $produk['id'] ?>" class="btn btn-warning"><i class="fas 
                                    fa-edit"></i> Edit</a>
                                    <a href="delete-produk.php?id=<?= $produk['id'] ?>" class="btn btn-danger"><i class="fas 
                                    fa-trash"></i> Delete</a>
                                </div>
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