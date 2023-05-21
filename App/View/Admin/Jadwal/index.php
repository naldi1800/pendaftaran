<h2 class="h2 text-center">
    Data Jadwal
</h2>
<a href="?page=jadwal&c=tambah" class="btn btn-outline-success mb-3">Tambah</a>
<table class="table table-hover table-bordered">
    <thead class="bg-secondary text-white text-center">
    <tr>
        <th>No</th>
        <th>Kode Matakuliah</th>
        <th>Dosen</th>
        <th>Matakuliah</th>
        <th>Hari</th>
        <th>Jam</th>
        <th>action</th>
    </tr>
    </thead>
    <tbody>
    <?php

    use App\Model\Jadwal;
    use App\Model\Kelas;

    $i = 0;
    $datas = Jadwal::GetAll($link);
    foreach ($datas as $data) :
        $i++;
        ?>
        <tr>
            <td width="5%" class="text-center"><?= $i ?></td>
            <td width="15%" class="text-center"><?= $data['Kode_Kelas'] ?></td>
            <td width="25%">
                <?php
                $d = Kelas::GetWithId($link, $data['Kode_Kelas']);
                echo $d['Nama_Dosen'];
                ?>
            </td>
            <td width="25%">
                <?php
                $d = Kelas::GetWithId($link, $data['Kode_Kelas']);
                echo $d['Nama_Matakuliah'];
                ?>
            </td>
            <td width="10%" class="text-center"><?= $data['Hari'] ?></td>
            <td width="10%" class="text-center"><?= $data['Jam'] ?></td>
            <td width="10%" class="">
                <center>
                    <a href="?page=jadwal&c=ubah&id=<?= $data['Id_Jadwal'] ?>" class="text-center btn btn-info">
                        Edit
                    </a>
                    <a href="?page=jadwal&c=hapus&id=<?= $data['Id_Jadwal'] ?>" class="text-center btn btn-danger">
                        Hapus
                    </a>
                </center>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>