<?php


namespace App\Model;

use App\Model\Data;
use App\Contorller\Alert;


class Kelas extends Data
{

    public static function GetAll($link)
    {
        $sql = "SELECT * FROM " . parent::$t_kelas . " AS A JOIN " . parent::$t_dosen .
            " AS B ON A.NIDN=B.NIDN JOIN " . parent::$t_matakuliah .
            " AS C ON A.Kode_MK=C.Kode_MK";
        $query = mysqli_query($link, $sql);
        $data = null;
        while ($result = mysqli_fetch_array($query)) {
            $data[] = $result;
        }

        return $data;
    }

    public static function GetWithId($link, $id)
    {
        $sql = "SELECT * FROM " . parent::$t_kelas . " AS A JOIN " . parent::$t_dosen .
            " AS B ON A.NIDN=B.NIDN JOIN " . parent::$t_matakuliah .
            " AS C ON A.Kode_MK=C.Kode_MK WHERE Kode_Kelas='" . $id . "'";
        $query = mysqli_query($link, $sql);

        return mysqli_fetch_assoc($query);
    }

    public static function GetAllWithDosen($link, $dosen)
    {
        $sql = "SELECT * FROM " . parent::$t_kelas . " AS A JOIN " . parent::$t_dosen .
            " AS B ON A.NIDN=B.NIDN JOIN " . parent::$t_matakuliah .
            " AS C ON A.Kode_MK=C.Kode_MK WHERE A.NIDN='" . $dosen . "'";
        $query = mysqli_query($link, $sql);
        $data = null;
        while ($result = mysqli_fetch_array($query)) {
            $data[] = $result;
        }

        return $data;
    }

    public static function Update($link, $id, $data)
    {
        //Cek Primary Kode Kelas
        $pry = self::GetWithId($link, $data['kode_kelas']);
        if ($pry != null && $id != $data['kode_kelas']) {
            Alert::Set("Data kelas", "diubah | Kode kelas " . $data['kode_kelas'] . " sudah ada", "gagal");
            return;
        }

        $sql = "UPDATE " . parent::$t_kelas . " SET "
            . "Kode_Kelas='" . $data['kode_kelas'] . "',"
            . "Kode_MK='" . $data['kode_mk'] . "',"
            . "NIDN='" . $data['nidn'] . "',"
            . "Nama_Kelas='" . $data['nama_kelas'] . "' WHERE Kode_Kelas='" . $id . "'";

        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data kelas", "disimpan", "berhasil");
        } else {
            Alert::Set("Data kelas", "disimpan", "gagal");
            echo "Error : " . mysqli_error($link);
        }
    }

    public static function Delete($link, $id)
    {
        $sql = "DELETE FROM " . parent::$t_kelas . " WHERE Kode_Kelas='" . $id . "'";
        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data kelas", "dihapus", "berhasil");
        } else {
            Alert::Set("Data kelas", "dihapus", "gagal");
        }
    }

    public static function Insert($link, $data)
    {
        //Cek Primary Kode Kelas
        $pry = self::GetWithId($link, $data['kode_kelas']);
        if ($pry != null) {
            Alert::Set("Data kelas", "disimpan | Kode kelas " . $data['kode_kelas'] . " sudah ada", "gagal");
            return;
        }

        $sql = "INSERT INTO " . parent::$t_kelas . " VALUES( '"
            . $data['kode_kelas'] . "','"
            . $data['kode_mk'] . "','"
            . $data['nidn'] . "','"
            . $data['nama_kelas'] . "')";

        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data kelas", "disimpan", "berhasil");
        } else {
            Alert::Set("Data kelas", "disimpan", "gagal");
//            echo "Error : " . mysqli_error($link);
        }
    }
}