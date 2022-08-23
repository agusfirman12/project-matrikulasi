<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman <?= $data['judul']; ?></title>
    <link rel="icon" href="<?= BASEURL; ?>/img/icon.png">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">
</head>

<body>
    <div class="main">
        <!-- sidebar -->
        <div class="sidebar">
            <div class="dashboard">
                <div class="icon"><img src="<?= BASEURL; ?>/img/icon.png" width="35px"></div>
                <a href="<?= BASEURL ?>datamahasiswa" class="text-decoration-none">
                    <div class="text">
                        <h2>Dashboard</h2>
                    </div>
                </a>
            </div>
            <div class="items">
                <div class="items-data">
                    <a href="<?= BASEURL ?>datamahasiswa" class="text-decoration-none text-white">
                        <div class="icon"><img src="<?= BASEURL; ?>/img/icons/bxs-user-pin.png"></i></div>
                        <div class="text-items">Data Mahasiswa</div>
                    </a>
                </div>
                <div class="items-data">
                    <a href="<?= BASEURL ?>uploadnilai" class="text-decoration-none text-white">
                        <div class="icon"><img src="<?= BASEURL; ?>/img/icons/bxs-book-content.png"></i></div>
                        <div class="text-items">Upload Nilai</div>
                    </a>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="top-navbar">
                <div class="bx bx-menu" id="menu-icon"></div>
                <div class="welcome">
                    <p>Hallo <?= $data['dosen']['nama_dosen']; ?>,<a href="<?= BASEURL ?>log/logout">Logout</a></p>
                </div>
            </div>