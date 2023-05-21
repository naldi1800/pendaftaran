<?php

use  App\Model\Kelas;
use App\Model\Dosen;
use App\Model\Matakuliah;

if (isset($_POST["tambah"])) {
    Kelas::Insert($link, $_POST);
    header("Location: index.php?page=kelas&c=index");
    exit;
}
?>


<div class="col-lg-8 mx-auto border rounded-3 border-primary">
    <h2 class="h2 text-center mt-3">
        Form Kelas
    </h2>
    <form class="row g-3 needs-validation p-3" method="post" novalidate>
        <div class="col-md-4">
            <label for="kode_mk" class="form-label">Kode Matakuliah</label>
            <select id="kode_mk" name="kode_mk" class="form-select" required>
                <option value="" disabled selected>Pilih Matakuliah</option>
                <?php
                $matakuliah = Matakuliah::GetAll($link);
                foreach ($matakuliah as $mk):
                    ?>
                    <option value="<?= $mk['Kode_MK'] ?>"
                            data-nama="<?= $mk['Nama_Matakuliah'] ?>"><?= $mk['Kode_MK'] ?></option>
                <?php endforeach; ?>
            </select>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Silahkan pilih Matakuliah
            </div>
        </div>
        <div class="col-md-8">
            <label for="nama_mk" class="form-label">Nama Matakuliah</label>
            <input type="text" class="form-control" id="nama_mk" name="nama_mk" required readonly>
        </div>
        <div class="col-md-4">
            <label for="nidn" class="form-label">Kode Dosen</label>
            <select id="nidn" name="nidn" class="form-select" required>
                <option value="" disabled selected>Pilih Dosen</option>
                <?php
                $dosen = Dosen::GetAll($link);
                foreach ($dosen as $d):
                    ?>
                    <option value="<?= $d['NIDN'] ?>"
                            data-nama="<?= $d['Nama_Dosen'] ?>"><?= $d['NIDN'] ?></option>
                <?php endforeach; ?>
            </select>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Silahkan pilih Dosen
            </div>
        </div>
        <div class="col-md-8">
            <label for="nama_dosen" class="form-label">Nama Dosen</label>
            <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" required readonly>
        </div>
        <div class="col-md-12">
            <label for="nama_kelas" class="form-label">Nama Kelas</label>
            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" placeholder="A/B/C/.../Z" minlength="1"
                   maxlength="2" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
               Silahkan pilih Kelas
            </div>
        </div>
        <div class="col-md-12">
            <label for="kode_kelas" class="form-label">Kode Kelas</label>
            <input type="text" class="form-control" id="kode_kelas" name="kode_kelas" maxlength="10" minlength="7"
                   required readonly>
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

    var kdmk = document.querySelector('#kode_mk');
    var nidn = document.querySelector('#nidn');
    var kelas = document.querySelector('#nama_kelas');

    dselect(kdmk, {
        search: true
    });

    dselect(nidn, {
        search: true
    });

    kdmk.onchange = function (event) {
        var kode = document.getElementById("kode_mk");
        var mk = document.getElementById("nama_mk");
        var kodekelas = document.getElementById("kode_kelas");
        var namakelas = document.getElementById("nama_kelas");
        var nama = "";
        console.log(event.target.value);

        for (var i = 0; i < kode.options.length; i++) {
            if (event.target.value === kode.options[i].value) {
                mk.value = kode.options[i].dataset.nama;
                nama = kode.options[i].dataset.nama;
            }
        }
        if (mk.value !== nama) {
            mk.value = "";
        } else {
            kodekelas.value = kode.value + "-" + namakelas.value;
        }

    };

    nidn.onchange = function (event) {
        var kode = document.getElementById("nidn");
        var d = document.getElementById("nama_dosen");
        var nama = "";
        console.log(event.target.value);

        for (var i = 0; i < kode.options.length; i++) {
            if (event.target.value === kode.options[i].value) {
                d.value = kode.options[i].dataset.nama;
                nama = kode.options[i].dataset.nama;
            }
        }
        if (d.value !== nama) {
            d.value = "";
        }
    };

    kelas.onchange = function () {
        var kode = document.getElementById("kode_mk");
        var kodekelas = document.getElementById("kode_kelas");
        var namakelas = document.getElementById("nama_kelas");
        namakelas.value = namakelas.value.toUpperCase();
        kodekelas.value = kode.value + "-" + namakelas.value;
    }

</script>
