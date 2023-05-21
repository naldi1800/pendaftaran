<?php

use App\Model\Inti;
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
    Data K-means
</h2>

<a href="?page=kmeans&c=k_means" class="btn btn-info mb-4">Proses K-means</a>
<table class="table table-hover table-bordered">
    <thead class="bg-secondary text-white text-center">
        <tr>
            <th>No</th>
            <th>Stambuk</th>
            <th>Nama Mahasiswa </th>
            <th>Hadir</th>
            <th>Sakit</th>
            <th>Alpa</th>
            <th>Ijin</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        $row = Mahasiswa::GetAll($link);
        foreach ($row as $data) : ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $data["STB"]; ?></td>
                <td><?= $data["Nama_Mahasiswa"]; ?></td>
                <td><?= $data["hadir"]; ?></td>
                <td><?= $data["sakit"]; ?></td>
                <td><?= $data["alpa"]; ?></td>
                <td><?= $data["ijin"]; ?></td>
            </tr>
            <?php $no++; ?>
        <?php endforeach; ?>
    </tbody>
