<?php
    if($_GET['id'])
        \App\Model\Mahasiswa::Delete($link, $_GET['id']);

    header("location: " . BASEURL . "/index.php?page=mahasiswa&c=index");
    exit;