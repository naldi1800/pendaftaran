<?php

use App\Model\Inti;
use App\Model\Absensi;
use App\Model\Pertemuan;
use App\Contorller\Alert;

if (isset($_POST['save'])) {
    $_SESSION['PERTEMUAN'] = (isset($_GET['pert'])) ? "Pertemuan " . $_GET['pert'] : $_SESSION['PERTEMUAN'];
    $_SESSION['ID_PERTEMUAN'] = Pertemuan::GetId($link, $_SESSION['PERTEMUAN'], $_SESSION['KELAS']);
    Absensi::Insert($link, $_POST);
    header("location: " . BASEURL . "/index.php?page=absensi&c=tambah&pert=" . $_GET['pert']);
    exit;
}

?>

<h2 class="position-relative text-center col-md-12">
    Tambah Mahasiswa
</h2>

<div class="">
    <form method="post" class="col-md-6 row mx-auto mt-5">
        <div class="col-md-4">
            <label for="stb" class="form-label">STB Mahasiswa</label>
            <select id="stb" name="stb" class="form-select" required>
                <option value="" disabled selected>Pilih Mahasiswa</option>
                <?php
                $kelas = $_SESSION['KELAS'];
                $pert = (isset($_GET['pert'])) ? "Pertemuan " . $_GET['pert'] : $_SESSION['PERTEMUAN'];
                $mhs = Inti::GetAllWithKelas($link, $kelas);
                $jml = 0;

                foreach ($mhs as $m):
                    if (Absensi::GetWithStbKelasPert($link, $kelas, $pert, $m['STB']) != null) {
                        continue;
                    } else {
                        $jml++;
                        ?>
                        <option value="<?= $m['STB'] ?>" data-img="<?= $m['Foto'] ?>"
                                data-mhs="<?= $m['Nama_Mahasiswa'] ?>"><?= $m['STB'] ?></option>
                    <?php } endforeach; ?>

            </select>
            <?php
            if ($jml == 0) {
                Alert::Set("Data absensi", "Semua Mahasiswa di pertemuan ini telah diabsensikan", "peringatan");
                header("location: " . BASEURL . "/index.php?page=absensi&c=index&pert=" . $_GET['pert']);
                exit;
            }
            ?>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Silahkan Pilih Kelas
            </div>
        </div>

        <div class="col-md-4">
            <label class="form-label" for="nama">Nama Mahasiswa</label>
            <input type="text" name="nama_mahasiswa" id="nama_mahasiswa" class="form-control">
        </div>

        <div class="col-md-4">
            <label for="foto">Foto</label>
            <br>
            <img id="foto" class="img-fluid" src="App/Image/Mahasiswa/<?= ($data != null) ? $data['Foto'] : ''; ?>"
                 alt="No Picture" width="100">
        </div>
        <div class="col-md-12 mt-2">
            <label for="keterangan" class="form-label">Keterangan</label>
            <select class="form-control" type="text" name="keterangan" id="keterangan" required>
                <option value="" selected disabled>Pilih Keterangan</option>
                <option value="Hadir">Hadir</option>
                <option value="Izin">Izin</option>
                <option value="Sakit">Sakit</option>
                <option value="Alpa">Alpa</option>

            </select>

        </div>
        <div class="col-md-12 p-3 mt-2">
            <input type="submit" name="save" value="Absen" class="btn btn-primary col-md-12">
        </div>
    </form>

</div>

<script>
    (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
    })();

    var mahasiswa = document.querySelector('#stb');

    dselect(mahasiswa, {
        search: true
    });


    mahasiswa.onchange = function (event) {

        var stb = document.getElementById("stb");
        var mhs = document.getElementById("nama_mahasiswa");


        for (var i = 0; i < stb.options.length; i++) {
            if (event.target.value === stb.options[i].value) {
                mhs.value = stb.options[i].dataset.mhs;
                document.getElementById("foto").src = "App/Image/Mahasiswa/" + stb.options[i].dataset.img;
            }
        }
    };

</script>