<?php

use App\Model\Inti;
use App\Model\Kelas;
use App\Model\Mahasiswa;

if (isset($_POST['save'])) {
    Inti::Insert($link, $_POST);
    header("Location: index.php?page=inti&c=index");
    exit;
}

?>
<link href="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.css" rel="stylesheet">

<script src="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.20.2/dist/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>


<h2 class="position-relative">
    Data Inti
</h2>


<table class="table table-hover table-bordered">
    <thead class="bg-secondary text-white text-center">
    <tr>
        <th>No</th>
        <th>Kode Kelas</th>
        <th>Nama Matakuliah</th>
        <th>Nama Dosen</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php

    $i = 0;

    $datas = Kelas::GetAll($link);
    foreach ($datas as $data) :
        $i++;
        ?>
        <tr>
            <td width="5%" class="text-center"><?= $i ?></td>
            <td width="25%" class="text-center"><?= $data['Kode_Kelas'] ?></td>
            <td width="25%"><?= $data['Nama_Matakuliah'] ?></td>
            <td width="25%"><?= $data['Nama_Dosen'] ?></td>
            <td width="20%" class="">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#m_<?= $data['Kode_Kelas'] ?>">
                    Lihat Mahasiswa
                </button>
            </td>
        </tr>
        <div class="modal fade" id="m_<?= $data['Kode_Kelas'] ?>" tabindex="-1" aria-labelledby="labelmhs"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex" id="labelmhs">
                            <div class=" justify-content-between align-items-center">Daftar Mahasiswa</div>
                            <button class="btn badge btn-primary position-absolute end-0 me-5" data-bs-toggle="modal"
                                    data-bs-target="#tm_<?= $data['Kode_Kelas'] ?>" data-bs-dismiss="modal">
                                Tambah
                            </button>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Kelas : <?= $data['Kode_Kelas'] ?>
                        <br>
                        <ul class="list-group mt-3">
                            <?php
                            $mhs = Inti::GetAllWithKelas($link, $data['Kode_Kelas']);
                            if ($mhs != null):
                            foreach ($mhs as $m):
                                ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <?= $m['STB'] ?> | <?= $m['Nama_Mahasiswa'] ?>
                                    <a href="?page=inti&c=hapus&id=<?= $m['Id_Inti']?>" class="badge bg-danger ">delete</a>
                                </li>
                            <?php endforeach;
                            else: ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center text-center">
                                    Tidak Ada Mahasiswa
                                </li>
                            <?php endif; ?>

                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="tm_<?= $data['Kode_Kelas'] ?>" tabindex="-1" aria-labelledby="labeltmhs"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex" id="labeltmhs">
                            Tambah Mahasiswa
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post">
                        <div class="modal-body">
                            <div class="col-md-12">
                                <label for="kode_kelas" class="form-label">Kode Kelas</label>
                                <input type="text" class="form-control" id="kode_kelas" name="kode_kelas"
                                       value="<?= $data['Kode_Kelas'] ?>" readonly>
                            </div>
                            <div class="row">
                                <div class="col col-md-4">
                                    <label for="stb<?= $data['Kode_Kelas'] ?>" class="form-label">STB Mahasiswa</label>
                                    <select id="stb<?= $data['Kode_Kelas'] ?>" name="stb" class="form-select" required>
                                        <option value="" disabled selected>Pilih Mahasiswa</option>
                                        <?php
                                        $mahasiswa = Mahasiswa::GetAll($link);
                                        foreach ($mahasiswa as $m):
                                            $cek = Inti::GetWithStbAndKelas($link, $data['Kode_Kelas'], $m['STB']);
                                            if ($cek != null):
                                                ?>
                                            <?php else: ?>
                                                <option value="<?= $m['STB'] ?>"
                                                        data-nama="<?= $m['Nama_Mahasiswa'] ?>"><?= $m['STB'] ?></option>
                                            <?php endif; endforeach; ?>
                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Silahkan pilih Dosen
                                    </div>
                                </div>
                                <div class="col col-md-8">
                                    <label for="nama_mahasiswa<?= $data['Kode_Kelas'] ?>" class="form-label">Nama
                                        Mahasiswa</label>
                                    <input type="text" class="form-control"
                                           id="nama_mahasiswa<?= $data['Kode_Kelas'] ?>" name="nama_mahasiswa"
                                           readonly>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit" name="save">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <script>
            var stb = document.getElementById("stb<?= $data['Kode_Kelas']?>");
            dselect(stb, {
                search: true
            });

            stb.onchange = function (event) {
                var stb = document.getElementById("stb<?= $data['Kode_Kelas']?>");
                var mhs = document.getElementById("nama_mahasiswa<?= $data['Kode_Kelas']?>");

                for (var i = 0; i < stb.options.length; i++) {
                    if (event.target.value === stb.options[i].value) {
                        mhs.value = stb.options[i].dataset.nama;
                    }
                }
            };
        </script>

    <?php
    endforeach;
    if ($datas == null):
        ?>
        <tr>
            <td class="text-center" colspan="5">
                DATA MASIH KOSONG
            </td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>
