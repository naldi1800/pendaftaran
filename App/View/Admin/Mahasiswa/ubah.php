<?php

use  App\Model\Mahasiswa;


if (isset($_POST["ubah"])) {

    $dataUpdate["mahasiswa"] = $_POST;
    $dataUpdate["foto"] = (!isset($_POST['chk'])) ? null : $_FILES;
    Mahasiswa::Update($link, $dataUpdate['mahasiswa']['stb_mahasiswa'], $dataUpdate);
    header("Location: index.php?page=mahasiswa&c=index");
    exit;
}

if (isset($_GET['id'])) {
    $stb = $_GET['id'];
    $data = Mahasiswa::GetWithId($link, $stb);
    ?>
    <div class="col-lg-8 mx-auto border rounded-3 border-primary">
        <h2 class="h2 text-center mt-3">
            Form Ubah Mahasiswa
        </h2>
        <form name="ubahdata" class="row g-3 needs-validation p-3" method="post"
              enctype="multipart/form-data"
              novalidate>
            <div class="col-md-4">
                <label for="stb_mahasiswa" class="form-label">STB Mahasiswa</label>
                <input type="text" class="form-control" id="stb_mahasiswa" name="stb_mahasiswa" maxlength="6"
                       minlength="6" value="<?= $data['STB'] ?>" readonly required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please enter in the student's stb, a minimum of 6 digits and a maximum of 6 digits
                </div>
            </div>

            <div class="col-md-8">
                <label for="nama_mahasiswa" class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" minlength="3"
                       value="<?= $data['Nama_Mahasiswa'] ?>"
                       required>
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
                               required <?= ($data['Jenis_Kelamin'] == "L") ? "checked" : "" ?>>
                        <label class="form-check-label" for="jeniskelaminL">Laki Laki</label>
                    </div>
                    <div class="form-check mb-3">
                        <input type="radio" class="form-check-input" id="jeniskelaminP" name="jenis_kelamin" value="P"
                               required <?= ($data['Jenis_Kelamin'] == "P") ? "checked" : "" ?>>
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
                        <option value="<?= $i ?>" <?= ($data['Angkatan'] == $i) ? "selected" : "" ?>><?= $i ?></option>
                    <?php endfor; ?>
                </select>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please enter in the student's name and at least 3 letters
                </div>
            </div>

            <div class="col-md-12">
                <label for="preview" class="form-label" id="labelfoto">
                    Foto
                    <div>
                        <input type="checkbox" onclick="changeimage();" id="chk" name="chk">
                        <label for="chk">Checklist untuk Ubah</label>

                    </div>
                </label>
                <input type="file" accept="image/jpeg, image/png" class="form-control" id="foto" name="foto" hidden>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please enter a student image (only PNG or JPEG)
                </div>
            </div>

            <div class="col-md-2">
                <label for="preview" class="form-label" id="labelprev" hidden>Preview</label>
                <div class=" form-control">
                    <img src="App/Image/Mahasiswa/<?= $data['Foto'] ?>" alt="" id="preview" width="113" height="125"
                         class="mx-auto">
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

        foto.onchange = evt => {
            const [file] = foto.files
            if (file) {
                preview.src = URL.createObjectURL(file)
            }
        }

        function changeimage() {
            var x = document.getElementById("foto");
            if (!x.hidden) {
                x.hidden = true;
                document.getElementById("labelprev").hidden = true;
                document.getElementById("labelfoto").setAttribute("for", "preview");
                x.removeAttribute("required");
            } else {
                x.hidden = false;
                document.getElementById("labelprev").hidden = false;
                document.getElementById("labelfoto").setAttribute("for", "foto");
                x.setAttribute("required", "required");
            }
        }

    </script>
    <?php
} else {
    header("Location: " . BASEURL . "/index.php?page=mahasiswa&c=index");
    exit;
}
?>