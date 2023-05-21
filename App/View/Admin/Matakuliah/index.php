<h2 class="h2 text-center">
    Data Matakuliah
</h2>
<a href="?page=matakuliah&c=tambah" class="btn btn-outline-success mb-3">Tambah</a>
<table class="table table-hover table-bordered">
    <thead class="bg-secondary text-white text-center">
    <tr>
        <th>Kode Matakuliah</th>
        <th>Nama Matakuliah</th>
        <th>Semester</th>
        <th>SKS</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php

    use App\Model\Matakuliah;

    $datas = Matakuliah::GetAll($link);
    foreach ($datas as $data) :

        ?>
        <tr>
            <td width="10%" class="text-center"><?= $data['Kode_MK'] ?></td>
            <td width="40%"><?= $data['Nama_Matakuliah'] ?></td>
            <td width="15%"><?= $data['Semester'] ?></td>
            <td width="15%"><?= $data['SKS'] ?></td>
            <td width="10%" class="">
                <center>
                    <a href="?page=matakuliah&c=ubah&id=<?= $data['Kode_MK'] ?>" class="text-center btn btn-info">
                        Edit
                    </a>
                    <a href="?page=matakuliah&c=hapus&id=<?= $data['Kode_MK'] ?>" class="text-center btn btn-danger">
                        Hapus
                    </a>
                </center>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>