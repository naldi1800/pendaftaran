<?php
session_start();
//session_destroy();
ob_start();
require_once "App/Controller/config.php";  // memanggil Koneksi
require_once "App/init.php"; // memanggil semua model data

if (isset($_SESSION['isLogin'])) {
    header("Location: index.php?page=home&c=index");
    exit;
}


//CONTENT
require_once "App/View/Login.php";