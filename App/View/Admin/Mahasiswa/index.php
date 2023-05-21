<h2 class="h2 text-center">
    Data Mahasiswa Jurusan Informatika
</h2>
<a href="?page=Mahasiswa&c=tambah" class="btn btn-outline-success mb-3">Tambah</a>
<table class="table table-hover table-bordered">
    <thead class="bg-secondary text-white text-center">
    <tr>
        <th>STB</th>
        <th>Nama Mahasiswa</th>
        <th>Jenis Kelamin</th>
        <th>Angkatan</th>
        <th>Foto</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $i = 0;

    use App\Model\Mahasiswa;

    $datas = Mahasiswa::GetAll($link);
    foreach ($datas as $data) :
        $jkl = ($data['Jenis_Kelamin'] == "P") ? "Perempuan" : (($data['Jenis_Kelamin'] == "L") ? "Laki-Laki" : "");
        ?>
        <tr>
            <td width="15%" class="text-center"><?= $data['STB'] ?></td>
            <td width="38%"><?= $data['Nama_Mahasiswa'] ?></td>
            <td width="15%" class="text-center"><?= $jkl ?></td>
            <td width="10%" class="text-center"><?= $data['Angkatan'] ?></td>
            <td width="10%">

                <img src="App/Image/Mahasiswa/<?= $data['Foto'] ?>" alt="<?= $data['STB'] ?>" width="50">
            </td>
    
            <td width="12%" class="">
                <center>
                    <a href="?page=mahasiswa&c=ubah&id=<?= $data['STB'] ?>" class="text-center btn btn-info">
                        Edit
                    </a>
                    <a href="?page=mahasiswa&c=hapus&id=<?= $data['STB'] ?>" class="text-center btn btn-danger">
                        Hapus
                    </a>
                </center>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>