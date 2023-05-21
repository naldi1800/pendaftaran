<?php

use  App\Model\Dosen;


if (isset($_POST["ubah"])) {
    Dosen::Update($link,  $_POST['nidn'],  $_POST);
    header("Location: index.php?page=dosen&c=index");
    exit;
}

if (isset($_GET['id'])) {
    $stb = $_GET['id'];
    $data = Dosen::GetWithId($link, $stb);
    ?>
    <div class="col-lg-8 mx-auto border rounded-3 border-primary">
        <h2 class="h2 text-center mt-3">
            Form Ubah Dosen
        </h2>
        <form class="row g-3 needs-validation p-3" method="post"
              enctype="multipart/form-data"
              novalidate>
            <div class="col-md-4">
                <label for="nidn" class="form-label">NIDN</label>
                <input type="text" class="form-control" id="nidn" name="nidn" maxlength="10"
                       minlength="6" value="<?= $data['NIDN'] ?>" readonly required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Masukan NIDN Dosen, Minimal 6 Digit Dan Maximal 10 Digit
                </div>
            </div>

            <div class="col-md-8">
                <label for="nama_dosen" class="form-label">Nama Dosen</label>
                <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" minlength="3"
                       value="<?= $data['Nama_Dosen'] ?>"
                       required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Masukan Nama Dosen, Minimal 3 Huruf;
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
    header("Location: " . BASEURL . "/index.php?page=dosen&c=index");
    exit;
}
?>