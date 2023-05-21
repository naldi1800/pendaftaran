<?php
    if($_GET['id'])
        \App\Model\Kelas::Delete($link, $_GET['id']);

    header("location: " . BASEURL . "/index.php?page=kelas&c=index");
    exit;