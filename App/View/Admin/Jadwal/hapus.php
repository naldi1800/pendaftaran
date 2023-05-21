<?php
    if($_GET['id'])
        \App\Model\Jadwal::Delete($link, $_GET['id']);

    header("location: " . BASEURL . "/index.php?page=jadwal&c=index");
    exit;