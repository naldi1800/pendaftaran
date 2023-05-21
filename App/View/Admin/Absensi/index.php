<?php

use App\Model\Absensi;

?>
<link href="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.css" rel="stylesheet">

<script src="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.20.2/dist/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>


<h2 class="position-relative">
    Data Absensi
</h2>


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

    $datas = Absensi::GetAll($link);
    foreach ($datas as $data) :
        $i++;
        ?>
        <tr>
            <td width="5%" class="text-center"><?= $i ?></td>
            <td width="25%" class="text-center"><?= $data['STB'] ?></td>
            <td width="*"><?= $data['Nama_Mahasiswa'] ?></td>
            <td width="10"><?= $data['Keterangan'] ?></td>
        </tr>
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

