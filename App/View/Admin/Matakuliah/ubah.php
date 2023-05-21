<?php

use  App\Model\Matakuliah;


if (isset($_POST["ubah"])) {
    Matakuliah::Update($link, $_POST['id'], $_POST);
    header("Location: index.php?page=matakuliah&c=index");
    exit;
}

if (isset($_GET['id'])) {
    $kode_mk = $_GET['id'];
    $data = Matakuliah::GetWithId($link, $kode_mk);
    ?>
    <div class="col-lg-8 mx-auto border rounded-3 border-primary">
        <h2 class="h2 text-center mt-3">
            Form Ubah Matakuliah
        </h2>
        <form class="row g-3 needs-validation p-3" method="post" novalidate>
            <input type="text" class="form-control" id="id" name="id" value="<?= $kode_mk ?>" required hidden>
            <div class="col-md-4">
                <label for="kode_mk" class="form-label">Kode Matakuliah</label>
                <input type="text" class="form-control" id="kode_mk" name="kode_mk" maxlength="5"
                       minlength="5" value="<?= $data['Kode_MK'] ?>" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please enter in the student's stb, a minimum of 6 digits and a maximum of 10 digits
                </div>
            </div>

            <div class="col-md-8">
                <label for="nama_mk" class="form-label">Nama Matakuliah</label>
                <input type="text" class="form-control" id="nama_mk" name="nama_mk" minlength="3"
                       value="<?= $data['Nama_Matakuliah'] ?>" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please enter in the student's name and at least 3 letters
                </div>
            </div>
            <div class="col-md-8">
                <label for="semester" class="form-label">Semester</label>
                <input type="text" class="form-control" id="semester" name="semester"
                       value="<?= $data['Semester'] ?>" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please enter in the student's name and at least 3 letters
                </div>
            </div>
            <div class="col-md-4">
                <label for="sks" class="form-label">SKS</label>
                <input type="text" class="form-control" id="sks" name="sks" value="<?= $data['SKS'] ?>"
                       required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please enter in the student's name and at least 3 letters
                </div>
            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit" name="ubah">Save</button>
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

    </script>
    <?php
} else {
    header("Location: " . BASEURL . "/index.php?page=mahasiswa&c=index");
    exit;
}
?>