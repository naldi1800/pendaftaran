<?php


namespace App\Model;

use App\Model\Data;
use App\Contorller\Alert;

class Matakuliah extends Data
{

    public static function GetAll($link)
    {
        $sql = "SELECT * FROM " . parent::$t_matakuliah;
        $query = mysqli_query($link, $sql);
        $data = null;
        while ($result = mysqli_fetch_array($query)) {
            $data[] = $result;
        }
        return $data;
    }

    public static function GetWithId($link, $id)
    {
        $sql = "SELECT * FROM " . parent::$t_matakuliah . " WHERE Kode_MK='" . $id . "'";
        $query = mysqli_query($link, $sql);
        return mysqli_fetch_assoc($query);
    }

    public static function Update($link, $id, $data)
    {
        $sql = "UPDATE " . parent::$t_matakuliah . " SET "
            . "Kode_MK='" . $data['kode_mk'] . "',"
            . "Nama_Matakuliah='" . $data['nama_mk'] . "',"
            . "Semester='" . $data['semester'] . "',"
            . "SKS='" . $data['sks'] . "' WHERE Kode_MK='" . $id . "'";

        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data matakuliah", "diubah", "berhasil");
        } else {
            Alert::Set("Data matakuliah", "diubah", "gagal");
//            echo "Error : " . mysqli_error($link);
        }
    }

    public static function Delete($link, $id)
    {
        $sql = "DELETE FROM " . parent::$t_matakuliah . " WHERE Kode_MK='" . $id . "'";
        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data matakuliah", "dihapus", "berhasil");
        } else {
            Alert::Set("Data matakuliah", "dihapus", "gagal");
        }
    }

    public static function Insert($link, $data)
    {
        $sql = "INSERT INTO " . parent::$t_matakuliah . " VALUES( '"
            . $data['kode_mk'] . "','"
            . $data['nama_mk'] . "','"
            . $data['semester'] . "','"
            . $data['sks'] . "')";

        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data matakuliah", "disimpan", "berhasil");
        } else {
            Alert::Set("Data matakuliah", "disimpan", "gagal");
//            echo "Error : " . mysqli_error($link);
        }
    }
}