<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="<?= BASEURL ?>/TP/css/bootstrap.min.css" rel="stylesheet">
<!--    <script src="--><?//= BASEURL ?><!--/TP/js/bootstrap.bundle.min.js"></script>-->

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Select2 -->
    <link href="<?= BASEURL ?>/TP/Select2/css/select2.min.css" rel="stylesheet"/>
    <script src="<?= BASEURL ?>/TP/Select2/js/select2.min.js"></script>

    <!-- Dselect -->
    <script src="<?= BASEURL ?>/TP/dselect.js"></script>


    <!-- Select2 JS -->

    <!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
    <!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"-->
    <!--            integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>-->
    <!--    <link rel="stylesheet"-->
    <!--          href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css"-->
    <!--          integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous"/>-->

    <title>Admin | <?= $page ?></title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="?page=Home&c=index">
            <img src="<?= BASEURL ?>/TP/Image/Icon/qrcode_icon_dark.gif" alt="" class="bg-transparent" width="30">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= ($page == 'Home') ? 'active' : '' ?>" aria-current="page"
                       href="?page=home&c=index">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($page == 'Mahasiswa') ? 'active' : '' ?>" href="?page=mahasiswa&c=index">Mahasiswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($page == 'Dosen') ? 'active' : '' ?>"
                       href="?page=dosen&c=index">Dosen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($page == 'Matakuliah') ? 'active' : '' ?>"
                       href="?page=matakuliah&c=index">Matakuliah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($page == 'Kelas') ? 'active' : '' ?>"
                       href="?page=kelas&c=index">Kelas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($page == 'Jadwal') ? 'active' : '' ?>"
                       href="?page=jadwal&c=index">Jadwal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($page == 'Absensi') ? 'active' : '' ?>"
                       href="?page=absensi&c=index">Absensi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($page == 'Inti') ? 'active' : '' ?>"
                       href="?page=inti&c=index">Inti</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($page == 'kmeans') ? 'active' : '' ?>"
                       href="?page=kmeans&c=index">k-means</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                       href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class=" shadow p-3 mb-5 mt-2 bg-light rounded">
        <?php require_once "App\Image\Icon\Svg File.php" ?>
        <?= \App\Contorller\Alert::Get(); ?>

        <nav class="mb-3"
             style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
             aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <?php if ($content != "index"): ?>
                        <a href="?page=<?= $page ?>&c=index"><?= $page ?></a>
                    <?php else : ?>
                        <!--                        --><? //= $page ?>
                    <?php endif; ?>
                </li>
                <?php if ($content != "index"): ?>
                    <li class="breadcrumb-item active" aria-current="page"><?= $content ?></li>
                <?php endif; ?>
            </ol>
        </nav>



