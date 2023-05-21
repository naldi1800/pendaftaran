<?php

use  App\Model\Jadwal;
use App\Model\Kelas;

if (isset($_POST["tambah"])) {
    Jadwal::Insert($link, $_POST);
    header("Location: index.php?page=jadwal&c=index");
    exit;
}
?>
<div class="col-lg-8 mx-auto border rounded-3 border-primary">
    <h2 class="h2 text-center mt-3">
        Form Mahasiswa
    </h2>
    <form class="row g-3 needs-validation p-3" method="post" novalidate>
        <div class="col-md-2">
            <label for="kode_kelas" class="form-label">Kode Kelas</label>
            <select id="kode_kelas" name="kode_kelas" class="form-select" required>
                <option value="" disabled selected>Pilih Kelas</option>
                <?php
                $kelas = Kelas::GetAll($link);
                foreach ($kelas as $k):
                    ?>
                    <option value="<?= $k['Kode_Kelas'] ?>" data-mk="<?= $k['Nama_Matakuliah'] ?>"
                            data-dosen="<?= $k['Nama_Dosen'] ?>"><?= $k['Kode_Kelas'] ?></option>
                <?php endforeach; ?>
            </select>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Silahkan Pilih Kelas
            </div>
        </div>
        <div class="col-md-5">
            <label for="nama_dosen" class="form-label">Dosen</label>
            <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" required readonly>
        </div>
        <div class="col-md-5">
            <label for="nama_matakuliah" class="form-label">Matakuliah</label>
            <input type="text" class="form-control" id="nama_matakuliah" name="nama_matakuliah" required readonly>
        </div>

        <div class="col-md-6">
            <label for="hari" class="form-label">Hari</label>

            <select name="hari" id="hari" class="form-select" required>
                <option value="" selected disabled>Pilih Hari</option>
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jumat">Jumat</option>
                <option value="Sabtu">Sabtu</option>
            </select>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Silahkan Pilih Hari
            </div>
        </div>
        <div class="col-md-6">
            <label for="jam" class="form-label">Jam</label>
            <select name="jam" id="jam" class="form-select" required>
                <option value="" selected disabled>Pilih Jam</option>
                <option value="07:30-09:10">07:30-09:10</option>
                <option value="09:20-11:00">09:20-11:00</option>
                <option value="11:10-12:50">11:10-12:50</option>
                <option value="13:40-15:10">13:40-15:20</option>
                <option value="15:40-17:00">15:40-17:00</option>
            </select>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Silahkan Pilih Jam
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit" name="tambah">Save</button>
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
    })()

    var kelas = document.querySelector('#kode_kelas');
    var hari = document.querySelector("#hari");
    var jam = document.querySelector("#jam");

    dselect(kelas, {
        search: true
    });

    dselect(hari, {
        search: true
    });

    dselect(jam, {
        search: true
    });


    kelas.onchange = function (event) {
        var kodekelas = document.getElementById("kode_kelas");
        var dosen = document.getElementById("nama_dosen");
        var matakuliah = document.getElementById("nama_matakuliah");


        for (var i = 0; i < kodekelas.options.length; i++) {
            if (event.target.value === kodekelas.options[i].value) {
                dosen.value = kodekelas.options[i].dataset.dosen;
                matakuliah.value = kodekelas.options[i].dataset.mk;
                // nama = kodekelas.options[i].dataset.nama;
            }
        }
        //
        // if (mk.value !== nama) {
        //     mk.value = "";
        // } else {
        //     kodekelas.value = kode.value + "-" + namakelas.value;
        // }

    };

</script>
