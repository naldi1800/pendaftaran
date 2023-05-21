<?php

use App\Model\Mahasiswa;
use App\Model\Absensi;
use App\Model\Pertemuan;
use App\Model\Inti;
use App\Contorller\Alert;


if (isset($_POST['save'])) {
    $_SESSION['PERTEMUAN'] = (isset($_GET['pert'])) ? "Pertemuan " . $_GET['pert'] : $_SESSION['PERTEMUAN'];
    $_SESSION['ID_PERTEMUAN'] = Pertemuan::GetId($link, $_SESSION['PERTEMUAN'], $_SESSION['KELAS']);
    Absensi::Insert($link, $_POST);
    header("location: " . BASEURL . "/index.php?page=absensi&c=scan&pert=" . $_GET['pert']);
    exit;
}

$data = null;
if (isset($_POST['stbsend'])) {
    $stb = $_POST['stbsend'];
    $data = Mahasiswa::GetWithId($link, $stb);
    $jkl = ($data['Jenis_Kelamin'] == "P") ? "Perempuan" : (($data['Jenis_Kelamin'] == "L") ? "Laki-Laki" : "");
    if ($data == null) {
        \App\Contorller\Alert::Set("Data Mahasiswa", "STB ($stb) tidak ditemukan ", "peringatan");
        header("location: " . BASEURL . "/index.php?page=absensi&c=scan&pert=" . $_GET['pert']);
        exit;
    }
}

$mhs = Inti::GetAllWithKelas($link, $_SESSION['KELAS']);
$jml = 0;
foreach ($mhs as $m):
    if (Absensi::GetWithStbKelasPert($link, $_SESSION['KELAS'], $_SESSION['PERTEMUAN'], $m['STB']) != null) {
        continue;
    } else {
        $jml++;
    }
endforeach;

if ($jml == 0) {
    Alert::Set("Data absensi", "Semua Mahasiswa di pertemuan ini telah diabsensikan", "peringatan");
    header("refresh:1;url=" . BASEURL . "/index.php?page=absensi&c=index&pert=" . $_GET['pert']);
    exit;
}

?>

<h2 class="position-relative">
    Scan Mahasiswa
</h2>

<div class="row">
    <div class="col-md-6">
        <video id="qrcodescanner" width="100%"></video> <!-- KOTAK KAMERA -->
    </div>

    <form method="post" class="col-md-6">

        <div class="col-md-12 mt-2">
            <label for="stb" class="form-label">STB</label>
            <input type="text" name="stb" id="stb" class="form-control"
                   value="<?= ($data != null) ? $data['STB'] : ''; ?>" readonly>
        </div>

        <div class="col-md-12 mt-2">
            <label class="form-label" for="nama">Nama Mahasiswa</label>
            <input type="text" name="nama_mahasiswa" id="nama_mahasiswa" class="form-control"
                   value="<?= ($data != null) ? $data['Nama_Mahasiswa'] : ''; ?>" readonly>
        </div>
        <div class="col-md-12 mt-2">
            <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
            <input type="text" name="jenis_kelamin" id="jenis_kelamin" class="form-control"
                   value="<?= ($data != null) ? $jkl : ''; ?>" readonly>
        </div>
        <div class="col-md-12 mt-2">
            <label for="foto">Foto</label>
            <br>
            <img id="foto" class="img-fluid" src="App/Image/Mahasiswa/<?= ($data != null) ? $data['Foto'] : ''; ?>"
                 alt="No Picture" width="100">
        </div>
        <input type="text" name="keterangan" id="keterangan" value="Hadir" hidden>

        <input type="submit" name="save" value="Absen" class="btn btn-primary form-control mt-2">
    </form>
    <form method="post" hidden>
        <label for="stbsend">STB</label>
        <input type="text" name="stbsend" id="stbsend" class="form-control" readonly>
    </form>

</div>
<!-- //untuk scan// -->
<script>
    // KAMERA SCANNER ON
    let scanner = new Instascan.Scanner({video: document.getElementById("qrcodescanner")});
    Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);
        } else {
            alert("No Camera Found");
        }
    }).catch(function (e) {
        console.error(e);
    });

    // FUNGSI BERHASIL SCAN
    scanner.addListener('scan', function (c) {
        document.getElementById("stbsend").value = c;
        document.forms[1].submit();
    });
</script>