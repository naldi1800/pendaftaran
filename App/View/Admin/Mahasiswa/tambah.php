<?php

use  App\Model\Mahasiswa;

if (isset($_POST["tambah"])) {
    $data["mahasiswa"] = $_POST;
    $data["foto"] = $_FILES;
    Mahasiswa::Insert($link, $data);
    header("Location: index.php?page=mahasiswa&c=index");
    exit;
}
?>
<div class="col-lg-8 mx-auto border rounded-3 border-primary">
    <h2 class="h2 text-center mt-3">
        Form Mahasiswa Jurusan Informatika
    </h2>
    <form class="row g-3 needs-validation p-3" method="post" enctype="multipart/form-data" novalidate>
        <div class="col-md-4">
            <label for="stb_mahasiswa" class="form-label">STB Mahasiswa</label>
            <input type="text" class="form-control" id="stb_mahasiswa" name="stb_mahasiswa" maxlength="6" minlength="6"
                   required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter in the student's stb, a minimum of 6 digits and a maximum of 6 digits
            </div>
        </div>

        <div class="col-md-8">
            <label for="nama_mahasiswa" class="form-label">Nama Mahasiswa</label>
            <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" minlength="3" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter in the student's name and at least 3 letters
            </div>
        </div>

        <div class="col-md-8">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="jeniskelaminL" name="jenis_kelamin" value="L"
                           required>
                    <label class="form-check-label" for="jeniskelaminL">Laki Laki</label>
                </div>
                <div class="form-check mb-3">
                    <input type="radio" class="form-check-input" id="jeniskelaminP" name="jenis_kelamin" value="P"
                           required>
                    <label class="form-check-label" for="jeniskelaminP">Perempuan</label>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        Please select the gender of the student
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <label for="angkatan" class="form-label">Angkatan</label>
            <select class="form-control" name="angkatan" id="angkatan" required>
                <option value="">Pilih</option>
                <?php for ($i = 1990; $i <= date("Y"); $i++): ?>
                    <option value="<?= $i ?>"><?= $i ?></option>
                <?php endfor; ?>
            </select>
            <!--            <input type="text" class="form-control" id="angkatan" name="angkatan" minlength="4" maxlength="5" required>-->
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter in the student's name and at least 3 letters
            </div>
        </div>

        <div class="col-md-12">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" accept="image/jpeg, image/png" class="form-control" id="foto" name="foto" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter a student image (only PNG or JPEG)
            </div>
        </div>

                <div class="col-12">
            <button class="btn btn-primary" type="submit" name="tambah">Save</button>
        </div>
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

    foto.onchange = evt => {
        const [file] = foto.files
        if (file) {
            preview.src = URL.createObjectURL(file)
        }
    }
</script>
