<?php

use  App\Model\Dosen;

if (isset($_POST["tambah"])) {
    Dosen::Insert($link, $_POST);
    header("Location: index.php?page=dosen&c=index");
    exit;
}
?>
<div class="col-lg-8 mx-auto border rounded-3 border-primary">
    <h2 class="h2 text-center mt-3">
        Form Dosen
    </h2>
    <form class="row g-3 needs-validation p-3" method="post" novalidate>
        <div class="col-md-4">
            <label for="nidn" class="form-label">NIDN</label>
            <input type="text" class="form-control" id="nidn" name="nidn" maxlength="10" minlength="6"
                   required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter in the student's stb, a minimum of 6 digits and a maximum of 10 digits
            </div>
        </div>

        <div class="col-md-8">
            <label for="nama_dosen" class="form-label">Nama Dosen</label>
            <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" minlength="3" required>
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
