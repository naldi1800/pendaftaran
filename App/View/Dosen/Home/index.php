<?php

use App\Model\Kelas;
use App\Model\Inti;
use App\Model\Pertemuan;


$kelas = Kelas::GetAllWithDosen($link, $_SESSION['NIDN']);
$defaultKelas = "";
foreach ($kelas as $k) {
    $defaultKelas = $k['Kode_Kelas'];
}
if (!isset($_SESSION['KELAS'])) {
    $_SESSION['KELAS'] = $defaultKelas;
}
//var_dump($_SESSION);
?>

<div>
    <h6>
        <p>NIDN : <?= $_SESSION['NIDN'] ?></p>
        <p>Dosen : <?= $_SESSION['NAMA_DOSEN'] ?></p>
    </h6>
</div>

<div class="row">
    <div class="col">
        <div class="card col-md-12 text-black border-secondary">
            <div class="card-header text-center"><h5>Daftar Kelas</h5></div>
            <ul class="list-group list-group-flush border-1">
                <?php
                foreach ($kelas as $k):
                    if ($_SESSION['KELAS'] == $k['Kode_Kelas']):
                        ?>
                        <a href="?page=home&c=setkelas&kelas=<?= $k['Kode_Kelas'] ?>"
                           class="list-group-item btn bg-secondary text-white">
                            <?= $k['Kode_Kelas'] ?>
                        </a>
                    <?php else : ?>
                        <a href="?page=home&c=setkelas&kelas=<?= $k['Kode_Kelas'] ?>"
                           class="list-group-item btn btn-secondary">
                            <?= $k['Kode_Kelas'] ?>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
                <?php if ($kelas == null): ?>
                    <li class="list-group-item">
                        Anda Tidak Memiliki Kelas Apapun
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    <div class="col">
        <div class="card card col-md-12 text-black border-secondary">
            <div class="card-header text-center"><h5>Mahasiswa</h5></div>
            <div class="card-body">
                <?php
                $mhs = Inti::GetAllWithKelas($link, $_SESSION['KELAS']);
                $mhs = ($mhs == null)? 0 :count($mhs);
                ?>
                <p class="card-text">
                    Jumlah : <?= $mhs ?>
                </p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card card col-md-12 text-black border-secondary">
            <div class="card-header text-center"><h5>Absensi</h5></div>
            <div class="card-body">
                <?php
                $pert = Pertemuan::GetWithKelas($link, $_SESSION['KELAS']);
                $pert = ($pert == null)? 0 :count($pert);

                ?>
                <p class="card-text">
                    Total Pertemuan : <?= $pert ?>
                </p>
            </div>
        </div>
    </div>
</div>
