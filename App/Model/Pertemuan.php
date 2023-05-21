<?php


namespace App\Model;

use App\Model\Data;
use App\Model\Absensi;
use App\Contorller\Alert;

class Pertemuan extends Data
{

    public static function GetAll($link)
    {
        $sql = "SELECT * FROM " . parent::$t_pert . " AS P JOIN " . parent::$t_kelas . " AS K ON P.Kode_Kelas=K.Kode_Kelas";
        $query = mysqli_query($link, $sql);
        $data = null;
        while ($result = mysqli_fetch_array($query)) {
            $data[] = $result;
        }
        return $data;
    }

    public static function GetWithId($link, $id)
    {
        $sql = "SELECT * FROM " . parent::$t_pert . " AS P JOIN " . parent::$t_kelas . " AS K ON P.Kode_Kelas=K.Kode_Kelas WHERE P.Id_Pert='" . $id . "'";
        $query = mysqli_query($link, $sql);
        return mysqli_fetch_assoc($query);
    }

    public static function GetWithKelas($link, $kelas)
    {
        $sql = "SELECT * FROM " . parent::$t_pert . " AS P JOIN " . parent::$t_kelas . " AS K ON P.Kode_Kelas=K.Kode_Kelas WHERE P.Kode_Kelas='" . $kelas . "'";
        $query = mysqli_query($link, $sql);
        $data = null;
        while ($result = mysqli_fetch_array($query)) {
            $data[] = $result;
        }
        return $data;
    }

    public static function GetId($link, $nama_pert, $kelas){
        $sql = "SELECT * FROM " . parent::$t_pert . " AS P JOIN " . parent::$t_kelas . " AS K ON P.Kode_Kelas=K.Kode_Kelas WHERE P.Kode_Kelas='" . $kelas . "' AND P.Nama_Pert='".$nama_pert."'";
        $query = mysqli_query($link, $sql);
        if($res =  mysqli_fetch_assoc($query))
            return $res['Id_Pert'];
        return null;
    }

    public static function Update($link, $id, $data)
    {
        return null;
    }

    public static function Delete($link, $id)
    {

        $absen = Absensi::GetForePert($link, $id);
        if ($absen != null) {
            Alert::Set("Data pertemuan", "dihapus | Terdapat data absensi didalamnya", "gagal");
            return;
        }


        $sql = "DELETE FROM " . parent::$t_pert . " WHERE Id_Pert='" . $id . "'";
        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data pertemuan", "dihapus", "berhasil");
        } else {
            Alert::Set("Data pertemuan", "dihapus", "gagal");
        }
    }

    public static function Insert($link, $data)
    {

        $kelas = $_SESSION['KELAS'];
        $sql = "INSERT INTO " . parent::$t_pert . " VALUES( "
            . "NULL,'"
            . $kelas . "','"
            . $data['nama_pert'] . "','"
            . date("Y-m-d H:i:s") . "')";

        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data pertemuan", "disimpan", "berhasil");
        } else {
            Alert::Set("Data pertemuan", "disimpan", "gagal");
//            echo "Error : " . mysqli_error($link);
        }
    }
}