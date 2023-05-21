<h2 class="h2 text-center">
    Data Dosen
</h2>
<a href="?page=dosen&c=tambah" class="btn btn-outline-success mb-3">Tambah</a>
<table class="table table-hover table-bordered">
    <thead class="bg-secondary text-white text-center">
    <tr>
        <th>No</th>
        <th>NIDN</th>
        <th>Nama DOSEN</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php

    use App\Model\Dosen;
    $i = 0;
    $datas = Dosen::GetAll($link);
    foreach ($datas as $data) :
$i++;
        ?>
        <tr>
            <td width="5%" class="text-center"><?= $i ?></td>
            <td width="25%" class="text-center"><?= $data['NIDN'] ?></td>
            <td width="*"><?= $data['Nama_Dosen'] ?></td>
            <td width="20%" class="">
                <center>
                    <a href="?page=dosen&c=ubah&id=<?= $data['NIDN'] ?>" class="text-center btn btn-info">
                        Edit
                    </a>
                    <a href="?page=dosen&c=hapus&id=<?= $data['NIDN'] ?>" class="text-center btn btn-danger">
                        Hapus
                    </a>
                </center>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>