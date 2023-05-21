<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="admin.css">

</head>



<body>
  <?php

  use App\Model\Mahasiswa;

  $iterasiNumber = isset($_GET['iterasi']) ? (int) $_GET['iterasi'] : 1;
  ?>


  <div class="row no-gutters">

    <div class="col-md-12 p-5 pt-4">
      <?php error_reporting(0); ?>
      <h3>
        <p class="fst-italic mr-2">PENERAPAN ALGORITMA K-MEANS </p>
      </h3>
      <hr>

      <style type="text/css">
        h5 {
          font-family: Georgia;
        }

        h3 {
          font-family: Georgia;
        }

        h4 {
          font-family: Georgia;
        }

        span {
          font-family: Georgia;
        }

        th {
          font-family: Georgia;
        }

        td {
          font-family: Georgia;
        }

        a {
          font-family: Georgia;
        }
      </style>
      <div class="pt-3"></div>

      <a href="?page=kmeans&c=k_means&iterasi=<?= $iterasiNumber - 1 ?>" class="btn btn-primary mb-4 <?= ($iterasiNumber == 1) ? "disabled" : "" ?>">Proses Iterasi Sebelumnya</a>
      <a href="?page=kmeans&c=k_means&iterasi=<?= $iterasiNumber + 1 ?>" class="btn btn-primary mb-4 <?= ($iterasiNumber == 5) ? "disabled" : "" ?>">Proses Iterasi Selanjutnya</a>

      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h3 class="m-0 font-weight-bold text-black">
            Iterasi <?= $iterasiNumber ?>
          </h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr class="text-center align-middle">
                  <td rowspan="2">No </td>
                  <td rowspan="2">STB</td>
                  <td rowspan="2">Nama Mahasiswa</td>
                  <td rowspan="2">Hadir</td>
                  <td rowspan="2">Sakit</td>
                  <td rowspan="2">Alpa</td>
                  <td rowspan="2">Ijin</td>
                  <td colspan="4">Centroid 1</td>
                  <td colspan="4">Centroid 2</td>

                </tr>

                <tr class="text-center">
                  <td>10</td>
                  <td>1</td>
                  <td>3</td>
                  <td>2</td>
                  <td>10</td>
                  <td>3</td>
                  <td>0</td>
                  <td>3</td>
                </tr>

                <?php

                //Start Value Centroid First
                $c1a = 10;
                $c1b = 1;
                $c1c = 3;
                $c1d = 2;

                $c2a = 10;
                $c2b = 3;
                $c2c = 0;
                $c2d = 3;
                // End Value Centroid First

                for ($iterasi = 1; $iterasi <= $iterasiNumber; $iterasi++) :


                  $hc1 = 0; // Inisialisasi hasil cluster 1 ke 0
                  $hc2 = 0; // Inisialisasi hasil cluster 2 ke 0

                  $no = 0;

                  //centroid 1
                  $arr_hadir1 = array();
                  $arr_sakit1 = array();
                  $arr_alpa1 = array();
                  $arr_izin1 = array();

                  //centroid 2
                  $arr_hadir2 = array();
                  $arr_sakit2 = array();
                  $arr_alpa2 = array();
                  $arr_izin2 = array();
                  $no = 1;
                  $result = Mahasiswa::GetAll($link); // Mengambil data mahasiswa dari database

                  foreach ($result as $s) {
                    //Mencari nilai dari cluster 1
                    $hc1 = sqrt(pow(($s['hadir'] - $c1a), 2) + pow(($s['sakit'] - $c1b), 2) + pow(($s['alpa'] - $c1c), 2) + pow(($s['ijin'] - $c1d), 2));
                    //Mencari nilai dari cluster 2
                    $hc2 = sqrt(pow(($s['hadir'] - $c2a), 2) + pow(($s['sakit'] - $c2b), 2) + pow(($s['alpa'] - $c2c), 2) + pow(($s['ijin'] - $c2d), 2));

                    //Mengubah warna td tabel berdasarkan hasil cluster
                    $warna1 = ($hc1 <= $hc2) ? '#FFFF00' : '#cccc';
                    $warna2 = ($hc2 <= $hc1) ? '#FFFF00' : '#cccc';

                    if ($iterasiNumber == $iterasi) : // jika iterasi = iterasinumber maka hasilnya tabelnya dicetak. untuk menghindari pencetakan berulang
                ?>

                      <tr>
                        <td><?= $no; ?></td>
                        <td><?= $s["STB"]; ?></td>
                        <td><?= $s["Nama_Mahasiswa"]; ?></td>
                        <td><?= $s["hadir"]; ?></td>
                        <td><?= $s["sakit"]; ?></td>
                        <td><?= $s["alpa"]; ?></td>
                        <td><?= $s["ijin"]; ?></td>
                        <td style="background-color: <?= $warna1 ?>;" colspan="4"> <?= $hc1; ?> </td>
                        <td style="background-color: <?= $warna2 ?>;" colspan="4"> <?= $hc2; ?> </td>
                      </tr>

                <?php
                    endif;

                    /* 
                    * jika hasil cluster 1 <= cluster 2 maka nilai pada kehadiharan masuk ke 
                    * array centroid 1 untuk dijumlahkan nantinya agar mendapatkan nilai centroid baru
                    * begitu juga untuk menentukan centroid 2 berdasarkan hasil cluster 2 harus < cluster 1
                    */
                    // (Kondisi) ? 'benar' maka array centroid 1 diisi nilai : 'salah' maka array centroid 2 diisi nilai
                    ($hc1 <= $hc2) ? array_push($arr_hadir1, $s['hadir']) : array_push($arr_hadir2, $s['hadir']);
                    ($hc1 <= $hc2) ? array_push($arr_sakit1, $s['sakit']) : array_push($arr_sakit2, $s['sakit']);
                    ($hc1 <= $hc2) ? array_push($arr_alpa1, $s['alpa']) : array_push($arr_alpa2, $s['alpa']);
                    ($hc1 <= $hc2) ? array_push($arr_izin1, $s['ijin']) : array_push($arr_izin2, $s['ijin']);

                    $no++;
                  }

                  //mencari nilai centroid 1 baru
                  //variabel = menjumlahkan semua isi dari array / menghitung berapa banyak data pada array
                  $c1a = array_sum($arr_hadir1) / count($arr_hadir1);
                  $c1b = array_sum($arr_sakit1) / count($arr_sakit1);
                  $c1c = array_sum($arr_alpa1) / count($arr_alpa1);
                  $c1d = array_sum($arr_izin1) / count($arr_izin1);

                  //mencari nilai centroid 2 baru
                  $c2a = array_sum($arr_hadir2) / count($arr_hadir2);
                  $c2b = array_sum($arr_sakit2) / count($arr_sakit2);
                  $c2c = array_sum($arr_alpa2) / count($arr_alpa2);
                  $c2d = array_sum($arr_izin2) / count($arr_izin2);

                endfor;
                ?>
              </thead>

            </table>
          </div>
        </div>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

      <script type="text/javascript" src="admin.js"></script>
</body>

</html>