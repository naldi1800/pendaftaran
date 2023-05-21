<?php
    if(isset($_GET['kelas'])){
        $_SESSION['KELAS'] = $_GET['kelas'];
    }

    header("location: " . BASEURL . "/index.php?page=home&c=index");
    exit;