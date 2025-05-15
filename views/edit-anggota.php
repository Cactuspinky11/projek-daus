<?php
require_once __DIR__ . '/../models/Anggota.php';

use models\Anggota;

if (!isset($_GET['id'])) {
    header("Location: list-anggota.php");
    exit;
}

$anggota = Anggota::find($_GET['id']);

if (!$anggota) {
    header("Location: list-anggota.php");
    exit;
}

if (isset($_POST['submit'])) {
    $data = [
        'id' => intval($_GET['id']),
        'status_aktif' => intval($_POST['status_aktif']),
        'pegawai_id' => intval($_POST['pegawai_id']),
        'kartu_diskon_id' => intval($_POST['kartu_diskon_id']),
    ];

    Anggota::update($data);
    header("Location: list-anggota.php");
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
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
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
                            User
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
                    <h1 class="mt-4">Edit Anggota</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="list-anggota.php">Edit Anggota</a></li>
                        <li class="breadcrumb-item active">Edit Anggota</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Edit Anggota
                        </div>
                        <div class="card-body">
                            <form action="edit-anggota.php?id=<?= $anggota['id'] ?>" method="POST">
                                <div class="mb-3">
                                    <label for="status_aktif" class="form-label">Status Aktif</label>
                                    <input type="number" class="form-control" id="status_aktif"
                                        name="status_aktif" value="<?= $anggota['status_aktif'] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="pegawai_id" class="form-label">Pegawai Id</label>
                                    <input type="number" class="form-control" id="pegawai_id"
                                        name="pegawai_id" value="<?= $anggota['pegawai_id'] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="kartu_diskon_id" class="form-label">Kartu Diskon Id</label>
                                    <input type="number" class="form-control" id="kartu_diskon_id"
                                        name="kartu_diskon_id" value="<?= $anggota['kartu_diskon_id'] ?>" required>
                                </div>

                                <a href="list-anggota.php" class="btn btn-secondary"><i class="fas 
                                    fa-arrow-left"></i> Back</a>
                                <button type="submit" name="submit" class="btn btn-warning"><i class="fa-solid fa-floppy-disk"></i></i> Update</button>
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