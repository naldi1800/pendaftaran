<?php
    use App\Model\Pertemuan;

    $pert = Pertemuan::GetWithKelas($link, $_SESSION['KELAS']);
    $last = "";
    if($pert != null){
        foreach ($pert as $p){
            $last = $p;
        }
        
        $np = $last['Nama_Pert'];
        $np = str_replace("Pertemuan ", "", $np);
        
        $np += 1;
        
        if ($np > 15){
            header("location: " . BASEURL . "/index.php?page=absensi&c=index&pert=" . $np-1);
            exit;
        }
        $data['nama_pert'] = "Pertemuan ". $np;
        Pertemuan::Insert($link, $data);
    }else{
        $data['nama_pert'] = "Pertemuan 1";
        Pertemuan::Insert($link, $data);   
        $np = 1;     
    }

    header("location: " . BASEURL . "/index.php?page=absensi&c=index&pert=" . $np);
        exit;