<?php
    if($_GET['id'])
        \App\Model\Dosen::Delete($link, $_GET['id']);

    header("location: " . BASEURL . "/index.php?page=dosen&c=index");
    exit;