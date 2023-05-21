<?php
    if (isset($_GET['id']))
        \App\Model\Pertemuan::Delete($link, $_GET['id']);

    if (!isset($_GET['pert']) || !isset($_GET['id'])) {
        header("location: " . BASEURL . "/index.php?page=absensi&c=index");
        exit;
    }

    header("location: " . BASEURL . "/index.php?page=absensi&c=index&pert=" . $_GET['pert']);
    exit;