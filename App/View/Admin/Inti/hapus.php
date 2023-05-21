<?php
    if(isset($_GET['id']))
        \App\Model\Inti::Delete($link, $_GET['id']);

    header("location: " . BASEURL . "/index.php?page=inti&c=index");
    exit;