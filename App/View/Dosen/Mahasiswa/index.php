<h2 class="position-relative">
    Data Mahasiswa
    <!--    <a href="?page=Mahasiswa&c=tambah" class="position-absolute top-0 end-0 btn btn-secondary">Tambah</a>-->
</h2>

<table class="table table-bordered table-hover">
    <thead class="bg-secondary text-white text-center">
    <th>No</th>
    <th>STB</th>
    <th>Nama</th>
    <th>Jenis Kelamin</th>
    <th>Foto</th>
    </thead>
    <tbody class="align-middle">
    <?php
    $kelas = $_SESSION['KELAS'];
    $datas = \App\Model\Inti::GetAllWithKelas($link, $kelas);
    $no = 0;
    if ($datas != null):
    foreach ($datas as $data):
        $jkl = ($data['Jenis_Kelamin'] == "P") ? "Perempuan" : (($data['Jenis_Kelamin'] == "L") ? "Laki-Laki" : "");
        $no++;
        ?>
        <tr>
            <td class="text-center"><?= $no ?></td>
            <td><?= $data['STB'] ?></td>
            <td><?= $data['Nama_Mahasiswa'] ?></td>
            <td><?= $jkl ?></td>
            <td class="text-center">
                <img src="<?= BASEURL ?>/App/Image/Mahasiswa/<?= $data['Foto'] ?>" alt="<?= $data['STB'] ?>" width="50">
            </td>
        </tr>
    <?php endforeach;
    else:
        ?>
        <tr>
            <td class="text-center" colspan="5">
                DATA MASIH KOSONG
            </td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>