<?php

use  App\Model\Matakuliah;

if (isset($_POST["tambah"])) {
    Matakuliah::Insert($link, $_POST);
    header("Location: index.php?page=matakuliah&c=index");
    exit;
}
?>
<div class="col-lg-8 mx-auto border rounded-3 border-primary">
    <h2 class="h2 text-center mt-3">
        Form Matakuliah
    </h2>
    <form class="row g-3 needs-validation p-3" method="post" novalidate>
        <div class="col-md-4">
            <label for="kode_mk" class="form-label">Kode Matakuliah</label>
            <input type="text" class="form-control" id="kode_mk" name="kode_mk" maxlength="5" minlength="5"
                   required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter in the student's stb, a minimum of 5 digits and a maximum of 5 digits
            </div>
        </div>

        <div class="col-md-8">
            <label for="nama_mk" class="form-label">Nama Matakuliah</label>
            <input type="text" class="form-control" id="nama_mk" name="nama_mk" minlength="3" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter in the student's name and at least 3 letters
            </div>
        </div>
        <div class="col-md-8">
            <label for="semester" class="form-label">Semester</label>
            <input type="text" class="form-control" id="semester" name="semester" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter in the student's name and at least 3 letters
            </div>
        </div>
        <div class="col-md-4">
            <label for="sks" class="form-label">SKS</label>
            <input type="text" class="form-control" id="sks" name="sks" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter in the student's name and at least 3 letters
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

</script>
