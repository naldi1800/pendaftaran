<?php

use App\Model\Kelas;
use App\Model\Dosen;
use App\Model\Matakuliah;
use App\Model\Pertemuan;
use App\Model\Absensi;

$prt = Pertemuan::GetWithKelas($link, $_GET['id']);
$dosen = Kelas::GetWithId($link, $_GET['id']);

// if (isset($_POST["tambah"])) {
//     Kelas::Insert($link, $_POST);
//     header("Location: index.php?page=kelas&c=index");
//     exit;
// }
?>


<h2 class="h2 text-center mt-3">
    Data Absensi 
</h2>
<h4>
    Kelas : <?= $_GET['id'] ?>, Dosen :<?= $dosen['Nama_Dosen'] ?>
</h4>

<div class="col-md-6 my-3">
    <div class="row">
        <?php if ($prt != null) : ?>
            <div class="col dropdown">
                <a class="btn btn-secondary dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Pertemuan <?= (isset($_GET['pert'])) ? $_GET['pert'] : '1' ?>
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <?php

                    foreach ($prt as $pr) :
                    ?>
                        <li class="position-relative">
                            <a class="dropdown-item" href="?page=kelas&c=absensi&id=<?= $_GET['id'] ?>&pert=<?= str_replace('Pertemuan ', '', $pr['Nama_Pert'] . '') ?>">
                                <?= $pr['Nama_Pert'] ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
        <?php endif; ?> 
    </div>
</div>
<div class="col-md-12">
<table class="table table-hover table-bordered">
    <thead class="bg-secondary text-white text-center">
    <tr>
        <th>No</th>
        <th>STB</th>
        <th>Nama Mahasiswa</th>
        <th>Keterangan</th>
    </tr>
    </thead>
    <tbody>
    <?php

    $i = 0;
    $pert = "Pertemuan 1";

    if (isset($_GET['pert'])) {
        $pert = "Pertemuan " . $_GET['pert'];
    }


    $kelas = $_GET['id'];
    // $_SESSION['PERTEMUAN'] = $pert;
    // $_SESSION['ID_PERTEMUAN'] = Pertemuan::GetId($link, $pert, $kelas);

    $datas = Absensi::GetAllWithKelas($link, $kelas, $pert);
    if ($datas != null):
    foreach ($datas as $data) :
        $i++;
        ?>
        <tr>
            <td width="5%" class="text-center"><?= $i ?></td>
            <td width="25%" class="text-center"><?= $data['STB'] ?></td>
            <td width="*"><?= $data['Nama_Mahasiswa'] ?></td>
            <td width="10%"><?= $data['Keterangan'] ?></td>
           
        </tr>
    <?php
    endforeach;
else:
        ?>
        <tr>
            <td class="text-center" colspan="5">
                Belum Ada Yang Absen
            </td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>
</div>