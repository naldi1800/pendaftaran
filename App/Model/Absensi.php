<?php


namespace App\Model;

use App\Model\Data;
use App\Model\Inti;
use App\Contorller\Alert;

class Absensi extends Data
{

    public static function GetAll($link)
    {
        $sql = "SELECT * FROM " . parent::$t_absen . " AS A"
            . " JOIN " . parent::$t_kelas . " AS K ON A.Kode_Kelas=K.Kode_Kelas"
            . " JOIN " . parent::$t_mahasiswa . " AS M ON A.STB=M.STB"
            . " JOIN " . parent::$t_pert . " AS P ON A.Id_Pert=P.Id_Pert";
        $query = mysqli_query($link, $sql);
        $data = null;
        while ($result = mysqli_fetch_array($query)) {
            $data[] = $result;
        }
        return $data;
    }

    public static function GetAllWithKelas($link, $kelas, $pert)
    {
        $sql = "SELECT * FROM " . parent::$t_absen . " AS A"
            . " JOIN " . parent::$t_kelas . " AS K ON A.Kode_Kelas=K.Kode_Kelas"
            . " JOIN " . parent::$t_mahasiswa . " AS M ON A.STB=M.STB"
            . " JOIN " . parent::$t_pert . " AS P ON A.Id_Pert=P.Id_Pert WHERE A.Kode_Kelas='" . $kelas . "' AND P.Nama_Pert='" . $pert . "'";
        $query = mysqli_query($link, $sql);
        $data = null;
        while ($result = mysqli_fetch_array($query)) {
            $data[] = $result;
        }
        return $data;
    }

    public static function GetWithId($link, $id)
    {
        $sql = "SELECT * FROM " . parent::$t_absen . " AS A"
            . " JOIN " . parent::$t_kelas . " AS K ON A.Kode_Kelas=K.Kode_Kelas"
            . " JOIN " . parent::$t_mahasiswa . " AS M ON A.STB=M.STB"
            . " JOIN " . parent::$t_pert . " AS P ON A.Id_Pert=P.Id_Pert WHERE A.Id_Absensi='" . $id . "'";
        $query = mysqli_query($link, $sql);
        return mysqli_fetch_assoc($query);
    }

    public static function GetWithStbKelasPert($link, $kelas, $pert, $stb)
    {
        $sql = "SELECT * FROM " . parent::$t_absen . " AS A"
            . " JOIN " . parent::$t_kelas . " AS K ON A.Kode_Kelas=K.Kode_Kelas"
            . " JOIN " . parent::$t_mahasiswa . " AS M ON A.STB=M.STB"
            . " JOIN " . parent::$t_pert . " AS P ON A.Id_Pert=P.Id_Pert WHERE"
            . " A.Kode_Kelas='" . $kelas . "' AND "
            . " P.Nama_Pert='" . $pert . "' AND "
            . " A.STB='" . $stb . "'";
        $query = mysqli_query($link, $sql);
        return mysqli_fetch_assoc($query);
    }

    public static function CekAbsensi($link, $data)
    {
        $sql = "SELECT * FROM " . parent::$t_absen . " AS A"
            . " JOIN " . parent::$t_kelas . " AS K ON A.Kode_Kelas=K.Kode_Kelas"
            . " JOIN " . parent::$t_mahasiswa . " AS M ON A.STB=M.STB"
            . " JOIN " . parent::$t_pert . " AS P ON A.Id_Pert=P.Id_Pert WHERE "
            . "A.Kode_Kelas='" . $data['kelas'] . "' AND "
            . "A.STB='" . $data['stb'] . "' AND "
            . "A.Id_Pert='" . $data['pert'] . "'";
        $query = mysqli_query($link, $sql);
        return mysqli_fetch_assoc($query);
    }

    public static function GetForePert($link, $pert)
    {
        $sql = "SELECT * FROM " . parent::$t_absen . " WHERE Id_Pert='" . $pert . "'";
        $query = mysqli_query($link, $sql);
        return mysqli_fetch_assoc($query);
    }

    public static function Update($link, $id, $data)
    {
        return null;
    }

    public static function Delete($link, $id)
    {
        $sql = "DELETE FROM " . parent::$t_absen . " WHERE Id_Absensi='" . $id . "'";
        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data absensi", "dihapus", "berhasil");
        } else {
            Alert::Set("Data absensi", "dihapus", "gagal");
        }
    }

    public static function Insert($link, $data)
    {
        //SESSION
        $kelas = $_SESSION['KELAS'];
        $pert = $_SESSION['ID_PERTEMUAN'];

        $cek['kelas'] = $kelas;
        $cek['pert'] = $pert;
        $cek['stb'] = $data['stb'];

        if (Absensi::CekAbsensi($link, $cek) != null) {
            Alert::Set("Data Absensi", "disimpan | Mahasiswa ini (" . $cek['stb'] . ") telah absen", "gagal");
            return;
        }

        if (Inti::GetWithStbAndKelas($link, $kelas, $data['stb']) != null) {
            $sql = "INSERT INTO " . parent::$t_absen . " VALUES( "
                . "NULL,'"
                . $kelas . "','"
                . $data['stb'] . "','"
                . $pert . "','"
                . $data['keterangan'] . "','"
                . date("Y-m-d H:i:s") . "')";

            $query = mysqli_query($link, $sql);
            if ($query) {
                Alert::Set("Data Absensi", "disimpan", "berhasil");
            } else {
                Alert::Set("Data Absensi", "disimpan", "gagal");
                echo "Error : " . mysqli_error($link);
            }
        } else {
            Alert::Set("Data Absensi", "disimpan | Mahasiswa ini (" . $cek['stb'] . ") tidak terdaftar di kelas ini", "gagal");
        }
    }
}