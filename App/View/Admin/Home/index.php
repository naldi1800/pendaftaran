<?php

use App\Model\Kelas;
use App\Model\Mahasiswa;
use App\Model\Dosen;
use App\Model\Matakuliah;
use App\Model\Jadwal;

use App\Contorller\Fungsi;


?>

<h1 class="col-md-12 text-center mb-4">ADMIN</h1>

<div class="row">
    <div class="col">
        <div class="card col-md-12 text-black border-secondary">
            <div class="card-header text-center"><h5>Mahasiswa</h5></div>
            <div class="card-body">
                <?php
                $mahasiswa = Mahasiswa::GetAll($link);
                $totalmhs = count($mahasiswa);
                ?>
                <p>Total Mahasiswa : <?= $totalmhs ?></p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card card col-md-12 text-black border-secondary">
            <div class="card-header text-center"><h5>Dosen</h5></div>
            <div class="card-body">
                <?php
                $dosen = Dosen::GetAll($link);
                $totaldsn = count($dosen);
                ?>
                <p>Total Dosen : <?= $totaldsn ?></p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card card col-md-12 text-black border-secondary">
            <div class="card-header text-center"><h5>Matakuliah</h5></div>
            <div class="card-body">
                <?php
                $matakuliah = Matakuliah::GetAll($link);
                $totalmk = count($matakuliah);
                ?>
                <p>Total Matakuliah : <?= $totalmk ?></p>
            </div>
        </div>
    </div>
    <div class="row mt-3"></div>
    <div class="col">
        <div class="card card col-md-12 text-black border-secondary">
            <div class="card-header text-center"><h5>Kelas</h5></div>
            <div class="card-body">
                <?php
                $kelas = Kelas::GetAll($link);
                $totalkls = count($kelas);
                ?>
                <p>Total Kelas : <?= $totalkls ?></p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card card col-md-12 text-black border-secondary">
            <div class="card-header text-center"><h5>Jadwal</h5></div>
            <div class="card-body">
                <?php
                $jadwal = Jadwal::GetAll($link);
                $totaljdw = count($jadwal);


                $sekarang = new DateTime();
                $hari = Fungsi::GetHari($sekarang);
                $time = strftime('%I:%M %p', $sekarang->getTimestamp());
                $jam = Fungsi::GetJam($time);

                $totalsdjln = Jadwal::GetWithJam($link, $jam, $hari);
                $totalsdjln = ($totalsdjln == null)? 0 : count($totalsdjln);
                ?>
                <p>Total Jadwal : <?= $totaljdw ?></p>
                <p>Hari, Jam : <?= $hari . " ".$jam?></p>
                <p>Total Sedang Berjalan : <?= $totalsdjln ?> </p>
            </div>
        </div>
    </div>

    <div class="col invisible">
    </div>

</div>
