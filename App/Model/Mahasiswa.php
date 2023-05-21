<?php namespace App\Model;

use App\Contorller\Alert;
use App\Model\Data;

class Mahasiswa extends Data
{

    public static function GetAll($link)
    {
        $sql = "SELECT * FROM " . parent::$t_mahasiswa;
        $query = mysqli_query($link, $sql);
        $data = null;
        while ($result = mysqli_fetch_array($query)) {
            $data[] = $result;
        }
        return $data;
    }

    public static function GetWithId($link, $id)
    {
        $sql = "SELECT * FROM " . parent::$t_mahasiswa . " WHERE STB='" . $id . "'";
        $query = mysqli_query($link, $sql);
        return mysqli_fetch_assoc($query);
    }

    public static function Update($link, $id, $data)
    {
        $imageName = "";
        $mhs = $data["mahasiswa"];
        $img = $data['foto'];
        if ($img != null) {
            $type = pathinfo($img['foto']['name'], PATHINFO_EXTENSION);
            $imageName = "MHS_" . $mhs['stb_mahasiswa'] . "." . $type;


            $sql = "UPDATE " . parent::$t_mahasiswa . " SET "
                . "Nama_Mahasiswa='" . $mhs['nama_mahasiswa'] . "' , "
                . "Jenis_Kelamin='" . $mhs['jenis_kelamin'] . "' , "
                . "Angkatan='" . $mhs['angkatan'] . "', "
                . "Foto='" . $imageName . "' WHERE STB='" . $id . "'";
               
            $imageName = parent::$ImageFolder . $imageName;

           
        } else {
            $sql = "UPDATE " . parent::$t_mahasiswa . " SET "
                . "Nama_Mahasiswa='" . $mhs['nama_mahasiswa'] . "' , "
                . "Jenis_Kelamin='" . $mhs['jenis_kelamin'] . "' , "
                . "Angkatan='" . $mhs['angkatan'] . "', "
                . "Foto='" . $imageName . "' WHERE STB='" . $id . "'";
               
               
        }
//        var_dump($imageName);

        $query = mysqli_query($link, $sql);
        if ($query) {
            if ($img != null) {
                if (file_exists($imageName)) {
                    unlink($imageName);
                }

                if (move_uploaded_file($img['foto']['tmp_name'], $imageName)) {
                    Alert::Set("Data mahasiswa", "diubah", "berhasil");
                } else {
                    Alert::Set("Data mahasiswa", "diubah", "gagal");
                }
            } else {
                Alert::Set("Data mahasiswa", "diubah", "berhasil");
            }
        } else {
            Alert::Set("Data mahasiswa", "diubah", "gagal");
//            echo "Error : " . mysqli_error($link);
        }
    }

    public static function Delete($link, $id)
    {
        $sql = "DELETE FROM " . parent::$t_mahasiswa . " WHERE STB='" . $id . "'";
        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data mahasiswa", "dihapus", "berhasil");
            if (file_exists("App/Image/Mahasiswa/MHS_" . $id . ".*")) {
                echo "hapus Image ";
                if (array_map('unlink', glob("App/Image/Mahasiswa/MHS_" . $id . ".*"))) {
                    echo "berhasil";
                }
            }
        } else {
            Alert::Set("Data mahasiswa", "dihapus", "gagal");
        }
    }

    public static function Insert($link, $data)
    {
        $mhs = $data["mahasiswa"];
        $img = $data['foto'];
        $type = pathinfo($img['foto']['name'], PATHINFO_EXTENSION);

        $imageName = "MHS_" . $mhs['stb_mahasiswa'] . "." . $type;

        $sql = "INSERT INTO " . parent::$t_mahasiswa . " VALUES( '"
            . $mhs['stb_mahasiswa'] . "','"
            . $mhs['nama_mahasiswa'] . "' , '"
            . $mhs['jenis_kelamin'] . "' , '"
            . $mhs['angkatan'] . "','"
             .$imageName. "')";
            
            

        $imageName = parent::$ImageFolder . $imageName;

        $query = mysqli_query($link, $sql);
        if ($query) {
            if (move_uploaded_file($img['foto']['tmp_name'], $imageName)) {
                Alert::Set("Data mahasiswa", "disimpan", "berhasil");
            } else {
                Alert::Set("Data mahasiswa", "disimpan", "gagal");
            }
        } else {
            Alert::Set("Data mahasiswa", "disimpan", "gagal");
//            echo "Error : " . mysqli_error($link);
        }
    }
}