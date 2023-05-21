<?php

use App\Model\Absensi;
use App\Model\Pertemuan;

$prt = Pertemuan::GetWithKelas($link, $_SESSION['KELAS']);
?>
<link href="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.css" rel="stylesheet">

<script src="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.20.2/dist/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>


<h2 class="position-relative">
    Data Absensi
</h2>

<div class="col-md-6 my-3 ms-2">
    <div class="row align-items-start">
        <?php if ($prt != null): ?>
            <div class="col dropdown">
                <a class="btn btn-secondary dropdown-toggle col-md-12" href="#" role="button" id="dropdownMenuLink"
                   data-bs-toggle="dropdown" aria-expanded="false">
                    Pertemuan <?= (isset($_GET['pert'])) ? $_GET['pert'] : '1' ?>

                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <?php

                    foreach ($prt as $pr):
                        ?>
                        <li class="position-relative">
                            <a class="dropdown-item"
                               href="?page=absensi&c=index&pert=<?= str_replace('Pertemuan ', '', $pr['Nama_Pert'] . '') ?>">
                                <?= $pr['Nama_Pert'] ?>
                            </a>
                            <a href="?page=absensi&c=hapuspertemuan&id=<?= $pr['Id_Pert'] ?>"
                               class="badge bg-danger btn position-absolute top-0 end-0 mt-1 me-1">
                                x
                            </a>
                        </li>
                    <?php endforeach; ?>
                    <li>
                        <a href="?page=absensi&c=tambahpertemuan" class="dropdown-item">
                            Tambah Pertemuan
                        </a>
                    </li>
                </ul>
            </div>

        <div class="col">
            <a class="btn btn-secondary col-md-12"
               href="?page=absensi&c=scan&pert=<?= (isset($_GET['pert'])) ? $_GET['pert'] : '1' ?>">
                Scan
            </a>
        </div>
        <div class="col">
            <a class="btn btn-secondary col-md-12"
               href="?page=absensi&c=tambah&pert=<?= (isset($_GET['pert'])) ? $_GET['pert'] : '1' ?>">
                Input Manual
            </a>
        </div>
        <?php else: ?>
            <a href="?page=absensi&c=tambahpertemuan" class="btn btn-secondary col-md-4 ms-2">
                Tambah Pertemuan
            </a>
        <?php endif; ?>
    </div>
</div>

<table class="table table-hover table-bordered">
    <thead class="bg-secondary text-white text-center">
    <tr>
        <th>No</th>
        <th>STB</th>
        <th>Nama Mahasiswa</th>
        <th>Keterangan</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php

    $i = 0;
    $pert = "Pertemuan 1";

    if (isset($_GET['pert'])) {
        $pert = "Pertemuan " . $_GET['pert'];
    }


    $kelas = $_SESSION['KELAS'];
    $_SESSION['PERTEMUAN'] = $pert;
    $_SESSION['ID_PERTEMUAN'] = Pertemuan::GetId($link, $pert, $kelas);

    $datas = Absensi::GetAllWithKelas($link, $kelas, $pert);
    if ($datas != null):
    foreach ($datas as $data) :
        $i++;
        ?>
        <tr>
            <td width="5%" class="text-center"><?= $i ?></td>
            <td width="25%" class="text-center"><?= $data['STB'] ?></td>
            <td width="*"><?= $data['Nama_Mahasiswa'] ?></td>
            <td width="10"><?= $data['Keterangan'] ?></td>
            <td width="20%" class="">
                <center>
                    <a href="?page=absensi&c=hapus&id=<?= $data['Id_Absensi'] ?>&pert=<?= $pert ?>"
                       class="text-center btn btn-danger">
                        Hapus
                    </a>
                </center>
            </td>
        </tr>
    <?php
    endforeach;
else:
        ?>
        <tr>
            <td class="text-center" colspan="5">
                DATA MASIH KOSONG
            </td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>

