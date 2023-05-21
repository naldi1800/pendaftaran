<?php


namespace App\Model;

use App\Model\Data;
use App\Contorller\Alert;

class Inti extends Data
{

    public static function GetAll($link)
    {
        $sql = "SELECT * FROM " . parent::$t_inti . " AS A JOIN " . parent::$t_mahasiswa . " AS B ON A.STB=B.STB";
        $query = mysqli_query($link, $sql);
        $data = null;
        while ($result = mysqli_fetch_array($query)) {
            $data[] = $result;
        }
        return $data;
    }

    public static function GetAllWithKelas($link, $kelas)
    {
        $sql = "SELECT * FROM " . parent::$t_inti . " AS A JOIN " . parent::$t_mahasiswa . " AS B ON A.STB=B.STB WHERE A.Kode_Kelas='" . $kelas . "'";
        $query = mysqli_query($link, $sql);
        $data = null;
        while ($result = mysqli_fetch_array($query)) {
            $data[] = $result;
        }
        return $data;
    }

    public static function GetWithStbAndKelas($link, $kelas, $stb)
    {
        $sql = "SELECT * FROM " . parent::$t_inti . " AS A JOIN " . parent::$t_mahasiswa . " AS B ON A.STB=B.STB WHERE A.Kode_Kelas='" . $kelas . "' AND A.STB='" . $stb . "'";
        $query = mysqli_query($link, $sql);
        return mysqli_fetch_assoc($query);
    }

    public static function GetWithId($link, $id)
    {
        return null;
    }

    public static function Update($link, $id, $data)
    {
        return null;
    }

    public static function Delete($link, $id)
    {
        $sql = "DELETE FROM " . parent::$t_inti . " WHERE Id_Inti='" . $id . "'";
        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data", "dihapus", "berhasil");
        } else {
            Alert::Set("Data", "dihapus", "gagal");
        }
    }

    public static function Insert($link, $data)
    {
        $sql = "INSERT INTO " . parent::$t_inti . " VALUES( "
            . "NULL,'"
            . $data['kode_kelas'] . "','"
            . $data['stb'] . "')";

        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data", "disimpan", "berhasil");
        } else {
            Alert::Set("Data", "disimpan", "gagal");
//            echo "Error : " . mysqli_error($link);
        }
    }
}