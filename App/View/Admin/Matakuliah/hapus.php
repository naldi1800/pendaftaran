<?php
    if($_GET['id'])
        \App\Model\Matakuliah::Delete($link, $_GET['id']);

    header("location: " . BASEURL . "/index.php?page=matakuliah&c=index");
    exit;