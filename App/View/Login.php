<?php

use App\Model\Login;  //Class login
use App\Contorller\Alert; //Class Alert

if (isset($_POST['signIn'])) {
    $cek = Login::Login($link, $_POST['user'], $_POST['pass'], $_POST['level']);
    if ($cek != null) {
        $_SESSION['isLogin'] = "Login";
        if ($_POST['level'] == "Admin") {
            $_SESSION['ADMIN'] = $cek['id'];
        } else {
            $_SESSION['NIDN'] = $cek['NIDN'];
            $_SESSION['NAMA_DOSEN'] = $cek['Nama_Dosen'];
        }
        Alert::Set("Anda", "Login", "berhasil");
        header("Location: index.php?page=home&c=index");
        exit;
    } else {
        Alert::Set("Anda", "Login | Username/Password Salah", "gagal");
    }
} else if (isset($_POST['signUp'])) {
    $cek = Login::SignUp($link, $_POST['userr'], $_POST['passr']);
    if ($cek != null) {
        $_SESSION['isLogin'] = "Login";
        
        Alert::Set("Anda", "Registrasi", "berhasil");
        header("Location: index.php?page=home&c=index");
        exit;
    } else {
        Alert::Set("Anda", "Login | Username/Password Salah", "gagal");
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="<?= BASEURL ?>/TP/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Select2 -->
    <link href="<?= BASEURL ?>/TP/Select2/css/select2.min.css" rel="stylesheet" />
    <script src="<?= BASEURL ?>/TP/Select2/js/select2.min.js"></script>

    <!-- Dselect -->
    <script src="<?= BASEURL ?>/TP/dselect.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="TP/Login/css/style.css">



    <title>Login</title>
</head>

<body>
    <div class="container-fluid">
        <div class=" shadow p-3 mb-5 mt-2 bg-light rounded">
            <?= \App\Contorller\Alert::Get(); ?>

            <section class="ftco-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center mb-3">
                            <h1 class="heading-section">Pendaftaran Siswa</h1>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-12 col-lg-10">
                            <div class="wrap d-md-flex">
                                <div class="text-wrap p-4 p-lg-5 align-items-center order-md-last">

                                    <!-- <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last"> -->
                                    <div class="text w-100">
                                        <h3 class="mb-4 text-white" id="ket">Sign Up</h3>
                                        <form method="post" class="login-form">
                                            <div class="form-group mb-3">
                                                <label class="label text-white" for="user">Username</label>
                                                <input name="userr" id="userr" type="email" class="form-control bg-white" placeholder="Username" required>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="label  text-white" for="pass">Password</label>
                                                <input name="passr" id="passr" type="password" class="form-control bg-white" placeholder="Password" required>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="label  text-white" for="pass">Re Password</label>
                                                <input name="repassr" id="repassr" type="password" class="form-control bg-white" placeholder="Re Password" required>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="signUp" class="form-control submit px-3 btn btn-white btn-outline-white">
                                                    Sign Up
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="login-wrap p-4 p-lg-5">
                                    <div class="d-flex">
                                        <div class="w-100">
                                            <h3 class="mb-4" id="ket">Sign In</h3>
                                        </div>
                                    </div>
                                    <form method="post" class="signin-form">
                                        <div class="form-group mb-3">
                                            <label class="label" for="user">Username</label>
                                            <input name="user" id="user" type="email" class="form-control" placeholder="Username" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="label" for="pass">Password</label>
                                            <input name="pass" id="pass" type="password" class="form-control" placeholder="Password" required>
                                        </div>
                                        <input type="text" name="level" id="level" value="Admin" hidden>
                                        <div class="form-group">
                                            <button type="submit" name="signIn" class="form-control btn btn-primary btn-outline-primary submit px-3">
                                                Sign In
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script>
        document.getElementById("ch").onclick = function(event) {
            // var cek = document.getElementById("ch").innerHTML;
            // document.getElementById("labeluser").innerHTML = (cek == "Dosen") ? 'NIDN' : 'Username';
            // document.getElementById("user").placeholder = (cek == "Dosen") ? 'NIDN' : 'Username';
            // document.getElementById("ch").innerHTML = (cek == "Dosen") ? 'Admin' : 'Dosen';
            // document.getElementById("ket").innerHTML = (cek != "Dosen") ? 'Admin' : 'Dosen';
            // document.getElementById("level").value = (cek != "Dosen") ? 'Admin' : 'Dosen';
            // document.getElementById("ketbukan").innerHTML = (cek != "Dosen") ? 'bukan admin?' : 'bukan dosen?';
        }
    </script>
    <script src="<?= BASEURL ?>/TP/js/bootstrap.bundle.min.js"></script>
    <script src="TP/Login/js/jquery.min.js"></script>
    <script src="TP/Login/js/popper.js"></script>
    <script src="TP/Login/js/bootstrap.min.js"></script>
    <script src="TP/Login/js/main.js"></script>

</body>

</html>