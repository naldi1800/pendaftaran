<h2 class="h2 text-center">
    Data Kelas
</h2>
<a href="?page=kelas&c=tambah" class="btn btn-outline-success mb-3">Tambah</a>
<table class="table table-hover table-bordered">
    <thead class="bg-secondary text-white text-center">
    <tr>
        <th>No</th>
        <th>Kode Matakuliah</th>
        <th>Kelas</th>
        <th>Dosen</th>
        <th>Matakuliah</th>
        <th>action</th>
    </tr>
    </thead>
    <tbody>
    <?php

    use App\Model\Kelas;

    $i = 0;
    $datas = Kelas::GetAll($link);
    foreach ($datas as $data) :
        $i++;
        ?>
        <tr>
            <td width="5%" class="text-center"><?= $i ?></td>
            <td width="15%" class="text-center"><?= $data['Kode_Kelas'] ?></td>
            <td width="5%" class="text-center"><?= $data['Nama_Kelas'] ?></td>
            <td width="27%"><?= $data['Nama_Dosen'] ?></td>
            <td width="27%"><?= $data['Nama_Matakuliah'] ?></td>
            <td width="21%" class="">
                <center>
                    <a href="?page=kelas&c=absensi&id=<?= $data['Kode_Kelas'] ?>" class="text-center btn btn-primary">
                        Absensi
                    </a>
                    <a href="?page=kelas&c=ubah&id=<?= $data['Kode_Kelas'] ?>" class="text-center btn btn-info">
                        Edit
                    </a>
                    <a href="?page=kelas&c=hapus&id=<?= $data['Kode_Kelas'] ?>" class="text-center btn btn-danger">
                        Hapus
                    </a>
                </center>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>