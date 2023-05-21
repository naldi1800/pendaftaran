<?php


namespace App\Model;

use App\Contorller\Alert;
use App\Model\Data;

class Dosen extends Data
{

    public static function GetAll($link)
    {
        $sql = "SELECT * FROM " . parent::$t_dosen;
        $query = mysqli_query($link, $sql);
        $data = null;
        while ($result = mysqli_fetch_array($query)) {
            $data[] = $result;
        }

        return $data;
    }

    public static function GetWithId($link, $id)
    {
        $sql = "SELECT * FROM " . parent::$t_dosen . " WHERE NIDN='" . $id . "'";
        $query = mysqli_query($link, $sql);
        return mysqli_fetch_assoc($query);
    }

    public static function Update($link, $id, $data)
    {
        $sql = "UPDATE " . parent::$t_dosen . " SET "
            . "Nama_Dosen='" . $data['nama_dosen'] . "' WHERE NIDN='" . $id . "'";

        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data dosen", "diubah", "berhasil");
        } else {
            Alert::Set("Data dosen", "diubah", "gagal");
//            echo "Error : " . mysqli_error($link);
        }
    }

    public static function Delete($link, $id)
    {
        $sql = "DELETE FROM " . parent::$t_dosen . " WHERE NIDN='" . $id . "'";
        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data dosen", "dihapus", "berhasil");
        } else {
            Alert::Set("Data dosen", "dihapus", "gagal");
        }
    }

    public static function Insert($link, $data)
    {
        $sql = "INSERT INTO " . parent::$t_dosen . " VALUES( '"
            . $data['nidn'] . "','"
            . $data['nama_dosen'] . "')";

        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data dosen", "disimpan", "berhasil");
        } else {
            Alert::Set("Data dosen", "disimpan", "gagal");
//            echo "Error : " . mysqli_error($link);
        }
    }
}